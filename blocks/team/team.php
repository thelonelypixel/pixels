<?php
/**
 * Team Block template.
 *
 * @param array $block The block settings and attributes.
 */

?>

<section class="block block__team" x-data="{ isModalOpen: false, modalImage: '', modalName: '', modalPosition: '', modalBio: '' }">

	<!-- Content -->
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
                		'size' => 'medium', // 'thumbnail', 'medium', 'large', 'full
                		'position' => get_sub_field('position'),
                		'bio' => get_sub_field('bio'),
              			]
            			?>
            			
							<div class="team-grid__item">

              					<div class="team-grid__item__image">
                					<?php echo wp_get_attachment_image($field['image'], $field['size']); ?>
             					</div>
              					
								<div class="team-grid__item__content">
                					<h3><?php echo $field['name']; ?></h3>
                					<h4><?php echo $field['position']; ?></h4>
									<a href="#" 
										x-on:click.prevent="
										modalImage = '<?php echo wp_get_attachment_image_src($field['image'], $field['size'])[0]; ?>'; 
										modalName = '<?php echo $field['name']; ?>';
										modalPosition = '<?php echo $field['position']; ?>'; 
										modalBio = '<?php echo $field['bio']; ?>'; 
										isModalOpen = true;
										document.body.classList.add('no-scroll');"
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
	<div x-show="isModalOpen" x-on:click="isModalOpen = false; document.body.classList.remove('no-scroll'); console.log('Modal Closed from overlay, no-scroll removed');" class="modal">	
		<div class="modal__content" x-on:click="isModalOpen = false">
			<span x-on:click.stop="isModalOpen = false; document.body.classList.remove('no-scroll');" class="modal__close">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
					<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
				</svg>
			</span>
			
			<div class="modal__body" x-on:click.stop>
				<div class="row">
					<div class="modal__image column-t-4-nest">
						<img :src="modalImage" :alt="modalName">
					</div>
					<div class="modal__text column-t-8-nest">
						<h3 x-text="modalName"></h3>
						<h4 x-text="modalPosition"></h4>
						<p x-text="modalBio"></p>
					</div>
				</div>
			</div>
		</div>
	</div>

	
</section>