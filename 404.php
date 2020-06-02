<?php get_header(); ?>

	<main role="main">

		<div class="container">

			<article>

				<header>
					<span>404</span>
					<h1><?php esc_html_e( 'We&rsquo;re sorry, but it looks like the content you are looking for may have moved!', 'mirai' ); ?></h1>
				</header>

				<section>
					<p>Please click below if you wish to return to the home page.</p>
					<a class="button" href="<?php echo get_home_url(); ?>">Back to Home</a>
				</section>

			</article>

		</div>

	</main>

<?php get_footer(); ?>
