<?php get_header(); ?>

	<section class="content">
		<section class="posts">
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
		</section>


		<?php get_sidebar(); ?>
	</section>

<?php get_footer(); ?>