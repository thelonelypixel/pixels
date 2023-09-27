<?php
$field = [
	// General Options
    'background' => get_field('background'),
	'show_block' => get_field('show_block'),

	// Content
    'content' => get_field('content'),
];

$anchor = !empty($block['anchor']) ? 'id="' . esc_attr($block['anchor']) . '" ' : '';

?>

<?php if( $field['show_block'] ) : ?>

<section <?php echo $anchor; ?> class="block block__text">
		<div class="container">
			<div class="row">
				<div class="column column-m-12">
					<?php echo $field['content']; ?>
				</div>
			</div>
		</div>
	</section>

<?php endif; ?>
