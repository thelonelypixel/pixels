<article id="post-<?php the_ID(); ?>" <?php post_class('content'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

	<header>
		<?php the_post_thumbnail('full'); ?>
    </header>

    <section itemprop="articleBody">
		<div class="container">
			<h1 itemprop="headline"><?php the_title(); ?></h1>
			<?php get_template_part( 'parts/content', 'byline' ); ?>
			<div class="content">
				<?php the_content(); ?>
			</div>
		</div>
	</section>

	<footer>
		<div class="container">
			<a href="<?php echo get_home_url(); ?>">Back to blog</a>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bullets' ), 'after'  => '</div>' ) ); ?>
			<p class="tags"><?php the_tags('<span class="tags-title">' . __( 'Tags:', 'bullets' ) . '</span> ', ', ', ''); ?></p>
		</div>
	</footer>

</article>
