<a href="<?php the_permalink(); ?>" class="blog-posts__post">
	<?php the_post_thumbnail("large"); ?>
	<div class="blog-posts__post-content">
		<h2 class="title"><?php the_title(); ?></h2>
		<p class="date"><?php the_time( get_option( 'date_format' ) ); ?></p>
		<p class="read-more">Find out more</p>
	</div>
	<div class="dark-overlay"></div>
</a>
