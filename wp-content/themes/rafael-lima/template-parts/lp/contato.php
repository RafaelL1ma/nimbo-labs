<?php
/**
 * Seção: chamada final e contatos.
 */
?>
<section class="secao contato" id="contato" data-spotlight>
	<div class="contato__brilho" aria-hidden="true"></div>
	<div class="container contato__inner">
		<h2 class="contato__titulo" data-split>Vamos tirar a sua ideia <em>do papel?</em></h2>
		<p class="contato__texto" data-reveal>Conte para nós o que você precisa. Em até 24 horas você recebe uma resposta, sem compromisso.</p>

		<a class="btn btn--primario btn--grande" href="<?php echo esc_url( rl_whatsapp_url() ); ?>" target="_blank" rel="noopener" data-reveal>
			<?php echo rl_icone( 'whatsapp' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
			Chamar no WhatsApp
		</a>

		<ul class="contatos" data-stagger>
			<?php foreach ( rl_contatos() as $contato ) : ?>
				<li>
					<a class="contatos__item" href="<?php echo esc_url( $contato['url'] ); ?>"<?php echo str_starts_with( $contato['url'], 'mailto:' ) ? '' : ' target="_blank" rel="noopener"'; ?>>
						<span class="contatos__icone"><?php echo rl_icone( $contato['icone'] ); // phpcs:ignore WordPress.Security.EscapeOutput ?></span>
						<span>
							<small><?php echo esc_html( $contato['rotulo'] ); ?></small>
							<?php echo esc_html( $contato['valor'] ); ?>
						</span>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
