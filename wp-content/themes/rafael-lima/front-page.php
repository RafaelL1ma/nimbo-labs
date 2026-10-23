<?php
/**
 * Landing page (página inicial).
 *
 * Cada seção vive em template-parts/lp/<nome>.php. Para criar uma seção nova,
 * crie o arquivo e adicione o nome na lista abaixo, na ordem em que aparece.
 */

get_header();

$secoes = [
	'hero',
	'lancamento',
	'servicos',
	'beneficios',
	'demonstracoes',
	'processo',
	'precos',
	'duvidas',
	'contato',
];

foreach ( $secoes as $secao ) {
	get_template_part( 'template-parts/lp/' . $secao );
}

get_footer();
