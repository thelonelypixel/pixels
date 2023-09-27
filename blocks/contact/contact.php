<?php
$field = [
	// General Options
	'layout' => get_field('layout'),
    'background' => get_field('background'),
	'add_list' => get_field('add_list'),
	'flip'	=> get_field('flip'),
	'show_block' => get_field('show_block'),

	// Content
    'content' => get_field('content'),
	'form_id' => get_field('form_id'),
];

$anchor = !empty($block['anchor']) ? 'id="' . esc_attr($block['anchor']) . '" ' : '';

?>

<?php if( $field['show_block']): ?>

<section <?php echo $anchor; ?> class="block block__contact <?php if( $field['flip'] ): ?>block__contact--flipped<?php endif; ?> <?php echo $field['layout']; ?>">
	<div class="container">
		<div class="row row--justified">
			<?php if( $field['layout'] == 'block__contact--stacked' ): ?>
				<div class="column column-m-12 column-t-5 block__contact__content">
			<?php else: ?>
				<div class="column column-m-12 column-t-12 block__contact__content">
			<?php endif; ?>
				<?php echo $field['content']; ?>
				<?php get_template_part('blocks/partials/list'); ?>
			</div>

			<?php if( $field['layout'] == 'block__contact--stacked' ): ?>
				<div class="column column-m-12 column-t-6 block__contact__form">
			<?php else: ?>
				<div class="column column-m-12 column-t-12 block__contact__form">
			<?php endif; ?>
				<?php echo do_shortcode('[gravityform id="' . $field['form_id'] . '" title="false" description="false" ajax="true"]'); ?>
			</div>
		</div>
	</div>
</section>

<?php endif; ?>