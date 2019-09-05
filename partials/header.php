<header class="header header__primary">

    <nav class="navbar navbar-expand-md navbar-light bg-light">
        
        <a class="navbar-brand" itemprop="url" href="<?php echo esc_url(home_url('/')); ?>">

            <?php if (get_option('options_site_logo')) : ?>

                <?php td_print_svg(wp_get_attachment_url(get_option('options_site_logo'))); ?>

            <?php endif; ?>
            
            <span class="screen-reader-text"><?php echo get_bloginfo('name'); ?></span>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" aria-label="<?php esc_html_e( 'Toggle Navigation', 'theme-textdomain' ); ?>">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbar-content">

            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary_navigation',
                'menu_id'        => 'primary_navigation',
                'container'      => false,
                'depth'          => 5,
                'menu_class'     => 'navbar-nav ml-auto bootstrap-walker-nav-menu',
                'walker'         => new App\Walkers\BootstrapWalker(),
                'fallback_cb'    => 'App\Walkers\BootstrapWalker::fallback',
            ));
            ?>

        </div>

    </nav>

</header>
