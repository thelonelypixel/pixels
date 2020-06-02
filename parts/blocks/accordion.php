<?php
$margin_bottom = get_field('add_margin');
$heading = get_field('heading');
?>

<section class="block block__accordion <?php if($margin_bottom) : echo ' add-margin'; endif; ?>">
	<div class="container row row--justified">
		<div class="block__accordion__heading">
			<h3><?php echo $heading; ?></h3>
		</div>
		<div class="block__accordion__content">
			<?php if ( have_rows('accordions') ): ?>
				<ul class="accordion">
					<?php while ( have_rows('accordions') ) : the_row();

					$heading = get_sub_field('heading');
					$content = get_sub_field('content');

					?>
						<li>
							 <a class="toggle" href="#"><?php echo $heading; ?></a>
							 <div class="accordion-content">
								<?php echo $content; ?>
							 </div>
						</li>
					<?php endwhile; ?>
				</ul>
			<?php endif; ?>
		</div>
	</div>
</section>
