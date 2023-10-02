<?php
/**
 * Grid Block template.
 *
 * @param array $block The block settings and attributes.
 */

$field = [
	// Layouts
	'background' => get_field('background'),
    'layout' => get_field('layout'),
	'style' => get_field('style'),
    'alignment' => get_field('alignment'),
    'image_type' => get_field('image_type'),
	'columns' => get_field('columns'),
    'show_block' => get_field('show_block'),
    'padding_top'      => get_field('padding_top'),
    'padding_bottom'   => get_field('padding_bottom'),

	// Content
    'intro' => get_field('intro'),
 
];

$anchor = !empty($block['anchor']) ? 'id="' . esc_attr($block['anchor']) . '" ' : '';

$class_names = ['block', 'block__grid', $field['layout'], $field['alignment'], $field['style'], $field['background']];

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
	<div class="container">
        <div class="row row--justified">
            <div class="column">
                <?php if ($field['intro']): ?>
                    <?php if($field['layout'] === "block__grid--stacked"): ?>
                        <div class="row row--collapse row--justified">
                            <div class="column column-m-12 column-t-4">
                    <?php endif; ?>

                    <div class="block__grid__intro">
                        <?php echo $field['intro']; ?>
                    </div>
                    
                    <?php if($field['layout'] === "block__grid--stacked"): ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if(have_rows('grid')): ?>
                    <?php if($field['layout'] === "block__grid--stacked"): ?>
                        <div class="column column-m-12 column-t-8">
                    <?php endif; ?>

                    <div class="block__grid__grid <?php echo $field['columns']; ?>">
                        <?php while (have_rows('grid')): the_row(); 
                            $item = [
                                'heading' => get_sub_field('heading'),
                                'image' => get_sub_field('image'),
                                'icon' => get_sub_field('icon'),
                                'size' => "full",
                                'link' => get_sub_field('link'),
                                'content' => get_sub_field('content'),
                            ];
                        ?>
                            <div class="grid-item">
                                <?php if (isset($field['image_type']) && $field['image_type'] === "block__grid--icon" || isset($field['style']) && $field['style'] === "block__grid--style--list"): ?>
                                    <div class="grid-item__icon">
                                        <?php echo wp_get_attachment_image($item['icon'], $item['size']); ?>
                                    </div>
                                <?php else: ?>
                                    <div class="grid-item__image">
                                        <?php echo wp_get_attachment_image($item['image'], $item['size']); ?>
                                    </div>
                                <?php endif; ?>

                                <div class="grid-item__content">
                                    <?php if( $item['heading']): ?>
                                        <h3><?php echo $item['heading']; ?></h3>
                                    <?php endif; ?>
                                    <?php if( $item['content']):
                                        echo $item['content'];
                                    endif; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <?php if($field['layout'] === "block__grid--stacked"): ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
	</div>
</section>

<?php endif; ?>
