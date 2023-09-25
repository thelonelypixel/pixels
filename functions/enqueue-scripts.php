<?php

/**
* Add async or defer attributes to script enqueues
* @author Mike Kormendy
* @param  String  $tag     The original enqueued <script src="...> tag
* @param  String  $handle  The registered unique name of the script
* @return String  $tag     The modified <script async|defer src="...> tag
*/
// only on the front-end
if(!is_admin()) {
    function add_asyncdefer_attribute($tag, $handle) {
        // if the unique handle/name of the registered script has 'async' in it
        if (strpos($handle, 'async') !== false) {
            // return the tag with the async attribute
            return str_replace( '<script ', '<script async ', $tag );
        }
        // if the unique handle/name of the registered script has 'defer' in it
        else if (strpos($handle, 'defer') !== false) {
            // return the tag with the defer attribute
            return str_replace( '<script ', '<script defer ', $tag );
        }
        // if the unique handle/name of the registered script has 'async or defer' in it
        else if (strpos($handle, 'async-defer') !== false) {
            // return the tag with the defer attribute
            return str_replace( '<script ', '<script async defer ', $tag );
        }
        // otherwise skip
        else {
            return $tag;
        }
    }
    add_filter('script_loader_tag', 'add_asyncdefer_attribute', 10, 2);
}

function site_scripts() {
  global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

    // lets put jQuery in the footer for better performance
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
    wp_enqueue_script( 'jquery' );

    // Load AlpineJs
    wp_enqueue_script('alpineplugins', 'https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js', array(), '3.0.0', true);
    wp_enqueue_script('alpinejs', 'https://cdn.jsdelivr.net/npm/alpinejs@3.13.0/dist/cdn.min.js', array(), '3.0.0', true);

    // Load YouTube iFrame API
    wp_enqueue_script('youtube-iframe-api-async', 'https://www.youtube.com/iframe_api', array(), null, true);

    // Adding scripts file in the footer
    wp_enqueue_script( 'site-js', get_template_directory_uri() . '/dist/js/main.min.js', array( 'jquery' ), '', true );

	// Register main stylesheet with cache busting
	wp_register_style('site-css', get_template_directory_uri() . '/dist/css/style.min.css', array(), filemtime( get_template_directory().'/dist/css/style.min.css' ) );
    wp_enqueue_style('site-css');

    // enqeue style.css and put it in the header
    wp_enqueue_style( 'site-style', get_stylesheet_uri() ); 

}
add_action('wp_enqueue_scripts', 'site_scripts', 999);


// ACF Styles
function my_admin_enqueue_scripts() {
    wp_enqueue_style( 'my-admin-css', get_template_directory_uri() . '/assets/admin/css/admin.css', array(), '1.0.0' );
}
add_action('acf/input/admin_enqueue_scripts', 'my_admin_enqueue_scripts');
