<?php
$margin = get_field('add_margin');
$content = get_field('cta_content');
$button_text = get_field('cta_button_text');
$button_link = get_field('cta_button_link');
?>

<section <?php if( $id ): ?>id="<?php echo $id; ?>"<?php endif; ?> class="block block__cta<?php if( $margin ): ?> add-margin<?php endif; ?>">
    <div class="block__cta__content">
		<div class="oh"><h2><?php echo $content; ?></h2></div>
		<a class="button" href="<?php echo $button_link; ?>"><?php echo $button_text; ?></a>
	</div>
</section>
