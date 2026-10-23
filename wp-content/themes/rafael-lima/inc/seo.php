<?php
/**
 * SEO e compartilhamento: descrição para o Google, prévia no WhatsApp/Instagram/LinkedIn
 * (Open Graph) e dados estruturados da empresa. Só na página inicial.
 */

defined( 'ABSPATH' ) || exit;

add_action( 'wp_head', function () {
	if ( ! is_front_page() ) {
		return;
	}

	$titulo    = 'Nimbo Labs · Landing pages, sites e sistemas sob medida';
	$descricao = 'Landing pages, sites e sistemas rápidos, bonitos e fáceis de editar. Fale direto com quem desenvolve e peça seu orçamento pelo WhatsApp.';
	$url       = home_url( '/' );
	$imagem    = RL_THEME_URI . '/assets/img/og.png';

	$meta = [
		[ 'name', 'description', $descricao ],
		[ 'property', 'og:type', 'website' ],
		[ 'property', 'og:locale', 'pt_BR' ],
		[ 'property', 'og:site_name', 'Nimbo Labs' ],
		[ 'property', 'og:title', $titulo ],
		[ 'property', 'og:description', $descricao ],
		[ 'property', 'og:url', $url ],
		[ 'property', 'og:image', $imagem ],
		[ 'property', 'og:image:width', '1200' ],
		[ 'property', 'og:image:height', '630' ],
		[ 'property', 'og:image:alt', 'Nimbo Labs: sites e sistemas que trabalham por você' ],
		[ 'name', 'twitter:card', 'summary_large_image' ],
	];
	foreach ( $meta as [ $atributo, $nome, $valor ] ) {
		printf( '<meta %s="%s" content="%s">' . "\n", esc_attr( $atributo ), esc_attr( $nome ), esc_attr( $valor ) );
	}

	printf( '<link rel="canonical" href="%s">' . "\n", esc_url( $url ) );

	$empresa = [
		'@context'    => 'https://schema.org',
		'@type'       => 'ProfessionalService',
		'name'        => 'Nimbo Labs',
		'url'         => $url,
		'logo'        => RL_THEME_URI . '/assets/img/favicon.svg',
		'image'       => $imagem,
		'description' => $descricao,
		'founder'     => [ '@type' => 'Person', 'name' => 'Rafael Lima' ],
		'areaServed'  => 'BR',
		'telephone'   => '+' . RL_WHATSAPP,
		'email'       => RL_EMAIL,
		'sameAs'      => [ RL_LINKEDIN, RL_GITHUB ],
	];
	printf(
		'<script type="application/ld+json">%s</script>' . "\n",
		wp_json_encode( $empresa, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE )
	);
}, 3 );

// O WordPress já imprime um canonical próprio; o tema cuida disso na página inicial.
add_action( 'wp_head', function () {
	if ( is_front_page() ) {
		remove_action( 'wp_head', 'rel_canonical' );
	}
}, 0 );
