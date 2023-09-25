<?php 
$logo = get_field('logo', 'options');
?>

<div class="column column-m-12">

	<div class="site-footer__top">

		<div class="site-footer__column">
			<a href="<?php echo home_url(); ?>" class="site-footer__logo">
				<?php echo wp_get_attachment_image( $logo, 'full' ); ?>
			</a>
			<p><?php the_field('footer_text', 'options'); ?></p>
			<ul class="footer-socials">
				<?php if (get_field('twitter', 'options')): ?>
				<li class="social--twitter">
					<a href="<?php the_field('twitter', 'options'); ?>" target="_blank">
						<svg width="21" height="18" xmlns="http://www.w3.org/2000/svg">
						<path d="M20.717 2.78a8.147 8.147 0 01-2.342.643 4.084 4.084 0 001.793-2.257 8.137 8.137 0 01-2.59.99 4.08 4.08 0 00-6.952 3.719 11.58 11.58 0 01-8.41-4.263 4.071 4.071 0 00-.551 2.053c0 1.415.72 2.663 1.814 3.395a4.06 4.06 0 01-1.847-.51v.05a4.084 4.084 0 003.272 4.002 4.113 4.113 0 01-1.843.064 4.083 4.083 0 003.81 2.835 8.194 8.194 0 01-5.067 1.748c-.33 0-.654-.017-.973-.055a11.578 11.578 0 006.253 1.832c7.503 0 11.608-6.218 11.608-11.61 0-.177-.003-.351-.011-.527a8.184 8.184 0 002.036-2.108z" fill="#CCC" fill-rule="nonzero"/>
						</svg>
					</a>
				</li>
				<?php endif; ?>
				<?php if (get_field('facebook', 'options')): ?>
				<li class="social--facebook">
					<a href="<?php the_field('facebook', 'options'); ?>" target="_blank">
						<svg width="10" height="20" xmlns="http://www.w3.org/2000/svg">
						<path d="M2.74 19.221v-8.926H.376V7.082H2.74V4.337C2.74 2.181 4.131.2 7.344.2c1.301 0 2.264.126 2.264.126l-.075 3s-.981-.01-2.051-.01c-1.156 0-1.343.536-1.343 1.421v2.347h3.486l-.153 3.213H6.137v8.926H2.74z" fill="#CCC" fill-rule="nonzero"/>
						</svg>
					</a>
				</li>
				<?php endif; ?>
				<?php if (get_field('linkedin', 'options')): ?>
				<li class="social--linkedin">
					<a href="<?php the_field('linkedin', 'options'); ?>" target="_blank">
						<svg width="18" height="18" xmlns="http://www.w3.org/2000/svg">
						<g fill="#CCC" fill-rule="nonzero">
							<path d="M4.131 17.181V6.103H.45v11.08l3.681-.002zm-1.84-12.59c1.284 0 2.084-.85 2.084-1.914C4.35 1.59 3.575.764 2.315.764S.234 1.59.234 2.677c0 1.064.798 1.914 2.034 1.914h.024zM6.17 17.181H9.85v-6.186c0-.332.024-.662.121-.9.267-.66.873-1.347 1.89-1.347 1.335 0 1.866 1.017 1.866 2.505v5.925h3.68v-6.35c0-3.403-1.815-4.985-4.238-4.985-1.987 0-2.86 1.11-3.343 1.867h.023V6.104H6.166c.052 1.038.004 11.077.004 11.077z"/>
						</g>
						</svg>
					</a>
				</li>
				<?php endif; ?>
				<?php if (get_field('youtube', 'options')): ?>
				<li class="social--youtube">
					<a href="<?php the_field('youtube', 'options'); ?>" target="_blank">
						<svg width="22" height="17" xmlns="http://www.w3.org/2000/svg">
						<path d="M11.073 0c.596.001 4.77.017 7.623.239.43.052 1.367.058 2.203.992.66.712.874 2.33.874 2.33s.22 1.898.22 3.797v1.779c0 1.899-.22 3.797-.22 3.797s-.215 1.617-.874 2.328c-.836.933-1.773.939-2.203.994-2.703.207-6.595.239-7.504.243h-.237c-.52-.005-5.765-.064-7.436-.235-.49-.097-1.588-.07-2.425-1.003-.66-.71-.874-2.328-.874-2.328S0 11.036 0 9.136l.001-1.998C.017 5.316.22 3.561.22 3.561s.215-1.618.874-2.33C1.93.297 2.868.29 3.297.239 6.15.017 10.324 0 10.92 0zM8.25 4.125v8.25l6.875-4.125L8.25 4.125z" fill="#CCC" fill-rule="nonzero"/>
						</svg>
					</a>
				</li>
				<?php endif; ?>
			</ul>
		</div>

		<?php if (have_rows('footer_columns', 'options')): ?>
			<?php while (have_rows('footer_columns', 'options')) : the_row(); ?>
				<div class="site-footer__column">
					<?php the_sub_field('content'); ?>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>

	</div>

	<div class="site-footer__bottom">
		<p>© <?php echo get_bloginfo('name') . " " . date("Y") . ". " . get_field('copyright', 'options') ;?></p>
		<a class="credits" href="https://thelonelypixel.co.uk" target="_blank" title="Freelance Web Designer - The Lonely Pixel">
			<div>Credits</div>
			<span>Crafted by The Lonely Pixel</span>
		</a>
	</div>

</div>