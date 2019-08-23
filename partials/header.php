<header class="banner">
    <div class="banner__inner">
        <div class="banner__container">

            <div class="banner__logo" itemscope itemtype="http://schema.org/Organization">
                <a itemprop="url" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <?php td_get_svg('logo.svg'); ?>
                    <span class="screen-reader-text"><?php echo get_bloginfo('name'); ?></span>
                </a>
            </div>

            <div class="banner__nav">
                <nav>
                    <?php if ( has_nav_menu( 'primary_navigation' ) ) {
                        wp_nav_menu( array( 'theme_location' => 'primary_navigation', 'depth' => 4 ) );
                    }; ?>
                </nav>
            </div>

            <div class="banner__nav-control">
                <button class="nav-control" type="button" role="button" aria-label="Toggle Navigation">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

        </div>
    </div>
</header>