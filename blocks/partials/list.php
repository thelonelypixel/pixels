<?php if (have_rows('list')) : ?>

    <ul class="block-list">

        <?php while(have_rows('list')) : the_row(); 
        
        $image = get_sub_field('image'); 
        $content = get_sub_field('content');
        
        ?>

            <li>
                <div>
                    <?php echo wp_get_attachment_image($image, "full"); ?>
                </div>
                <div>
                    <?php echo $content; ?>
                </div>
            </li>

        <?php endwhile; ?>

    </ul>

<?php endif; ?>