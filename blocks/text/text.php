<?php
$field = [
	// General Options
    'background' => get_field('background'),
	'show_block' => get_field('show_block'),
	'padding_top'      => get_field('padding_top'),
    'padding_bottom'   => get_field('padding_bottom'),

	// Content
    'content' => get_field('content'),
];

$anchor = !empty($block['anchor']) ? 'id="' . esc_attr($block['anchor']) . '" ' : '';

$style = ''; // Initialize an empty style string.

// Check if padding-top value exists, then append the value and unit to the style string.
if (!empty($field['padding_top'])) {
    $style .= 'padding-top: ' . esc_attr($field['padding_top']) . 'px;';
}

// Check if padding-bottom value exists, then append the value and unit to the style string.
if (!empty($field['padding_bottom'])) {
    $style .= 'padding-bottom: ' . esc_attr($field['padding_bottom']) . 'px;';
}

?>

<?php if( $field['show_block'] ) : ?>

<section <?php echo $anchor; ?> class="block block__text <?php echo $field['background']; ?>" <?php if ($style) echo 'style="' . $style . '"'; ?>>
	<div class="container">
		<div class="row">
			<div class="column column-m-12">
				<?php echo $field['content']; ?>
			</div>
		</div>
	</div>
</section>

<?php endif; ?>
