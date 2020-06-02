<?php
// Theme support options
require_once(get_template_directory().'/assets/functions/theme-support.php');

// WP Head and other cleanup functions
require_once(get_template_directory().'/assets/functions/cleanup.php');

// Register scripts and stylesheets
require_once(get_template_directory().'/assets/functions/enqueue-scripts.php');

// Register custom menus and menu walkers
require_once(get_template_directory().'/assets/functions/menu.php');

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/assets/functions/page-navi.php');

// Remove 4.2 Emoji Support
require_once(get_template_directory().'/assets/functions/disable-emoji.php');

// Related post function - no need to rely on plugins
require_once(get_template_directory().'/assets/functions/related-posts.php');

// Use this as a template for custom post types
// require_once(get_template_directory().'/assets/functions/custom-post-type.php');

// Pre Get Posts
require_once(get_template_directory().'/assets/functions/pre-get-posts.php');

// Customize the WordPress admin
require_once(get_template_directory().'/assets/functions/admin.php');

// Misc Functions
require_once(get_template_directory().'/assets/functions/misc.php');

// ACF Functions
require_once(get_template_directory().'/assets/functions/acf.php');

// Theme Settings
require_once(get_template_directory().'/assets/functions/optionspages.php');
