<?php
$field = [
	// General Options
    'background' => get_field('background'),

	// Content
    'content' => get_field('content'),
];

$anchor = !empty($block['anchor']) ? 'id="' . esc_attr($block['anchor']) . '" ' : '';

?>

<section <?php echo $anchor; ?> class="block block__text">
	<div class="container">
		<div class="row">
			<div class="column column-m-12">
				<?php echo $field['content']; ?>
			</div>
		</div>
	</div>
</section>
