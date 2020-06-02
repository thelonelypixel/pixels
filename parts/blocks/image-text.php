<?php
$margin_bottom = get_field('add_margin');
$image = get_field('image');
$content = get_field('content');
$flip = get_field('flip');
$button_text = get_field('button_text');
$button_link = get_field('button_link');
?>

<section class="block block__image-text <?php if($margin_bottom) : echo ' add-margin'; endif; ?> <?php if($flip): echo 'block__image-text--flipped'; endif; ?>">
	<div class="container row row--justified">
		<div class="block__image-text__image">
	    	<?php echo wp_get_attachment_image($image, "full"); ?>
		</div>

		<div class="block__image-text__content">
			<?php echo $content; ?>
			<?php if( $button_link): ?>
				<a class="button" href="<?php echo $button_link; ?>"><?php echo $button_text; ?></a>
			<?php endif; ?>
		</div>
	</div>
</section>
