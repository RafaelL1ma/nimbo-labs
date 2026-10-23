<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#07070b">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#conteudo"><?php esc_html_e( 'Pular para o conteúdo', 'rafael-lima' ); ?></a>

<header class="site-header" data-header>
	<div class="container site-header__inner">
		<a class="site-header__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'Nimbo Labs - início', 'rafael-lima' ); ?>">
			<?php get_template_part( 'template-parts/logo' ); ?>
		</a>

		<?php
		wp_nav_menu( [
			'theme_location'  => 'principal',
			'container'       => 'nav',
			'container_class' => 'site-nav',
			'fallback_cb'     => false,
			'depth'           => 1,
		] );
		?>

		<a class="btn btn--primario btn--pequeno" href="<?php echo esc_url( rl_whatsapp_url() ); ?>" target="_blank" rel="noopener">
			<?php esc_html_e( 'Pedir orçamento', 'rafael-lima' ); ?>
		</a>
	</div>
</header>

<main id="conteudo" class="site-main">
