<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'mako' ); ?></a>

<header id="site-header" class="header" role="banner">
	<div class="site-branding">
		<?php
		if ( is_front_page() && is_home() ) : ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<?php else : ?>
			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
		<?php
		endif; ?>
	</div><!-- .site-branding -->
</header><!-- #masthead -->

<nav id="site-navigation" class="nav" role="navigation">
	<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
</nav><!-- #site-navigation -->

