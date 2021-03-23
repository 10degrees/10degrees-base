<header
    x-data="{showMenu: false}"
    class="header -primary"
    @load.window="showMenu = window.innerWidth > 900"
    @resize.window="showMenu = window.innerWidth > 900">
    <div class="container content">
        <div class="logo" itemscope itemtype="http://schema.org/Organization">
            <a itemprop="url" href="<?php echo esc_url(home_url('/')); ?>">
                <?php
                if ($logo = get_field('site_logo', 'option')) :
                    echo wp_get_attachment_image($logo['id']);
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
            class="toggle"
            type="button"
            aria-controls="nav-primary"
            aria-label="<?php esc_html_e('Toggle Navigation', '@textdomain'); ?>">
            <span class="icon">Open</span>
        </button>
        <div class="nav-container" x-show="showMenu">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'primary_navigation',
                    'container'      => 'nav',
                    'container_class'      => 'nav -primary',
                    'container_id'   => 'nav-primary',
                    'depth'          => 5,
                    'menu_class'     => ''
                )
            );
            ?>
        </div>
    </div>
</header>
