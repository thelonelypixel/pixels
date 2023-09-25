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

// Better Pagination
function custom_numeric_posts_nav() {
    if( is_singular() )
        return;
    global $wp_query;
    if( $wp_query->max_num_pages <= 1 )
        return;
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
    if ( $paged >= 1 )
        $links[] = $paged;
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
    echo '<div class="navigation"><ul>' . "\n";
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );
    echo '</ul></div>' . "\n";
}
