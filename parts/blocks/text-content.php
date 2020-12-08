<?php
$id = get_field("id");
$heading = get_field('heading');
$content = get_field('content');
?>

<section <?php if( $id ): ?>id="<?php echo $id; ?>"<?php endif; ?> class="block block__text">
	<div class="container--narrow">
        <h2><?php echo $heading; ?></h2>
    	<?php echo $content; ?>
		<?php get_template_part( 'parts/blocks/buttons'); ?>
	</div>
</section>
