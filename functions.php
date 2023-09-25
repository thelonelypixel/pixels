<?php
// Theme support options
require_once(get_template_directory().'/functions/theme-support.php');

// Register scripts and stylesheets
require_once(get_template_directory().'/functions/enqueue-scripts.php');

// Register custom menus and menu walkers
require_once(get_template_directory().'/functions/menu.php');

// Remove 4.2 Emoji Support
require_once(get_template_directory().'/functions/disable-emoji.php');

// Use this as a template for custom post types
// require_once(get_template_directory().'/functions/custom-post-type.php');

// Pre Get Posts
require_once(get_template_directory().'/functions/pre-get-posts.php');

// Customize the WordPress admin
require_once(get_template_directory().'/functions/admin.php');

// Misc Functions
require_once(get_template_directory().'/functions/misc.php');

// ACF Functions
require_once(get_template_directory().'/functions/acf.php');

// Theme Settings
require_once(get_template_directory().'/functions/optionspages.php');
