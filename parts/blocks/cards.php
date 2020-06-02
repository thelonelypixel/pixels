<?php
	$margin = get_field('add_margin');
	$heading = get_field('heading');
	$button = get_field('make_buttons');
?>

<section class="block block__cards<?php if( $margin ): ?> add-margin<?php endif; ?>">
	<div class="container">
		<?php if( $heading ): ?>
			<div class="block__cards__heading">
				<h2><?php echo $heading; ?></h2>
			</div>
		<?php endif; ?>
		<?php if ( have_rows('cards') ): ?>
			<div class="row row--justified">
				<?php while ( have_rows('cards') ) : the_row();

				$heading = get_sub_field('heading');
				$image = get_sub_field('icon');
				$size = "full";
				$link = get_sub_field('link');
				$content = get_sub_field('content');

				?>
					<?php if( $button ): ?>
						<a class="block__cards__card column-m-12 column-t-4" href="<?php the_sub_field('link'); ?>">
					<?php else: ?>
						<div class="block__cards__card column-m-12 column-t-4">
					<?php endif; ?>
						<?php echo wp_get_attachment_image( $image, $size ); ?>
						<h3><?php echo $heading; ?></h3>
						<?php echo $content; ?>
					<?php if( $button ): ?>
						</a>
					<?php else: ?>
						</div>
					<?php endif; ?>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
