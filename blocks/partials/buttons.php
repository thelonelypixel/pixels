<?php if (have_rows('buttons')): ?>

    <?php 
    while (have_rows('buttons')): the_row();

        $button_type = get_sub_field('button_type');
        $button_text = get_sub_field('button_text');
        $button_url = get_sub_field('url');
        $button_link = get_sub_field('link');
        $button_download = get_sub_field('download');
        $button_id = get_sub_field('id');
        $aria_label = ""; // Default value

        // Determine the link attributes based on button type
        $link_attributes = "";
        switch ($button_type) {
            case "internal":
                $link_attributes = 'class="button button--internal" href="' . esc_url($button_link) . '"';
                break;
            case "external":
                $link_attributes = 'class="button button--external" href="' . esc_url($button_url) . '" target="_blank" rel="noopener noreferrer"';
                $aria_label = 'aria-label="' . esc_attr($button_text . ' - opens in a new tab') . '"';
                break;
            case "anchor":
                $link_attributes = 'class="button button--anchor" href="#' . esc_attr($button_id) . '"';
                break;
            case "download":
                $link_attributes = 'class="button button--download" href="' . esc_url($button_download) . '"';
                $aria_label = 'aria-label="' . esc_attr('Download ' . $button_text) . '"';
                break;
        }
    ?>

        <a <?php echo $link_attributes; ?> <?php echo $aria_label; ?>><?php echo esc_html($button_text); ?></a>

    <?php endwhile; ?>

<?php endif; ?>
