<div class="blog-posts__post">
	<?php the_post_thumbnail("large"); ?>
	<div class="blog-posts__post__content">
		<div class="post-meta">
			<p class="date"><?php the_time( get_option( 'date_format' ) ); ?></p>
		
			<!-- Categories Logic Start -->
			<div class="categories">
				<?php
				if( is_category() ) {
					// On a category archive, so just show the current category
					$current_category = get_queried_object();
					echo '<a href="' . esc_url( get_category_link( $current_category->term_id ) ) . '">' . esc_html( $current_category->name ) . '</a>';
				} else {
					// On other pages, show all categories for the post
					$categories = get_the_category();
					$separator = ' ';
					$output = '';

					if( !empty( $categories ) ):
						foreach( $categories as $category ):
							$output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
						endforeach;
						echo trim( $output, $separator );
					endif;
				}
				?>
			</div>
			<!-- Categories Logic End -->
		</div>
			
		<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<a href="<?php the_permalink(); ?>" class="read-more">Find out more</a>
	</div>
</div>
