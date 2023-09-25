<?php get_header(); ?>

	<main id="main" role="main">

		<?php if ( have_posts() ) : ?>

			<section class="blog-posts">
				<div class="container">
					<div class="row">
						<div class="column column-m-12">
							<div class="blog-posts__intro">
								<h1><?php single_cat_title(); ?></h1>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="column column-m-12">
							<div class="blog-posts__posts ">
								<?php while ( have_posts() ) : the_post(); 
									get_template_part( 'parts/loop', 'archive' );
								endwhile; ?>
							</div>

							<div class="blog-posts__pagination">
								<?php custom_numeric_posts_nav(); ?>
							</div>
						</div>
					</div>
				</div>
			</section>

		<?php else :

			get_template_part( 'parts/content', 'none' );

		endif; ?>

	</main>

<?php get_footer(); ?>
