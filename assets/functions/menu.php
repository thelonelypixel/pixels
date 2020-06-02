<?php
// Register menus
register_nav_menus(
	array(
		'main-nav' => __( 'The Main Nav', 'mirai' ),   // Main nav in header
		'footer-links' => __( 'Footer Links', 'mirai' ) // Secondary nav in footer
	)
);

// The Top Menu
function mirai_top_nav() {
	 wp_nav_menu(array(
        'container' => false,                           // Remove nav container
        'menu_class' => 'menu js-menu',       // Adding custom nav class
        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'theme_location' => 'main-nav',        			// Where it's located in the theme
        'depth' => 5,                                   // Limit the depth of the nav
        'walker' => new Topbar_Menu_Walker()
    ));
} 

// The Footer Menu
function mirai_footer_links() {
    wp_nav_menu(array(
        'container' => 'false',                         // Remove nav container
        'menu' => __( 'Footer Links', 'mirai' ),      // Nav name
        'menu_class' => 'menu menu--footer',                         // Adding custom nav class
        'theme_location' => 'footer-links',             // Where it's located in the theme
        'depth' => 0,                                   // Limit the depth of the nav
        'walker' => new Topbar_Menu_Walker()           
    ));
} /* End Footer Menu */

// Big thanks to Brett Mason (https://github.com/brettsmason) for the awesome walker
class Topbar_Menu_Walker extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth = 0, $args = Array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul class=\"menu vertical submenu\">\n";
	}
}

// Add active class to menu
function required_active_nav_class( $classes, $item ) {
    if ( $item->current == 1 || $item->current_item_ancestor == true ) {
        $classes[] = 'active';
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'required_active_nav_class', 10, 2 );
