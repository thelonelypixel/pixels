<?php

// Adding WP Functions & Theme Support
function pixels_theme_support() {

	// Add support for block styles.
	add_theme_support( 'wp-block-styles' );

	// Add WP Thumbnail Support
	add_theme_support( 'post-thumbnails' );

	// Default thumbnail size
	set_post_thumbnail_size(125, 125, true);

	// Add RSS Support
	add_theme_support( 'automatic-feed-links' );

	// Add Support for WP Controlled Title Tag
	add_theme_support( 'title-tag' );

	// Add HTML5 Support
	add_theme_support( 'html5',
	         array(
	         	'comment-list',
	         	'comment-form',
	         	'search-form',
	         )
	);

	add_image_size('max', 1800, 1200, true);
	add_image_size( 'blog-thumb', 370, 235, true );

	// Set the maximum allowed width for any content in the theme, like oEmbeds and images added to posts.
	$GLOBALS['content_width'] = apply_filters( 'pixels_theme_support', 1200 );

} /* end theme support */

add_action( 'after_setup_theme', 'pixels_theme_support' );
