	<?php 
		$container = get_field('footer_container' ,'options');
		$back_to_top = get_field('back_to_top' ,'options');
	?>

	<?php if( $back_to_top ) : ?>
		<button id="backToTopBtn" aria-label="Back to top" title="Back to top" class="back-to-top">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
				<path stroke-linecap="round" stroke-linejoin="round" d="M4.5 10.5L12 3m0 0l7.5 7.5M12 3v18" />
			</svg>
		</button>
	<?php endif; ?>

	<footer id="site-footer" class="site-footer" role="contentinfo">

		<?php 
			echo $container ? '<div class="container">' : '';
			get_template_part( 'parts/bottom', 'bar' );
			echo $container ? '</div>' : '';
		?>

	</footer>

	<?php wp_footer(); ?>

</body>
</html>
