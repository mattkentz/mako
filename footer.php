
	<footer id="site-footer" class="footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'mako' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'mako' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'mako' ), 'mako', '<a href="http://www.mattkentzia.com" rel="designer">Matthias Kentzia</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
