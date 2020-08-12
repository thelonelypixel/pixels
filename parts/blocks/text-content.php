<?php
$heading = get_field('heading');
$content = get_field('content');
?>

<section class="block block__text">
	<div class="container--narrow">
        <h2><?php echo $heading; ?></h2>
    	<?php echo $content; ?>
	</div>
</section>
