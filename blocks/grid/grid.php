<?php
/**
 * Grid Block template.
 *
 * @param array $block The block settings and attributes.
 */

$fields = [
	// Layouts
	'background' => get_field('background'),
    'layout' => get_field('layout'),
	'style' => get_field('style'),
    'alignment' => get_field('alignment'),
    'image_type' => get_field('image_type'),
	'columns' => get_field('columns'),
    'show_block' => get_field('show_block'),

	// Content
    'intro' => get_field('intro'),
 
];

$anchor = !empty($block['anchor']) ? 'id="' . esc_attr($block['anchor']) . '" ' : '';

$class_names = ['block', 'block__grid', $fields['layout'], $fields['alignment'], $fields['style'], $fields['background']] ?>

<?php if( $fields['show_block'] ) : ?>

<section <?php echo $anchor; ?> class="<?php echo implode(' ', $class_names); ?>">
	<div class="container">
        <div class="row row--justified">
            <div class="column">
                <?php if ($fields['intro']): ?>
                    <?php if($fields['layout'] === "block__grid--stacked"): ?>
                        <div class="row row--collapse row--justified">
                            <div class="column column-m-12 column-t-4">
                    <?php endif; ?>

                    <div class="block__grid__intro">
                        <?php echo $fields['intro']; ?>
                    </div>
                    
                    <?php if($fields['layout'] === "block__grid--stacked"): ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if(have_rows('grid')): ?>
                    <?php if($fields['layout'] === "block__grid--stacked"): ?>
                        <div class="column column-m-12 column-t-8">
                    <?php endif; ?>

                    <div class="block__grid__grid <?php echo $fields['columns']; ?>">
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
                                <?php if (isset($fields['image_type']) && $fields['image_type'] === "block__grid--icon" || isset($fields['style']) && $fields['style'] === "block__grid--style--list"): ?>
                                    <div class="grid-item__icon">
                                        <?php echo wp_get_attachment_image($item['icon'], $item['size']); ?>
                                    </div>
                                <?php else: ?>
                                    <div class="grid-item__image">
                                        <?php echo wp_get_attachment_image($item['image'], $item['size']); ?>
                                    </div>
                                <?php endif; ?>

                                <div class="grid-item__content">
                                    <h3><?php echo $item['heading']; ?></h3>
                                    <?php echo $item['content']; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <?php if($fields['layout'] === "block__grid--stacked"): ?>
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
