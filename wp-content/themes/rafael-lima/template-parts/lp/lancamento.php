<?php
/**
 * Seção: faixa da oferta de lançamento + letreiro com os tipos de projeto.
 */

$palavras = [ 'Landing pages', 'Sites institucionais', 'Sistemas sob medida', 'Agendamentos', 'Áreas de cliente', 'Painéis de gestão', 'Integrações' ];
?>
<section class="lancamento" aria-label="Oferta de lançamento">
	<div class="container">
		<div class="lancamento__faixa" data-reveal>
			<p>
				<span class="lancamento__selo"><span class="etiqueta__ponto"></span>Vagas de lançamento</span>
				Landing pages a partir de <strong>R$ 997</strong> para os 5 primeiros projetos.
			</p>
			<a class="btn btn--claro btn--pequeno" href="<?php echo esc_url( rl_whatsapp_url( 'Olá! Vim pelo site da Nimbo Labs e quero garantir uma vaga de lançamento.' ) ); ?>" target="_blank" rel="noopener">
				Garantir minha vaga
				<?php echo rl_icone( 'seta' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
			</a>
		</div>
	</div>

	<div class="letreiro" aria-hidden="true">
		<?php for ( $i = 0; $i < 2; $i++ ) : ?>
			<div class="letreiro__trilho">
				<?php foreach ( $palavras as $palavra ) : ?>
					<span><?php echo esc_html( $palavra ); ?></span><span class="letreiro__sep">✦</span>
				<?php endforeach; ?>
			</div>
		<?php endfor; ?>
	</div>
</section>
