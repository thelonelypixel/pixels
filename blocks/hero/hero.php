<?php
/**
 * Hero Block template.
 *
 * @param array $block The block settings and attributes.
 */

 $field = [
	// General Options
    'hero_type' => get_field('hero_type'),

	// Content
    'image' => get_field('hero_image'),
    'video' => get_field('hero_video_file'),
	'size'  => 'full',
    'content' => get_field('hero_content'),
];
?>

<section class="block block__hero <?php echo $field['hero_type']; ?>">

	<!-- Content -->
	<div class="container">
		<div class="row">
			<div class="column column-m-12 column-t-7 column-d-6">
				<div class="block__hero__content">
					<?php echo $field['content']; ?>
					<?php get_template_part('blocks/partials/buttons'); ?>
				</div>
			</div>
		</div>
	</div>

	<?php if ( $field['hero_type'] == "block__hero--video" ): ?>
		<!-- Video -->
		<div class="block__hero__video">
			<video src="<?php echo $field['video']; ?>" autoplay loop playsinline></video>
            <div class="overlay"></div>
		</div>
	<?php endif; ?>

    <?php if ( $field['hero_type'] == "block__hero--image" ): ?>
		<!-- Content -->
        <div class="block__hero__image">
            <?php echo wp_get_attachment_image($field['image'], $field['size']); ?>
            <div class="overlay"></div>
        </div>
    <?php endif; ?>

</section>
