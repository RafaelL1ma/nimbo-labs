<?php
/**
 * Modelo genérico: usado por páginas internas (ex.: Política de Privacidade).
 */

get_header();
?>

<div class="container conteudo-pagina">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class(); ?>>
				<h1><?php the_title(); ?></h1>
				<div class="conteudo-pagina__texto">
					<?php the_content(); ?>
				</div>
			</article>
		<?php endwhile; ?>
	<?php else : ?>
		<h1><?php esc_html_e( 'Página não encontrada', 'rafael-lima' ); ?></h1>
		<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Voltar para o início', 'rafael-lima' ); ?></a></p>
	<?php endif; ?>
</div>

<?php
get_footer();
