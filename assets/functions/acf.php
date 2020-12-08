<?php

if (function_exists('acf_add_options_page')) {
    $option_page = acf_add_options_page(array(
        'position' => 90,
        'page_title' 	=> 'Theme Settings',
        'menu_title' 	=> 'Theme Settings',
        'menu_slug' 	=> 'theme-settings',
        'capability' 	=> 'edit_posts',
        'redirect' 	=> false
    ));
}

function my_acf_init()
{
    acf_update_setting('google_api_key', 'AIzaSyBkqX8Wol5r77RKjGw39US6Frl3HUfKn18');
}

add_action('acf/init', 'my_acf_init');

// Blocks
function register_acf_block_types()
{
    acf_register_block_type(array(
        'name'              => 'hero',
        'title'             => __('Hero'),
        'description'       => __('A custom Image block.'),
        'render_template'   => 'parts/blocks/hero.php',
        'icon'              => 'format-image',
        'keywords'          => array( 'hero', 'quote' ),
        'supports'			=> array( 'align' => false),
        'mode' => 'edit',
    ));

    acf_register_block_type(array(
        'name'              => 'cta',
        'title'             => __('CTA'),
        'description'       => __('A custom cta block.'),
        'render_template'   => 'parts/blocks/cta.php',
        'icon'              => 'format-image',
        'keywords'          => array( 'cta', 'quote' ),
        'supports'			=> array( 'align' => false),
        'mode' => 'edit',
    ));

    acf_register_block_type(array(
        'name'              => 'image',
        'title'             => __('Image'),
        'description'       => __('A custom image block.'),
        'render_template'   => 'parts/blocks/image.php',
        'icon'              => 'format-image',
        'keywords'          => array( 'image', 'quote' ),
        'supports'			=> array( 'align' => false),
        'mode' => 'edit',
    ));

    acf_register_block_type(array(
        'name'              => 'video',
        'title'             => __('Video'),
        'description'       => __('A custom video block.'),
        'render_template'   => 'parts/blocks/video.php',
        'icon'              => 'format-image',
        'keywords'          => array( 'video', 'quote' ),
        'supports'			=> array( 'align' => false),
        'mode' => 'edit',
    ));

    acf_register_block_type(array(
        'name'              => 'cards',
        'title'             => __('Cards'),
        'description'       => __('A custom card block.'),
        'render_template'   => 'parts/blocks/cards.php',
        'icon'              => 'format-image',
        'keywords'          => array( 'cards', 'quote' ),
        'supports'			=> array( 'align' => false),
        'mode' => 'edit',
    ));

    acf_register_block_type(array(
        'name'              => 'image-text',
        'title'             => __('Image/Text'),
        'description'       => __('A custom image/text block.'),
        'render_template'   => 'parts/blocks/image-text.php',
        'icon'              => 'format-image',
        'keywords'          => array( 'image-text', 'quote' ),
        'supports'			=> array( 'align' => false),
        'mode' => 'edit',
    ));

    acf_register_block_type(array(
        'name'              => 'recent-posts',
        'title'             => __('Recent Posts'),
        'description'       => __('A custom recent posts block.'),
        'render_template'   => 'parts/blocks/recent-posts.php',
        'icon'              => 'format-image',
        'keywords'          => array( 'recent-posts', 'quote' ),
        'supports'			=> array( 'align' => false),
        'mode' => 'edit',
    ));

    acf_register_block_type(array(
        'name'              => 'accordion',
        'title'             => __('Accordion'),
        'description'       => __('A custom accordion block.'),
        'render_template'   => 'parts/blocks/accordion.php',
        'icon'              => 'format-image',
        'keywords'          => array( 'accordion', 'quote' ),
        'supports'			=> array( 'align' => false),
        'mode' => 'edit',
    ));

    acf_register_block_type(array(
        'name'              => 'text-content',
        'title'             => __('Text Content'),
        'description'       => __('A custom Text Content block.'),
        'render_template'   => 'parts/blocks/text-content.php',
        'icon'              => 'editor-alignleft',
        'keywords'          => array( 'banner', 'quote' ),
        'supports'			=> array( 'align' => false),
        'mode' => 'edit',
    ));
}

// Check if function exists and hook into setup.
if (function_exists('acf_register_block_type')) {
    add_action('acf/init', 'register_acf_block_types');
}

// Custom Filter for blocks - Only shows below list.
// Custom block types use 'acf/custom_block_name_here'
function template_allowed_block_types($allowed_blocks)
{
    return array(
        'acf/hero',
        'acf/cta',
        'acf/image',
        'acf/video',
        'acf/image-text',
        'acf/text-content',
        'acf/cards',
        'acf/accordion',
    );
}
add_filter('allowed_block_types', 'template_allowed_block_types');
