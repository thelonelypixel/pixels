<?php

if( function_exists('acf_add_options_page') ) {
 
	$option_page = acf_add_options_page(array(
		'position' => 90,
		'page_title' 	=> 'Theme Settings',
		'menu_title' 	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-settings',
		'capability' 	=> 'edit_posts',
		'redirect' 	=> false
	));
 
}