</main>

<footer class="site-footer">
	<div class="container site-footer__inner">
		<div class="site-footer__marca">
			<?php get_template_part( 'template-parts/logo' ); ?>
			<p>Landing pages, sites e sistemas sob medida</p>
		</div>
		<p>São Paulo – SP · Atendimento em todo o Brasil</p>
		<p>&copy; <?php echo esc_html( wp_date( 'Y' ) ); ?> Nimbo Labs · por Rafael Lima</p>
	</div>
</footer>

<a class="zap-flutuante" href="<?php echo esc_url( rl_whatsapp_url() ); ?>" target="_blank" rel="noopener" aria-label="<?php esc_attr_e( 'Falar no WhatsApp', 'rafael-lima' ); ?>" data-zap>
	<?php echo rl_icone( 'whatsapp' ); // phpcs:ignore WordPress.Security.EscapeOutput -- SVG fixo do tema. ?>
</a>

<?php wp_footer(); ?>
</body>
</html>
