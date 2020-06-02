<?php
// Misc functions

// Get Image - Accepts filename and alt text parameters
function get_img( $imgUrl, $imgAlt ) {
    $imgDir = get_template_directory_uri() . '/assets/images/' . $imgUrl;
    echo '<img src="' . $imgDir . '" alt="' . $imgAlt . '">';
}

// Get Image URL - Accepts filename parameter
function get_img_url( $imgURL ) {
    echo get_template_directory_uri() . '/assets/images/' . $imgURL;
}

/*
 * Example
 *
<?php get_img('image.png', 'this is the alt'); ?>
 */

//Page Slug Body Class
function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
		$classes[] = $post->post_name;
	}
	return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

// Custom Excerpt Length
// -- example echo limit_words(get_the_excerpt(), '41');
function limit_words($string, $word_limit) {
	$words = explode(' ', $string);
	return implode(' ', array_slice($words, 0, $word_limit));
}

// Move Yoast to bottom
function yoasttobottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');

// Move Gravity forms call to footer

// GF method: http://www.gravityhelp.com/documentation/gravity-forms/extending-gravity-forms/hooks/filters/gform_init_scripts_footer/
add_filter( 'gform_init_scripts_footer', '__return_true' );

// solution to move remaining JS from https://bjornjohansen.no/load-gravity-forms-js-in-footer
add_filter( 'gform_cdata_open', 'wrap_gform_cdata_open' );
function wrap_gform_cdata_open( $content = '' ) {
  $content = 'document.addEventListener( "DOMContentLoaded", function() { ';
  return $content;
}
add_filter( 'gform_cdata_close', 'wrap_gform_cdata_close' );
function wrap_gform_cdata_close( $content = '' ) {
  $content = ' }, false );';
  return $content;
}

// Redirect Author Pages if not needed
add_action('template_redirect', 'my_custom_disable_author_page');

function my_custom_disable_author_page() {
    global $wp_query;

    if ( is_author() ) {
        // Redirect to homepage, set status to 301 permenant redirect.
        // Function defaults to 302 temporary redirect.
        wp_redirect(get_option('home'), 301);
        exit;
    }
}
