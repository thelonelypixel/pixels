<?php

function pixels_custom_admin_footer() {
	_e('<div id="footer-thankyou">Developed with ❤️ by <a href="https://www.thelonelypixel.co.uk" target="_blank">The Lonely Pixel</a>.</div>', 'pixels');
}

add_filter('admin_footer_text', 'pixels_custom_admin_footer');


// add_action('admin_menu', 'remove_admin_menu_links');
// function remove_admin_menu_links() {
// 	if ( get_currentuserinfo()->user_email != 'chris@thelonelypixel.co.uk' ) {
// 		remove_menu_page('themes.php');
// 		remove_menu_page('options-general.php');
// 		remove_menu_page('edit.php?post_type=acf-field-group');
// 		remove_menu_page('plugins.php');
// 		remove_menu_page( 'ajax-load-more');
// 	}
// }

// Custom Login Logo
function custom_login_logo() {
    // Get the image from the ACF field
    $logo_id = get_field('logo', 'option');
    $logo_url = wp_get_attachment_image_url($logo_id, 'full');
    
    if( !empty($logo_url) ):
    ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo esc_url($logo_url); ?>);
            height: 60px;
            width: auto;
            background-size: contain; 
            background-repeat: no-repeat;
            padding-bottom: 30px; 
        }
    </style>
    <?php
    endif;
}
add_action( 'login_enqueue_scripts', 'custom_login_logo' );

// Change the login logo URL
function custom_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'custom_login_logo_url' );

// Change the login logo title attribute
function custom_login_logo_url_title() {
    return get_bloginfo('name');
}
add_filter( 'login_headertext', 'custom_login_logo_url_title' );