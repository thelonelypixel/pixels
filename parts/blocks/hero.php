<?php
$margin = get_field('add_margin');
$hero_type = get_field('hero_type');
$video = get_field('hero_video_file');
$image = get_field('hero_image');
$size = 'full';
$text_colour = get_field('hero_text_color');
$heading = get_field('hero_heading');
$content = get_field('hero_content');
$button_text = get_field('hero_button_text');
$button_link = get_field('hero_button_link');
?>

<section class="block block__hero <?php echo $hero_type; ?><?php if ($margin): ?> add-margin<?php endif; ?><?php if ($text_colour == "Light"): ?> block__hero--light<?php endif; ?>">
    <div class="block__hero__content">
		<div class="oh"><h1><?php echo $heading; ?></h1></div>
		<p><?php echo $content; ?></p>
		<?php if ($button_link): ?>
			<a class="button" href="<?php echo $button_link; ?>"><?php echo $button_text; ?></a>
		<?php endif; ?>
	</div>
	<?php if ($hero_type == "block__hero--video"): ?>
		<div class="block__hero__video">
			<video src="<?php echo $video; ?>" autoplay loop></video>
            <div class="overlay"></div>
		</div>
	<?php endif; ?>
    <?php if ($hero_type == "block__hero--image"): ?>
        <div class="block__hero__image">
            <?php echo wp_get_attachment_image($image, $size); ?>
            <div class="overlay"></div>
        </div>
    <?php endif; ?>
</section>
