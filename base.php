<!doctype html>

<html class="no-js" <?php language_attributes(); ?>>

    <?php get_template_part('partials/head'); ?>

    <body <?php body_class(); ?>>

        <a href="#main" class="screen-reader-text"><?php _e( 'Skip to main content', '@textdomain' ); ?></a>

        <?php
            do_action('get_header');
            get_template_part('partials/header');
        ?>

        <main id="main">

            <?php get_template_part('partials/breadcrumbs'); ?>

            <?php include \App\Boot\BaseWrapper::$main_template; ?>

        </main>

        <?php get_template_part('partials/footer'); ?>

    </body>

</html>
