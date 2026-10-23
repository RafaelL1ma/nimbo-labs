<?php
/**
 * Funções do tema Nimbo Labs.
 */

defined( 'ABSPATH' ) || exit;

define( 'RL_THEME_DIR', get_template_directory() );
define( 'RL_THEME_URI', get_template_directory_uri() );

require RL_THEME_DIR . '/inc/limpeza.php';
require RL_THEME_DIR . '/inc/contato.php';
require RL_THEME_DIR . '/inc/icones.php';
require RL_THEME_DIR . '/inc/seo.php';

add_action( 'after_setup_theme', function () {
	load_theme_textdomain( 'rafael-lima', RL_THEME_DIR . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'html5', [ 'search-form', 'gallery', 'caption', 'style', 'script', 'navigation-widgets' ] );

	register_nav_menus( [
		'principal' => __( 'Menu principal', 'rafael-lima' ),
	] );
} );

/**
 * URL de um arquivo do tema com a data de modificação como versão (fura o cache).
 */
function rl_versao( string $arquivo ): string {
	return (string) filemtime( RL_THEME_DIR . $arquivo );
}

/**
 * CSS e JS. As animações usam GSAP + ScrollTrigger e a rolagem suave usa Lenis,
 * todos hospedados no tema (assets/vendor).
 */
add_action( 'wp_enqueue_scripts', function () {
	$vendor = RL_THEME_URI . '/assets/vendor/';

	wp_enqueue_style( 'lenis', $vendor . 'lenis.css', [], '1.3.26' );
	wp_enqueue_style( 'rl-main', RL_THEME_URI . '/assets/css/main.css', [ 'lenis' ], rl_versao( '/assets/css/main.css' ) );

	$adiar = [ 'strategy' => 'defer', 'in_footer' => true ];
	wp_enqueue_script( 'gsap', $vendor . 'gsap.min.js', [], '3.15.0', $adiar );
	wp_enqueue_script( 'gsap-scrolltrigger', $vendor . 'ScrollTrigger.min.js', [ 'gsap' ], '3.15.0', $adiar );
	wp_enqueue_script( 'lenis', $vendor . 'lenis.min.js', [], '1.3.26', $adiar );
	wp_enqueue_script( 'rl-main', RL_THEME_URI . '/assets/js/main.js', [ 'gsap', 'gsap-scrolltrigger', 'lenis' ], rl_versao( '/assets/js/main.js' ), $adiar );
} );

/**
 * Favicon e pré-carregamento das fontes.
 */
add_action( 'wp_head', function () {
	if ( ! has_site_icon() ) {
		printf( '<link rel="icon" href="%s" type="image/svg+xml">' . "\n", esc_url( RL_THEME_URI . '/assets/img/favicon.svg' ) );
	}

	foreach ( [ 'geist', 'geist-mono' ] as $fonte ) {
		printf(
			'<link rel="preload" href="%s" as="font" type="font/woff2" crossorigin>' . "\n",
			esc_url( RL_THEME_URI . '/assets/fonts/' . $fonte . '.woff2' )
		);
	}
}, 1 );

/**
 * Marca o <html> antes da pintura: com JS, os elementos animados começam escondidos;
 * sem JS, tudo aparece normalmente. Se o GSAP não carregar em 3s, mostra tudo.
 */
add_action( 'wp_head', function () {
	wp_print_inline_script_tag(
		"document.documentElement.classList.add('js');" .
		"setTimeout(function(){if(!window.gsap){document.documentElement.classList.remove('js');}},3000);"
	);
}, 0 );
