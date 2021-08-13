<?php

use App\Walkers\AlpineJSWalker; ?>

<header
    x-data="td_menu()"
    class="header -primary bg-grey-200 py-6">
    <div class="container content flex justify-between items-center flex-wrap md:flex-nowrap">
        <div class="logo md:mr-4" itemscope itemtype="http://schema.org/Organization">
            <a itemprop="url" href="<?php echo esc_url(home_url('/')); ?>">
                <?php
                if ($logo = get_field('site_logo', 'option')) :
                    echo wp_get_attachment_image($logo['id'], 'thumbnail', false, [
                        'class' => 'h-auto w-14'
                    ]);
                else :
                    esc_html_e('Add a logo in Site settings', '@textdomain');
                endif;
                ?>
                <span class="screen-reader-text"><?php echo get_bloginfo('name'); ?></span>
            </a>
        </div>
        <button
            @click.prevent="showMenu = !showMenu"
            :aria-expanded="showMenu.toString()"
            class="toggle bg-transparent border border-grey-500 md:hidden"
            type="button"
            aria-controls="nav-primary"
            aria-label="<?php esc_html_e('Toggle Navigation', '@textdomain'); ?>">
            <span x-text="showMenu ? 'Close' : 'Open'" class="icon"></span>
        </button>
        <div class="nav-container w-full md:block" :class="{'hidden': !showMenu}">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'primary_navigation',
                    'container'      => 'nav',
                    'container_class'      => 'nav -primary',
                    'container_id'   => 'nav-primary',
                    'depth'          => 5,
                    'menu_class'     => '',
                    'walker' => new AlpineJSWalker(),
                )
            );
            ?>
        </div>
    </div>
</header>
