	<?php
    // Getting the layout value
    $layout = get_field('layout', 'option');

    // Getting the repeater field value
    $menu_items = get_field('menu', 'option');

	// getting the style value
	$style = get_field('style', 'option');

	$logo = get_field('logo', 'option');
	
	?>

	<div class="header__inner <?php echo $layout; ?>">
	
		<div class="column column-m-12">

			<div class="row row--middle">

			<!-- Logo -->
			<a class="brand" href="<?= esc_url(home_url('/')); ?>">
				<?php echo wp_get_attachment_image( $logo, 'full' ); ?>
			</a>

			<!-- Navigation -->

			<?php if( $menu_items ): ?>

				<nav class="navbar <?php echo $layout !== 'header-layout--hamburger' ? $style : ''; ?>" x-data="{ open: null, isNavOpen: false }" role="navigation" aria-label="Main Navigation">

					<!-- Hamburger button -->
					<button 
						@click="isNavOpen = !isNavOpen; $dispatch('nav-toggle', { isOpen: isNavOpen })" 
						class="hamburger">
						<span :class="{'offcanvas-active': isNavOpen}"></span>
					</button>

					<?php if ($layout !== 'header-layout--hamburger'): ?>
            			<?php include 'nav.php'; ?>
       				<?php endif; ?>

					<!-- Fullscreen overlay for hamburger layout -->
					<div class="offcanvas" x-show.transition="isNavOpen">
						<div class="container">
							<div class="row">
								<div class="column column-m-12">
									<?php include 'nav.php'; ?>
								</div>
							</div>
						</div>
					</div>

				</nav>

			<?php endif; ?>

		</div>

	</div>

</div>
