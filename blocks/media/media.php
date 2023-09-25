<?php
/**
 * Accordion Block template.
 *
 * @param array $block The block settings and attributes.
 */
$field = [
	// General Options
    'background' => get_field('background'),
	'add_poster' => get_field('add_poster'),

	// Content
    'media_type' => get_field('media_type'),
	'video' => get_field('video'),
	'poster' => get_field('poster'),
	'image' => get_field('image'),

];

$anchor = !empty($block['anchor']) ? 'id="' . esc_attr($block['anchor']) . '" ' : '';

?>

<section <?php echo $anchor; ?> class="block block__media <?php echo $field['background']; ?>">
	<div class="container">
		<div class="row row--justified">
			<div class="column column-m-1 column-t-12 relative">
				<div class="media-wrapper">
					<?php if( $field['media_type'] == 'Video' ): ?>
						<?php if( $field['add_poster'] ): ?>
							<div class="media-poster">
								<img src="<?php echo wp_get_attachment_image_src($field['poster'], "full")[0]; ?>" class="video-poster">
								<svg width="187" height="187" viewBox="0 0 187 187" fill="none" xmlns="http://www.w3.org/2000/svg">
									<circle cx="93.84" cy="93.5" r="93" fill="black"/>
									<path d="M138.48 94.4302L72.915 132.284L72.915 56.5762L138.48 94.4302Z" fill="white"/>
								</svg>
							</div>
						<?php endif; ?>

						<iframe id="your-video-id" src="https://www.youtube.com/embed/<?php echo $field['video']; ?>?enablejsapi=1"></iframe>
					<?php else: ?>
						<?php echo wp_get_attachment_image($field['image'], "full"); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
