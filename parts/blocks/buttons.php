<?php if (have_rows('buttons')) : ?>

    <?php while(have_rows('buttons')) : the_row();

    $button_type = get_sub_field('button_type');
    $button_text = get_sub_field('button_text');
    $button_url = get_sub_field('url');
    $button_link = get_sub_field('link');
    $button_download = get_sub_field('download');
    $button_id = get_sub_field('id');

     ?>

        <?php
            switch ($button_type) {
                case "internal": ?>
                    <a class="button button--internal" href="<?php echo $button_link; ?>"><?php echo $button_text; ?></a>
                <?php break;

                case "external": ?>
                    <a class="button button--exernal" href="<?php echo $button_url ?>" target="_blank" rel="noopener noreferrer"><?php echo $button_text; ?></a>
                <?php break;

                case "anchor": ?>
                    <a class="button button-anchor" href="#<?php echo $button_id ?>"><?php echo $button_text; ?></a>
                <?php break;

                case "download": ?>
                    <a class="button button--download" href="<?php echo $button_download; ?>"><?php echo $button_text; ?></a>
                <?php break;
            }
        ?>

    <?php endwhile; ?>

<?php endif; ?>
