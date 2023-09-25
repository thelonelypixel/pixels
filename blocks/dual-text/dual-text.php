<?php
/**
 * Dual Text Block template.
 *
 * @param array $block The block settings and attributes.
 */
$field = [
	// General Options
	'hide_block' => get_field('hide_block'),
    'background' => get_field('background'),

	// Content
    'left_content' => get_field('left_content'),
    'right_content' => get_field('right_content'),
];

$anchor = !empty($block['anchor']) ? 'id="' . esc_attr($block['anchor']) . '" ' : '';

?>

<?php if( ! $field['hide_block'] ) : ?>

<section <?php echo $anchor; ?> class="block block__dual-text <?php echo $field['background']; ?>">
	<div class="container">
		<div class="row row--justified">
			<div class="left-content column column-m-12 column-t-6">
				<?php echo $field['left_content']; ?>
			</div>
			<div class="right-content column column-m-12 column-t-6">
				<?php echo $field['right_content']; ?>
			</div>
		</div>
	</div>
</section>

<?php endif; ?>