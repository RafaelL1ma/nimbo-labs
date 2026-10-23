<?php
/**
 * Seção: preços. Valores de lançamento para os 5 primeiros projetos.
 */

$pacotes = [
	[
		'nome'     => 'LP Essencial',
		'preco'    => 'R$ 997',
		'depois'   => 'depois R$ 1.500',
		'destaque' => false,
		'itens'    => [ 'Até 5 seções', 'Visual moderno, feito para o celular', 'Botão de WhatsApp', 'Pronta para o Google', '2 rodadas de ajustes', 'Entrega em até 14 dias' ],
		'mensagem' => 'Olá! Vim pelo site da Nimbo Labs e tenho interesse na LP Essencial.',
	],
	[
		'nome'     => 'LP Completa',
		'preco'    => 'R$ 1.490',
		'depois'   => 'depois R$ 2.200',
		'destaque' => true,
		'itens'    => [ 'Até 8 seções', 'Animações sob medida', 'Revisão dos seus textos', 'Integração com formulário ou ferramenta de e-mail', '2 rodadas de ajustes', 'Entrega em até 14 dias' ],
		'mensagem' => 'Olá! Vim pelo site da Nimbo Labs e tenho interesse na LP Completa.',
	],
	[
		'nome'     => 'Sites e sistemas',
		'preco'    => 'Sob medida',
		'depois'   => '',
		'destaque' => false,
		'itens'    => [ 'Orçamento depois de uma conversa rápida para entender o que você precisa.' ],
		'mensagem' => 'Olá! Vim pelo site da Nimbo Labs e quero um orçamento para site ou sistema.',
	],
];

$planos = [
	[ 'Plano Essencial', 'R$ 150', 'Atualizações, backup semanal e monitoramento de segurança.' ],
	[ 'Plano Completo', 'R$ 300', 'Tudo do Essencial + até 2 horas de ajustes por mês + relatório mensal de visitas.' ],
];
?>
<section class="secao" id="precos">
	<div class="container">
		<header class="secao__cabeca">
			<p class="rotulo" data-reveal>Preços</p>
			<h2 class="secao__titulo" data-split>Preços <em>claros</em></h2>
		</header>

		<ul class="precos" data-stagger>
			<?php foreach ( $pacotes as $pacote ) : ?>
				<li class="preco<?php echo $pacote['destaque'] ? ' preco--destaque' : ''; ?>" data-luz>
					<?php if ( $pacote['destaque'] ) : ?>
						<span class="preco__selo">Recomendada</span>
					<?php endif; ?>
					<h3 class="preco__nome"><?php echo esc_html( $pacote['nome'] ); ?></h3>
					<p class="preco__valor"><?php echo esc_html( $pacote['preco'] ); ?></p>
					<p class="preco__depois">
						<?php echo $pacote['depois'] ? esc_html( 'Preço de lançamento · ' . $pacote['depois'] ) : '&nbsp;'; ?>
					</p>
					<ul class="lista-check">
						<?php foreach ( $pacote['itens'] as $item ) : ?>
							<li><?php echo rl_icone( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput ?><?php echo esc_html( $item ); ?></li>
						<?php endforeach; ?>
					</ul>
					<a class="btn <?php echo $pacote['destaque'] ? 'btn--primario' : 'btn--fantasma'; ?> preco__botao" href="<?php echo esc_url( rl_whatsapp_url( $pacote['mensagem'] ) ); ?>" target="_blank" rel="noopener">
						<?php echo 'Sob medida' === $pacote['preco'] ? 'Pedir orçamento' : 'Quero esta'; ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>

		<p class="precos__nota" data-reveal>
			Preço de lançamento válido para os 5 primeiros projetos, em troca de um depoimento e da autorização para mostrar o projeto no nosso portfólio.
			Pagamento: 50% na aprovação da proposta e 50% na entrega.
		</p>

		<div class="planos" data-stagger>
			<?php foreach ( $planos as [ $nome, $valor, $texto ] ) : ?>
				<div class="plano">
					<div>
						<h3><?php echo esc_html( $nome ); ?></h3>
						<p><?php echo esc_html( $texto ); ?></p>
					</div>
					<p class="plano__valor"><?php echo esc_html( $valor ); ?><small>/mês</small></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
