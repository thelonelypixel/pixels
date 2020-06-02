<?php

function mirai_custom_admin_footer() {
	_e('<div id="footer-thankyou">Developed with ❤️ by <a href="https://www.thelonelypixel.co.uk" target="_blank">The Lonely Pixel</a>.</div>', 'mirai');
}

add_filter('admin_footer_text', 'mirai_custom_admin_footer');


// plugin require notices
add_action( 'admin_notices', 'theme_dependencies' );

function theme_dependencies() {
	if( ! function_exists('acf_update_setting') )
		echo '<div class="error"><p>' . __( 'Warning: This website requires the Advanced Custom Fields Pro plugin. Disabling this plugin <strong>will</strong> break the website.', 'my-theme' ) . '</p></div>';

	// if( ! function_exists('wpcf7') )
	// 	echo '<div class="error"><p>' . __( 'Warning: This website requires the Contact Form 7 plugin. Disabling this plugin <strong>will</strong> break the website.', 'my-theme' ) . '</p></div>';

	if (!class_exists('Wp_Kraken'))
		echo '<div class="error"><p>' . __( 'Warning: This website requires the Kraken plugin. Disabling this plugin will prevent images from being optimised.', 'my-theme' ) . '</p></div>';

}

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
