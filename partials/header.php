<header class="header -primary">

        <div class="logo" itemscope itemtype="http://schema.org/Organization">
            <a itemprop="url" href="<?php echo esc_url(home_url('/')); ?>">
                <?php
                if ($logo = get_field('site_logo', 'option')) :
                    echo wp_get_attachment_image($logo['id']);
                else :
                    esc_html_e('Add a logo in Settings', '@textdomain');
                endif;
                ?>
                <span class="screen-reader-text"><?php echo get_bloginfo('name'); ?></span>
            </a>
        </div>

        <button class="toggle" type="button"  aria-controls="nav-primary" aria-expanded="false" aria-label="<?php esc_html_e( 'Toggle Navigation', 'theme-textdomain' ); ?>">
            <span class="icon">Open</span>
        </button>

        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary_navigation',
            'container'      => 'nav',
            'container_class'      => 'nav -primary',
            'container_id'   => 'nav-primary',
            'depth'          => 5,
            'menu_class'     => '',
            'walker'         => new App\Walkers\BootstrapWalker(),
            'fallback_cb'    => 'App\Walkers\BootstrapWalker::fallback',
        ));
        ?>


</header>
