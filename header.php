<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/dist/css/style-1471259722643.css">
	<!-- <link rel="stylesheet" media="min-width: 40em" href="./sass/style.css" > CSS for larger screens -->

	<?php wp_head(); ?>
</head>

<body id="site-body" <?php body_class(); ?> class="body">

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'mako' ); ?></a>

<header id="site-header" class="header" role="banner">
	<div class="site-branding">
		<!-- <?php
		if ( is_front_page() && is_home() ) : ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<?php else : ?>
			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
		<?php
		endif; ?> Different Header for home/first page and single pages-->

		<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
	</div><!-- .site-branding -->
</header><!-- #masthead -->

<nav id="site-navigation" class="nav" role="navigation">
	<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
</nav><!-- #site-navigation -->

