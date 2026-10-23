#!/usr/bin/env node
/**
 * Exporta a LP (WordPress rodando local) para uma pasta de arquivos estáticos,
 * pronta para hospedar na Cloudflare Pages ou em qualquer hospedagem de arquivos.
 *
 * Uso:
 *   node scripts/exportar-estatico.mjs [opções]
 *
 * Opções:
 *   --origem <url>   Endereço do WordPress local (padrão: http://rafaellima.local.host)
 *   --site <url>     Endereço final do site, ex.: https://nimbolabs.com.br. Preenche canonical,
 *                    Open Graph e sitemap. Sem ele, os links ficam relativos (bom para testes).
 *   --noindex        Pede aos buscadores para não indexar (use em homologação).
 *   --saida <pasta>  Pasta de saída (padrão: dist)
 *
 * Sem dependências: só o Node 18+.
 */
import { cp, mkdir, readFile, rm, stat, writeFile } from 'node:fs/promises';
import { dirname, join, resolve } from 'node:path';
import { fileURLToPath } from 'node:url';

const raiz = resolve( dirname( fileURLToPath( import.meta.url ) ), '..' );
const TEMA = 'rafael-lima';

// --- opções -------------------------------------------------------------
const args = process.argv.slice( 2 );
const opcao = ( nome, padrao = '' ) => {
	const i = args.indexOf( `--${ nome }` );
	return i >= 0 && args[ i + 1 ] && ! args[ i + 1 ].startsWith( '--' ) ? args[ i + 1 ] : padrao;
};
const origem = opcao( 'origem', 'http://rafaellima.local.host' ).replace( /\/$/, '' );
const site = opcao( 'site' ).replace( /\/$/, '' );
const noindex = args.includes( '--noindex' );
const saida = resolve( raiz, opcao( 'saida', 'dist' ) );

// --- helpers ------------------------------------------------------------
async function baixar( caminho ) {
	const resposta = await fetch( origem + caminho, { redirect: 'follow' } );
	return { status: resposta.status, html: await resposta.text() };
}

/** Limpa o que o WordPress coloca no <head> e que não faz sentido num site estático. */
function limpar( html ) {
	return html
		// Endereço local -> endereço final (ou relativo, se --site não foi informado).
		.replaceAll( origem, site )
		// API REST, oEmbed e SEO automático do WordPress.
		.replace( /<link[^>]+rel=["']https:\/\/api\.w\.org\/["'][^>]*>\s*/g, '' )
		.replace( /<link[^>]+(?:oembed|wp-json)[^>]*>\s*/g, '' )
		.replace( /<script type=["']speculationrules["']>[\s\S]*?<\/script>\s*/g, '' )
		.replace( /<meta name=['"]robots['"][^>]*>\s*/g, '' )
		// CSS interno do WordPress (editor de blocos) que o tema não usa.
		.replace( /<style id=["'](?:global-styles|wp-img-auto-sizes|core-block-supports|wp-block-library|classic-theme)[^"']*["']>[\s\S]*?<\/style>\s*/g, '' )
		// Robôs: bloqueia em homologação, libera em produção.
		.replace( '</head>', `${ noindex ? '<meta name="robots" content="noindex, nofollow">\n' : '' }</head>` );
}

const existe = ( caminho ) => stat( caminho ).then( () => true, () => false );

// --- exportação ---------------------------------------------------------
console.log( `Origem: ${ origem }\nSaída:  ${ saida }\nSite:   ${ site || '(relativo)' }${ noindex ? '  [noindex]' : '' }\n` );

const home = await baixar( '/' );
if ( home.status !== 200 ) {
	console.error( `A página inicial respondeu ${ home.status }. O WordPress local está rodando?` );
	process.exit( 1 );
}
const erro404 = await baixar( '/pagina-que-nao-existe-404/' );

await rm( saida, { recursive: true, force: true } );
await mkdir( saida, { recursive: true } );

await writeFile( join( saida, 'index.html' ), limpar( home.html ) );
await writeFile( join( saida, '404.html' ), limpar( erro404.html ) );

// Arquivos do tema que a página usa (CSS, JS, fontes, imagens).
const assets = join( raiz, 'wp-content', 'themes', TEMA, 'assets' );
const destinoAssets = join( saida, 'wp-content', 'themes', TEMA, 'assets' );
await cp( assets, destinoAssets, {
	recursive: true,
	filter: ( arquivo ) => ! arquivo.endsWith( '.map' ),
} );

// robots.txt e sitemap.
const robots = noindex
	? 'User-agent: *\nDisallow: /\n'
	: `User-agent: *\nAllow: /\n${ site ? `\nSitemap: ${ site }/sitemap.xml\n` : '' }`;
await writeFile( join( saida, 'robots.txt' ), robots );

if ( site && ! noindex ) {
	const hoje = new Date().toISOString().slice( 0, 10 );
	await writeFile( join( saida, 'sitemap.xml' ),
		`<?xml version="1.0" encoding="UTF-8"?>\n<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">\n\t<url><loc>${ site }/</loc><lastmod>${ hoje }</lastmod></url>\n</urlset>\n` );
}

// Cabeçalhos da Cloudflare Pages: segurança básica e cache longo para os assets.
await writeFile( join( saida, '_headers' ), [
	'/*',
	'  X-Content-Type-Options: nosniff',
	'  X-Frame-Options: DENY',
	'  Referrer-Policy: strict-origin-when-cross-origin',
	'  Permissions-Policy: camera=(), microphone=(), geolocation=()',
	...( noindex ? [ '  X-Robots-Tag: noindex, nofollow' ] : [] ),
	'',
	`/wp-content/themes/${ TEMA }/assets/*`,
	'  Cache-Control: public, max-age=31536000, immutable',
	'',
].join( '\n' ) );

// --- verificação --------------------------------------------------------
const html = await readFile( join( saida, 'index.html' ), 'utf8' );
const problemas = [];
if ( /local\.host/.test( html ) ) problemas.push( 'sobrou "local.host" no HTML' );
if ( /wp-json|oembed/.test( html ) ) problemas.push( 'sobrou link da API do WordPress' );

// Todo arquivo local referenciado precisa existir na saída.
const referencias = new Set( [ ...html.matchAll( /(?:src|href)=["'](\/[^"'#?]+)/g ) ].map( ( m ) => m[ 1 ] ) );
for ( const ref of referencias ) {
	if ( ! ( await existe( join( saida, ref ) ) ) ) problemas.push( `arquivo ausente: ${ ref }` );
}

if ( problemas.length ) {
	console.error( 'Problemas encontrados:\n- ' + problemas.join( '\n- ' ) );
	process.exit( 1 );
}
console.log( `OK: ${ referencias.size } arquivos referenciados conferidos. Pasta pronta: ${ saida }` );
