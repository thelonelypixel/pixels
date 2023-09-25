	<?php 
		$container = get_field('footer_container' ,'options');
	?>

	<footer class="site-footer" role="contentinfo">

		<?php 
			echo $container ? '<div class="container">' : '';
			get_template_part( 'parts/bottom', 'bar' );
			echo $container ? '</div>' : '';
		?>

	</footer>

	<?php wp_footer(); ?>

</body>
</html>
