<?php
/**
 * Accordion Block template.
 *
 * @param array $block The block settings and attributes.
 */

$field = [
    'heading'      => get_field('heading'),
    'show_block'   => get_field('show_block'),
    'padding_top'  => get_field('padding_top'),
    'padding_bottom' => get_field('padding_bottom')
];

$anchor = !empty($block['anchor']) ? 'id="' . esc_attr($block['anchor']) . '" ' : '';
$style = ''; // Initialize an empty style string.

// Check if padding-top value exists, then append the value and unit to the style string.
if (!empty($field['padding_top'])) {
    $style .= 'padding-top: ' . esc_attr($field['padding_top']) . 'px;';
}

// Check if padding-bottom value exists, then append the value and unit to the style string.
if (!empty($field['padding_bottom'])) {
    $style .= 'padding-bottom: ' . esc_attr($field['padding_bottom']) . 'px;';
}

if( $field['show_block'] ) : ?>

<section <?php echo $anchor; ?> class="block block__accordion" <?php if ($style) echo 'style="' . $style . '"'; ?>>
	<div class="container">
		<div class="row row--justified">
			<div class="block__accordion__heading column column-m-12">
				<h2><?php echo $field['heading']; ?></h2>
			</div>
		</div>
		<div class="row row--justified">
			<div class="block__accordion__content column column-m-12">
				<?php if (have_rows('accordions')): ?>
					<div x-data="{ active: null }">
						<?php $counter = 1; ?>
						<?php while (have_rows('accordions')) : the_row(); 
							$heading = get_sub_field('heading');
							$content = get_sub_field('content');
						?>
							<div x-data="{
								id: <?php echo $counter; ?>,
								get expanded() {
									return this.active === this.id
								},
								set expanded(value) {
									this.active = value ? this.id : null
								},
							}" role="region" aria-labelledby="accordion-heading-<?php echo $counter; ?>" class="accordion-question">
								<div id="accordion-heading-<?php echo $counter; ?>">
									<button
										x-on:click="expanded = !expanded; $dispatch('toggle-accordion', { id: id })"
										:aria-expanded="expanded.toString()" 
										aria-controls="accordion-content-<?php echo $counter; ?>"
										class="[ bold ]"
									>
										<span><?php echo $heading; ?></span>
										<span x-show="expanded" aria-hidden="true" class="[ bold ]">&ndash;</span>
										<span x-show="!expanded" aria-hidden="true" class="[ bold ]">&#43;</span>
									</button>
								</div>

								<div x-show="expanded" x-collapse>
									<div class="accordion-content" id="accordion-content-<?php echo $counter; ?>">
										<?php echo $content; ?>
									</div>
								</div>
							</div>
						<?php $counter++; ?>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<?php endif; ?>
