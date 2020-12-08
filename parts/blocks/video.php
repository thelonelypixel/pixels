<?php
$id = get_field("id");
$video = get_field('video');
?>

<section <?php if( $id ): ?>id="<?php echo $id; ?>"<?php endif; ?> class="block block__video">
    <div class="container">
        <div class="video-content">
			<?php echo $video; ?>
        </div>
    </div>
</section>
