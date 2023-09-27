<?php
/**
 * Accordion Block template.
 *
 * @param array $block The block settings and attributes.
 */

$heading = get_field('heading');
$show_block = get_field('show_block');
$anchor = !empty($block['anchor']) ? 'id="' . esc_attr($block['anchor']) . '" ' : '';
?>

<?php if( $show_block ) : ?>

<section <?php echo $anchor; ?> class="block block__accordion">
	<div class="container">
		<div class="row row--justified">
			<div class="block__accordion__heading column column-m-12">
				<h2><?php echo $heading; ?></h2>
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
										:aria-expanded="expanded.toString()" class="[ bold ]"
									>
										<span><?php echo $heading; ?></span>
										<span x-show="expanded" aria-hidden="true" class="[ bold ]">&minus;</span>
										<span x-show="!expanded" aria-hidden="true" class="[ bold ]">&plus;</span>
									</button>
								</div>

								<div x-show="expanded" x-collapse>
									<div class="accordion-content" id="accordion-content-<?php echo $counter; ?>" tabindex="0">
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