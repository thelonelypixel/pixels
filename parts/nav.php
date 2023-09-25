<ul class="navbar-nav">
    <?php foreach( $menu_items as $index => $menu_item ): 

        // Getting sub-field values
        $nav_item_type = $menu_item['nav_item_type'];
        $nav_item = $menu_item['nav_item'];
        $dropdown = $menu_item['dropdown'];
    ?>
        <li class="nav-item <?php echo $nav_item_type; ?>" :class="{ 'show-dropdown': open === <?php echo $index; ?> }">
            <a href="<?php echo $nav_item['url']; ?>" class="nav-link" role="menuitem" <?php echo ($nav_item_type === 'nav-item--dropdown') ? 'aria-haspopup="true" aria-expanded="false"' : ''; ?>>
                <?php echo $nav_item['title']; ?>
            </a>
            <?php if( $nav_item_type === 'nav-item--dropdown' && $dropdown ): ?>
                <button 
                    @click="open === <?php echo $index; ?> ? open = null : open = <?php echo $index; ?>" 
                    aria-label="Toggle Dropdown" 
                    aria-controls="dropdown-<?php echo $index; ?>" 
                    id="dropdown-button-<?php echo $index; ?>"
                    :aria-expanded="open === <?php echo $index; ?>"
                    :class="{ 'active': open === <?php echo $index; ?> }">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                </button>

                <div class="dropdown-menu" 
                x-show="open === <?php echo $index; ?>"
                x-init="() => { if (open !== <?php echo $index; ?>) $el.style.opacity = 1; }"
                x-transition:enter="enter-start"
                x-transition:leave="leave-end"
                id="dropdown-<?php echo $index; ?>" 
                role="menu" 
                @focusout="if (!($event.relatedTarget === $el || $el.contains($event.relatedTarget) || $event.relatedTarget === document.getElementById('dropdown-button-<?php echo $index; ?>'))) open = null">

                    <ul>
                        <?php foreach( $dropdown as $sub_item ):
                            $icon = $sub_item['icon'];
                            $link = $sub_item['link'];
                            $description = $sub_item['description'];
                        ?>
                            <li>
                                <a class="dropdown-item" href="<?php echo $link['url']; ?>" role="menuitem">
                                    <?php if($icon): ?>
                                        <div class="dropdown-item__icon">
                                            <img src="<?php echo wp_get_attachment_image_url($icon, 'thumbnail'); ?>" alt="<?php echo $link['title']; ?>" />
                                        </div>
                                    <?php endif; ?>
                                    <div class="dropdown-item__content">
                                        <p><?php echo $link['title']; ?></p>
                                        <?php if($description): ?>
                                            <span><?php echo $description; ?></span>
                                        <?php endif; ?>
                                    </div>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>