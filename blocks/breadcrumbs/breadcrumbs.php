<?php
/**
 * Breadcrumbs Block template.
 *
 * @param array $block The block settings and attributes.
 */

$field = [
    'background'       => get_field('background'),
    'show_icon'        => get_field('show_icon', 'options'),
    'seperator'        => get_field('seperator', 'options'),
    'show_block'       => get_field('show_block'),
    'padding_top'      => get_field('padding_top'),
    'padding_bottom'   => get_field('padding_bottom')
];

$anchor = !empty($block['anchor']) ? 'id="' . esc_attr($block['anchor']) . '" ' : '';

$breadcrumbs = custom_breadcrumbs();

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

<section <?php echo $anchor; ?> class="block block__breadcrumbs <?php echo $field['background']; ?>"<?php if ($style) echo 'style="' . $style . '"'; ?>>
	<div class="container">
		<div class="row row--justified">
			<div class="block__accordion__heading column column-m-12">
                <ul class="breadcrumbs-list">
                    <?php
                    foreach ($breadcrumbs as $key => $breadcrumb) {
                        echo '<li>';
                        if ($key === 0) { // Checking if it's the "Home" breadcrumb
                            if ($field['show_icon']) {
                                // Display the SVG icon for Home
                                echo '<a href="' . $breadcrumb['url'] . '">';
                                echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2L3 11h3v10h6V16h2v5h6V11h3L12 2z"/></svg>';
                                echo '</a>';
                            } else {
                                echo '<a href="' . $breadcrumb['url'] . '">' . $breadcrumb['title'] . '</a>';
                            }
                        } else {
                            // If it's the last breadcrumb, output as text, otherwise as a link
                            if ($key === count($breadcrumbs) - 1) {
                                echo esc_html($breadcrumb['title']);
                            } else {
                                echo '<a href="' . $breadcrumb['url'] . '">' . esc_html($breadcrumb['title']) . '</a>';
                            }
                        }

                        if ($key != count($breadcrumbs) - 1) {
                            echo '<span class="separator">' . esc_html($field['seperator']) . '</span>';
                        }
                        echo '</li>';
                    }
                    ?>
                </ul>
			</div>
		</div>
	</div>
</section>

<?php endif; ?>
