<?php
/**
 * Accordion Block template.
 *
 * @param array $block The block settings and attributes.
 */


$field = [
	// General Options
	'layout' => get_field('layout'),
    'background' => get_field('background'),
	'add_poster' => get_field('add_poster'),
	'container'	=> get_field('container'),
	'show_block' => get_field('show_block'),

	// Content
    'media_type' => get_field('media_type'),
	'video' => get_field('video'),
	'poster' => get_field('poster'),
	'image' => get_field('image'),

	// Grid
	'images' => get_field('images'),
	'size'	=>  'full',
];

$anchor = !empty($block['anchor']) ? 'id="' . esc_attr($block['anchor']) . '" ' : '';

?>

<?php if( $field['show_block'] ) : ?>

<section <?php echo $anchor; ?> class="block block__media <?php echo $field['background']; ?>">

	<?php if( $field['container'] ) : ?>
		<div class="container">
	<?php endif; ?>

		<div class="row row--justified">

			<div class="column column-m-12 column-t-12 relative">

				<?php if( $field['layout'] == "block__media__default") : ?>

					<div class="media-wrapper">

						<?php if( $field['media_type'] == 'Video' ): ?>
							<?php if( $field['add_poster'] ): ?>
								<div class="media-poster">
									<img src="<?php echo wp_get_attachment_image_src($field['poster'], "full")[0]; ?>" class="video-poster">
									<svg width="187" height="187" viewBox="0 0 187 187" fill="none" xmlns="http://www.w3.org/2000/svg">
										<circle cx="93.84" cy="93.5" r="93" fill="black"/>
										<path d="M138.48 94.4302L72.915 132.284L72.915 56.5762L138.48 94.4302Z" fill="white"/>
									</svg>
								</div>
							<?php endif; ?>

							<iframe class="video" src="https://www.youtube.com/embed/<?php echo $field['video']; ?>?enablejsapi=1"></iframe>

						<?php else: ?>

							<?php echo wp_get_attachment_image($field['image'], "full"); ?>

						<?php endif; ?>

					</div>

				<?php endif; ?>

				<?php if( $field['layout'] == "block__media__carousel" ): ?>

					<?php if ( have_rows('carousel') ) : ?>
						
						<div class="media-carousel">

							<!-- Slider main container -->		
							<div class="swiper">

								<!-- Additional required wrapper -->
								<div class="swiper-wrapper">
						
									<?php while( have_rows('carousel') ) : the_row();
									
									$carouselField = [
										'add_poster' => get_sub_field('add_poster'),
										'media_type' => get_sub_field('media_type'),
										'video' => get_sub_field('video'),
										'poster' => get_sub_field('poster'),
										'image' => get_sub_field('image'),
									];
									
									?>

										<!-- Slides -->
										<div class="swiper-slide">
								
											<?php if( $carouselField['media_type'] == 'Video' ): ?>
												<?php if( $carouselField['add_poster'] ): ?>
													<div class="media-poster">
														<img src="<?php echo wp_get_attachment_image_src($carouselField['poster'], "full")[0]; ?>" class="video-poster">
														<svg width="187" height="187" viewBox="0 0 187 187" fill="none" xmlns="http://www.w3.org/2000/svg">
															<circle cx="93.84" cy="93.5" r="93" fill="black"/>
															<path d="M138.48 94.4302L72.915 132.284L72.915 56.5762L138.48 94.4302Z" fill="white"/>
														</svg>
													</div>
												<?php endif; ?>

												<iframe class="video" src="https://www.youtube.com/embed/<?php echo $carouselField['video']; ?>?enablejsapi=1"></iframe>

											<?php else: ?>

												<?php echo wp_get_attachment_image($carouselField['image'], "full"); ?>

											<?php endif; ?>

										</div>
									
									<?php endwhile; ?>

								</div>

								<!-- If we need pagination -->
								<!-- <div class="swiper-pagination"></div> -->

								<!-- If we need navigation buttons -->
								<div class="swiper-button-prev"></div>
								<div class="swiper-button-next"></div>

								<!-- If we need scrollbar -->
								<div class="swiper-scrollbar"></div>

							<!-- End Swiper -->
							</div>

						</div>
					
					<?php endif; ?>

				<?php endif; ?>

				<?php if( $field['layout'] == "block__media__grid" ): ?>

					<?php if( $field['images'] ): ?>

						<?php $count = count( $field['images'] ); ?>

						<div class="media-grid media-grid--layout-<?php echo $count; ?>">

							<?php foreach( $field['images'] as $image_id ): ?>

								<div class="media-grid__item">
								
									<?php echo wp_get_attachment_image($image_id, $field['size']); ?>

								</div>

							<?php endforeach; ?>

						</div>
						
					<?php endif; ?>

				<?php endif; ?>

			</div>

		</div>

	<?php if( $field['container'] ) : ?>
		</div>	
	<?php endif; ?>

</section>

<?php endif; ?>
