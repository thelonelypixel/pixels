<?php
/**
 * Dual Text Block template.
 *
 * @param array $block The block settings and attributes.
 */

$field = [
    'background'       => get_field('background'),
    'show_block'       => get_field('show_block'),
    'left_content'     => get_field('left_content'),
    'right_content'    => get_field('right_content'),
    'padding_top'      => get_field('padding_top'),
    'padding_bottom'   => get_field('padding_bottom'),
];

$style = ''; // Initialize an empty style string.

// Check if padding-top value exists, then append the value and unit to the style string.
if (!empty($field['padding_top'])) {
    $style .= 'padding-top: ' . esc_attr($field['padding_top']) . 'px;';
}

// Check if padding-bottom value exists, then append the value and unit to the style string.
if (!empty($field['padding_bottom'])) {
    $style .= 'padding-bottom: ' . esc_attr($field['padding_bottom']) . 'px;';
}

$anchor = !empty($block['anchor']) ? 'id="' . esc_attr($block['anchor']) . '" ' : '';

if( $field['show_block'] ) : ?>

<section <?php echo $anchor; ?> class="block block__dual-text <?php echo $field['background']; ?>"<?php if ($style) echo 'style="' . $style . '"'; ?>>
	<div class="container">
		<div class="row row--justified">
			<div class="left-content column column-m-12 column-t-6">
				<?php echo $field['left_content']; ?>
			</div>
			<div class="right-content column column-m-12 column-t-6">
				<?php echo $field['right_content']; ?>
				<?php get_template_part('blocks/partials/buttons'); ?>
			</div>
		</div>
	</div>
</section>

<?php endif; ?>
