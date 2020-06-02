<?php

// PRE GET POSTS

add_action( 'pre_get_posts', 'get_posts_cpt' );

function get_posts_cpt( $query ) {
	if ( !is_admin() && $query->is_post_type_archive('resources') && $query->is_main_query() ) {
		$query->set( 'posts_per_page', 8);
	}
}