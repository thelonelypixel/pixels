<?php
/**
 * Team Block template.
 *
 * @param array $block The block settings and attributes.
 */

$field = [
	// General Options
    'background' => get_field('background'),
	'show_block' => get_field('show_block'),
	'padding_top'      => get_field('padding_top'),
    'padding_bottom'   => get_field('padding_bottom'),

	// Content
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

if ($field['show_block']): ?>

<section <?php echo $anchor; ?> class="block block__team" x-data="{ openModal: function(img, name, position, bio) { this.modalImage = img; this.modalName = name; this.modalPosition = position; this.modalBio = bio; this.isModalOpen = true; document.body.classList.add('no-scroll'); } , isModalOpen: false, modalImage: '', modalName: '', modalPosition: '', modalBio: '' }" <?php if ($style) echo 'style="' . $style . '"'; ?>>

	<div class="container">

		<div class="row">
			<div class="block__team_intro column column-m-12 column-t-7">
				<?php the_field('intro'); ?>
			</div>
		</div>
    	
		<div class="row">

			<div class="column column-m-12 column-t-12">

				<?php if ( have_rows('team') ) : ?>

					<div class="team-grid">
						
						<?php while( have_rows('team') ) : the_row();
							$field = [
								'image' => get_sub_field('image'),
								'name' => get_sub_field('name'),
								'size' => 'medium',
								'position' => get_sub_field('position'),
								'bio' => get_sub_field('bio'),
							]
						?>
							
							<div class="team-grid__item">

								<div class="team-grid__item__image">
									<img src="<?php echo esc_url(wp_get_attachment_image_src($field['image'], $field['size'])[0]); ?>" alt="<?php echo esc_attr($field['name']); ?>">
								</div>
								
								<div class="team-grid__item__content">
									<h3><?php echo esc_html($field['name']); ?></h3>
									<h4><?php echo esc_html($field['position']); ?></h4>
									<a href="#" 
										x-on:click.prevent="openModal('<?php echo esc_url(wp_get_attachment_image_src($field['image'], $field['size'])[0]); ?>', '<?php echo esc_js($field['name']); ?>', '<?php echo esc_js($field['position']); ?>', '<?php echo esc_js($field['bio']); ?>')"
										aria-label="Read Bio of <?php echo esc_attr($field['name']); ?>"
										class="read-bio">
										Read Bio
									</a>
								</div>

							</div>

						<?php endwhile; ?>

					</div>

				<?php endif; ?>

			</div>

		</div>

	</div>

	<!-- Modal -->
	<div x-show="isModalOpen" x-on:keydown.escape.window="isModalOpen = false; document.body.classList.remove('no-scroll');" class="modal">
		<div class="modal__content" x-on:click="isModalOpen = false" role="dialog" aria-labelledby="modal-title">
			
			<button x-on:click.stop="isModalOpen = false; document.body.classList.remove('no-scroll');" class="modal__close" aria-label="Close modal">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
					<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
				</svg>
			</button>
			
			<div class="modal__body" x-on:click.stop>
				<div class="row">
					<div class="modal__image column column-m-12 column-t-4-nest">
						<img :src="modalImage" :alt="modalName">
					</div>
					<div class="modal__text column column-m-12 column-t-8-nest">
						<h3 x-text="modalName" id="modal-title"></h3>
						<h4 x-text="modalPosition"></h4>
						<p x-text="modalBio"></p>
					</div>
				</div>
			</div>
			
		</div>
	</div>

</section>

<?php endif; ?>
