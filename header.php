<!doctype html>

  <html class="no-js"  <?php language_attributes(); ?>>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

	<?php 
		$sticky = get_field('sticky', 'options');
		$container = get_field('container', 'options');
	?>	

	<header x-data="{ isNavOpen: false }" @nav-toggle.window="isNavOpen = $event.detail.isOpen" :class="{ 'offcanvas-open': isNavOpen }" class="header <?php if( $sticky ): ?>header-sticky<?php endif; ?>" role="banner">
		<?php 
			echo $container ? '<div class="container">' : '';
			get_template_part( 'parts/top', 'bar' );
			echo $container ? '</div>' : '';
		?>
	</header>
