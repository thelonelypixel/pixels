<?php get_header(); ?>

	<main id="main" role="main">

		<?php if ( have_posts() ) : ?>

			<section class="blog-posts">
				<div class="container">
					<div class="blog-posts__intro">
						<h1><?php the_field('blog_heading', 'options'); ?></h1>
					</div>

					<div class="blog-posts__posts row">

						<?php while ( have_posts() ) : the_post(); ?>
							<a href="<?php the_permalink(); ?>" class="blog-posts__post">
								<?php the_post_thumbnail("large"); ?>
								<div class="blog-posts__post-content">
									<h2 class="title"><?php the_title(); ?></h2>
									<p class="date"><?php the_time( get_option( 'date_format' ) ); ?></p>
									<p class="read-more">Find out more</p>
								</div>
								<div class="dark-overlay"></div>
							</a>
						<?php endwhile; ?>
					</div>

					<div class="blog-posts__pagination">
						<div class="nav-previous alignleft"><?php previous_posts_link( 'Newer posts' ); ?></div>
						<div class="nav-next alignright"><?php next_posts_link( 'Older posts' ); ?></div>
					</div>
				</div>
			</section>

		<?php else :

			get_template_part( 'parts/content', 'none' );

		endif; ?>

	</main>

<?php get_footer(); ?>
