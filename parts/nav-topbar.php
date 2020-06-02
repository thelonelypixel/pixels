<div class="row row--justified">
	<!-- Logo -->
	<a class="brand" href="<?= esc_url(home_url('/')); ?>">
		<?php get_img('logo.svg', get_bloginfo('name')); ?>
	</a>

	<!-- Desktop Navigation -->
	<nav class="nav-primary">
		<?php mirai_top_nav(); ?>
	</nav>

	<!-- Mobile Navigation -->
	<div class="mobile-trigger">
		<span></span>
	</div>
</div>
