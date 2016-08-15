<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/dist/css/style<TIMESTAMP>.css">
	<!-- <link rel="stylesheet" media="min-width: 40em" href="./sass/style.css" > CSS for larger screens -->

	<?php wp_head(); ?>
</head>

<body id="site-body" <?php body_class(); ?> class="body">

<?php get_header(); ?>

<section class="content">
	<section class="posts">
		<article class="post">

		</article>
	</section>
</section>

<section class="content">
	<section class="posts">
	<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
	</section>


	<?php get_sidebar(); ?>
</section>

<?php get_footer(); ?>