<header class="header -primary">

    <div class="logo" itemscope itemtype="http://schema.org/Organization">
        <a itemprop="url" href="<?php echo esc_url(home_url('/')); ?>">
            <?php
            if (get_option('options_site_logo')) :
                td_print_svg(wp_get_attachment_url(get_option('options_site_logo')));
            else :
                esc_html_e('Add a logo in Settings', '@textdomain');
            endif;
            ?>
            <span class="screen-reader-text"><?php echo get_bloginfo('name'); ?></span>
        </a>
    </div>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" aria-label="<?php esc_html_e( 'Toggle Navigation', 'theme-textdomain' ); ?>">
        <span class="navbar-toggler-icon"></span>
    </button>

    <?php
    wp_nav_menu(array(
        'theme_location' => 'primary_navigation',
        'container'      => 'nav',
        'container_class'      => 'nav -primary',
        'depth'          => 5,
        'menu_class'     => '',
        'walker'         => new App\Walkers\BootstrapWalker(),
        'fallback_cb'    => 'App\Walkers\BootstrapWalker::fallback',
    ));
    ?>

</header>
