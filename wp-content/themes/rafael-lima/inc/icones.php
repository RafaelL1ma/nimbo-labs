<?php
/**
 * Ícones do tema: traço de 1.6px em grade 24x24, herdando a cor do texto.
 */

defined( 'ABSPATH' ) || exit;

/**
 * Devolve o SVG de um ícone.
 */
function rl_icone( string $nome, string $classe = 'icone' ): string {
	$caminhos = [
		// Contato
		'whatsapp' => '<path d="M20.5 11.6a8.6 8.6 0 0 1-12.7 7.5L3.5 20.4l1.3-4.1a8.6 8.6 0 1 1 15.7-4.7z"/><path d="M9.1 8.2c.3-.6.6-.6.9-.6h.5c.2 0 .4.1.5.4l.7 1.6c.1.2 0 .5-.1.7l-.6.7c.5 1 1.3 1.8 2.3 2.3l.7-.6c.2-.2.5-.2.7-.1l1.6.7c.3.1.4.3.4.5v.5c0 .3 0 .6-.6.9-.9.5-2.6.3-4.5-1.5s-2.2-3.5-1.5-4.5z"/>',
		'email'    => '<rect x="3" y="5" width="18" height="14" rx="3"/><path d="m4 7 8 6 8-6"/>',
		'linkedin' => '<rect x="3" y="3" width="18" height="18" rx="4"/><path d="M8 10.5V17M8 7.5v.01M12 17v-6.5M12 13.2c0-1.6 1.1-2.7 2.5-2.7s2.5 1 2.5 2.7V17"/>',
		'github'   => '<path d="M9 19.5c-4.3 1.3-4.3-2.2-6-2.6M15 21.5v-3.3c0-1 .1-1.4-.5-2 2.8-.3 5.5-1.4 5.5-6a4.6 4.6 0 0 0-1.3-3.2 4.3 4.3 0 0 0-.1-3.2s-1-.3-3.4 1.3a11.6 11.6 0 0 0-6.2 0C6.6 3.5 5.6 3.8 5.6 3.8a4.3 4.3 0 0 0-.1 3.2A4.6 4.6 0 0 0 4.2 10.2c0 4.6 2.7 5.7 5.5 6-.6.6-.6 1.2-.5 2v3.3"/>',

		// Serviços
		'landing'  => '<rect x="3" y="3" width="18" height="18" rx="3"/><path d="M3 8h18M7 12.5h6M7 15.5h4"/><path d="m14.5 14.5 3 3M17.5 14.5v3h-3"/>',
		'site'     => '<circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3c2.5 2.6 3.7 5.6 3.7 9S14.5 18.4 12 21c-2.5-2.6-3.7-5.6-3.7-9S9.5 5.6 12 3z"/>',
		'sistema'  => '<rect x="3" y="3" width="7.5" height="9" rx="2"/><rect x="13.5" y="3" width="7.5" height="5" rx="2"/><rect x="13.5" y="11" width="7.5" height="10" rx="2"/><rect x="3" y="15" width="7.5" height="6" rx="2"/>',

		// Benefícios
		'raio'     => '<path d="M13 2.5 4.5 13.5H12l-1 8 8.5-11H12l1-8z"/>',
		'celular'  => '<rect x="6.5" y="2.5" width="11" height="19" rx="3"/><path d="M11 18.5h2"/>',
		'controle' => '<path d="M4 7h9M17 7h3M4 17h3M11 17h9"/><circle cx="15" cy="7" r="2"/><circle cx="9" cy="17" r="2"/>',
		'busca'    => '<circle cx="11" cy="11" r="6.5"/><path d="m20 20-4.4-4.4"/>',
		'conexao'  => '<path d="M10 14a4 4 0 0 0 5.7 0l3-3a4 4 0 0 0-5.7-5.7l-1 1"/><path d="M14 10a4 4 0 0 0-5.7 0l-3 3a4 4 0 0 0 5.7 5.7l1-1"/>',
		'chave'    => '<circle cx="8" cy="15" r="4.5"/><path d="m11.2 11.8 8.3-8.3M16.5 6.5l2.5 2.5M14 9l2 2"/>',

		// Interface
		'seta'     => '<path d="M5 12h14M13 6l6 6-6 6"/>',
		'check'    => '<path d="m5 12.5 4.5 4.5L19 7.5"/>',
		'mais'     => '<path d="M12 5v14M5 12h14"/>',
	];

	if ( ! isset( $caminhos[ $nome ] ) ) {
		return '';
	}

	return sprintf(
		'<svg class="%s" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">%s</svg>',
		esc_attr( $classe ),
		$caminhos[ $nome ]
	);
}
