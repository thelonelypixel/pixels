<?php

// Blocks

function register_acf_blocks() {
    // Define the base directory where your blocks are located
    $blocks_dir = get_template_directory() . '/blocks/';
    
    // Get a list of all the directories inside your blocks base directory
    $dirs = array_filter(glob($blocks_dir . '*'), 'is_dir');
    
    // Loop through all the directories
    foreach ($dirs as $dir) {
        // Create the path to the block.json file inside the current directory
        $block_json = $dir . '/block.json';
        
        // Check if block.json file exists inside the current directory
        if (file_exists($block_json)) {
            // Register the block using the path to the block.json file
            register_block_type($block_json);
        } else {
            // Log an error message if the block.json file does not exist in the current directory
            error_log('Block JSON file not found: ' . $block_json);
        }
    }
}

// Add the function to the 'init' action hook
add_action('init', 'register_acf_blocks', 10);

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

function allowed_block_types ( $block_editor_context, $editor_context ) {
	if ( ! empty( $editor_context->post ) ) {
		return array(
            'acf/hero',
            'acf/media',
            'acf/media-text',
            'acf/text',
            'acf/dual-text',
            'acf/grid',
            'acf/accordion',
            'acf/team',
            'acf/contact',
            'acf/breadcrumbs',
		);
	}

	return $block_editor_context;
}

add_filter( 'allowed_block_types_all', 'allowed_block_types', 10, 2 );
