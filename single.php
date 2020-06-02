<?php get_header(); ?>

    <main id="main" role="main">

	    <?php if (have_posts()) : while (have_posts()) : the_post();

			get_template_part( 'parts/loop', 'single' );

	    endwhile; else :

	   		get_template_part( 'parts/content', 'missing' );

	    endif; ?>

	</main>

<?php get_footer(); ?>
