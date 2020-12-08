<?php
$id = get_field("id");
$margin_bottom = get_field('add_margin');
$image = get_field('image');
$content = get_field('content');
$flip = get_field('flip');
$button_text = get_field('button_text');
$button_link = get_field('button_link');
?>

<section <?php if( $id ): ?>id="<?php echo $id; ?>"<?php endif; ?> class="block block__image-text <?php if($margin_bottom) : echo ' add-margin'; endif; ?> <?php if($flip): echo 'block__image-text--flipped'; endif; ?>">
	<div class="container row row--justified">
		<div class="block__image-text__image">
	    	<?php echo wp_get_attachment_image($image, "full"); ?>
		</div>

		<div class="block__image-text__content">
			<?php echo $content; ?>
			<?php get_template_part( 'parts/blocks/buttons'); ?>
		</div>
	</div>
</section>
