<?php
/**
 * Dados de contato usados em toda a LP. Mudou algum? Mude só aqui.
 */

defined( 'ABSPATH' ) || exit;

const RL_WHATSAPP = '5588997313275';
const RL_TELEFONE = '(88) 99731-3275';
const RL_EMAIL    = 'lima.rafael67@hotmail.com';
const RL_LINKEDIN = 'https://www.linkedin.com/in/rafaell1ma/';
const RL_GITHUB   = 'https://github.com/RafaelL1ma';

/**
 * Link do WhatsApp com mensagem inicial.
 */
function rl_whatsapp_url( string $mensagem = 'Olá! Vim pelo site da Nimbo Labs e quero um orçamento.' ): string {
	return 'https://wa.me/' . RL_WHATSAPP . '?text=' . rawurlencode( $mensagem );
}

/**
 * Os 4 canais de contato, na ordem em que aparecem.
 *
 * @return array<int, array{icone: string, rotulo: string, valor: string, url: string}>
 */
function rl_contatos(): array {
	return [
		[ 'icone' => 'whatsapp', 'rotulo' => 'WhatsApp', 'valor' => RL_TELEFONE, 'url' => rl_whatsapp_url() ],
		[ 'icone' => 'email', 'rotulo' => 'E-mail', 'valor' => RL_EMAIL, 'url' => 'mailto:' . RL_EMAIL ],
		[ 'icone' => 'linkedin', 'rotulo' => 'LinkedIn', 'valor' => '/in/rafaell1ma', 'url' => RL_LINKEDIN ],
		[ 'icone' => 'github', 'rotulo' => 'GitHub', 'valor' => '/RafaelL1ma', 'url' => RL_GITHUB ],
	];
}
