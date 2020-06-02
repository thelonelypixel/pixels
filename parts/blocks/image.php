<?php
$margin_bottom = get_field('add_margin');
$image = get_field('image');
$show_content = get_field('show_content');
$content = get_field('content');
?>

<section class="block block__image <?php if($margin_bottom) : echo ' add-margin'; endif; ?>">
    <?php echo wp_get_attachment_image($image, "full"); ?>
	<?php if( $show_content ): ?>
		<div class="block__image__content">
			<?php echo $content; ?>
		</div>
		<div class="overlay"></div>
	<?php endif; ?>
</section>
