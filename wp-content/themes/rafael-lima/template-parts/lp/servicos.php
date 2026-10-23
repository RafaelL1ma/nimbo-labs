<?php
/**
 * Seção: serviços.
 */

$servicos = [
	[
		'icone'  => 'landing',
		'titulo' => 'Landing pages',
		'texto'  => 'Uma página com um único objetivo: vender, captar contatos ou divulgar um lançamento. Ideal para anúncios e campanhas.',
		'itens'  => [ 'Abre rápido no celular', 'Botão direto para o WhatsApp', 'Pronta para anúncios no Google e no Instagram' ],
	],
	[
		'icone'  => 'site',
		'titulo' => 'Sites institucionais',
		'texto'  => 'A casa do seu negócio na internet: quem você é, o que oferece e como falar com você.',
		'itens'  => [ 'Você mesmo edita textos e fotos', 'Estrutura pronta para o Google', 'Blog opcional' ],
	],
	[
		'icone'  => 'sistema',
		'titulo' => 'Sistemas sob medida',
		'texto'  => 'Quando a planilha já não dá conta: ferramentas feitas para o jeito que você trabalha.',
		'itens'  => [ 'Agendamentos e reservas', 'Área do cliente com login', 'Painéis de gestão e relatórios', 'Integração com pagamentos e WhatsApp' ],
	],
];
?>
<section class="secao" id="servicos">
	<div class="container">
		<header class="secao__cabeca">
			<p class="rotulo" data-reveal>Serviços</p>
			<h2 class="secao__titulo" data-split>O que podemos fazer pelo <em>seu negócio</em></h2>
		</header>

		<ul class="servicos" data-stagger>
			<?php foreach ( $servicos as $servico ) : ?>
				<li class="cartao cartao--luz" data-luz>
					<span class="cartao__icone"><?php echo rl_icone( $servico['icone'] ); // phpcs:ignore WordPress.Security.EscapeOutput ?></span>
					<h3 class="cartao__titulo"><?php echo esc_html( $servico['titulo'] ); ?></h3>
					<p class="cartao__texto"><?php echo esc_html( $servico['texto'] ); ?></p>
					<ul class="lista-check">
						<?php foreach ( $servico['itens'] as $item ) : ?>
							<li><?php echo rl_icone( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput ?><?php echo esc_html( $item ); ?></li>
						<?php endforeach; ?>
					</ul>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
