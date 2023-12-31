<?php
/**
 * Media Text Block template.
 *
 * @param array $block The block settings and attributes.
 */

$field = [
	// General Options
    'background' => get_field('background'),
    'flip' => get_field('flip'),
    'media_type' => get_field('media_type'),
    'float_container' => get_field('float_container'),
    'layout' => get_field('layout'),
	'show_block' => get_field('show_block'),
	'padding_top'      => get_field('padding_top'),
    'padding_bottom'   => get_field('padding_bottom'),

	// Content
    'image' => get_field('image'),
    'video' => get_field('video'),
    'content' => get_field('content'),

	// List
    'add_list' => get_field('add_list'),

	// Quote
    'add_quote' => get_field('add_quote'),
    'quote' => get_field('quote'),
    'author' => get_field('author')
];

$anchor = !empty($block['anchor']) ? 'id="' . esc_attr($block['anchor']) . '" ' : '';

$class_names = ['block', 'block__media-text', $field['background'], $field['layout']];
if ($field['flip']) {
    $class_names[] = 'block__media-text--flipped';
}

$list_partial = ($field['layout'] === "block__media-text--large" && $field['add_list']) ? 'blocks/partials/list' : null;

$style = ''; // Initialize an empty style string.

// Check if padding-top value exists, then append the value and unit to the style string.
if (!empty($field['padding_top'])) {
    $style .= 'padding-top: ' . esc_attr($field['padding_top']) . 'px;';
}

// Check if padding-bottom value exists, then append the value and unit to the style string.
if (!empty($field['padding_bottom'])) {
    $style .= 'padding-bottom: ' . esc_attr($field['padding_bottom']) . 'px;';
}

if( $field['show_block'] ) : ?>

<section <?php echo $anchor; ?> class="<?php echo implode(' ', $class_names); ?>" <?php if ($style) echo 'style="' . $style . '"'; ?>>
	<div class="container <?php echo $field['float_container'] ? 'container--float' : ''; ?>">
		<div class="row row--justified">
			<div class="block__media-text__media column column-m-12 column-t-6">
				<?php echo $field['media_type'] == 'video' ? $field['video'] : wp_get_attachment_image($field['image'], "full"); ?>

				<?php if ($field['quote'] && $field['layout'] === 'block__media-text--default'): ?>
					<blockquote>
   						<p><?php echo $field['quote']; ?></p>
						<footer>
							<cite><?php echo $field['author']; ?></cite>
						</footer>
					</blockquote>
				<?php endif; ?>

				<?php if ($list_partial) get_template_part($list_partial); ?>
			</div>

			<div class="block__media-text__content column column-m-12 column-t-6">
				<?php echo $field['content']; ?>
				<?php if (!$list_partial && $field['add_list']) get_template_part('blocks/partials/list'); ?>
				<?php get_template_part('blocks/partials/buttons'); ?>
			</div>
		</div>
	</div>
</section>

<?php endif; ?>
