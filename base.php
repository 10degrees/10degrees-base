<?php
/**
 * Base template
 *
 * @package      10degrees-base
 * @author       10 Degrees
 * @since        2.0.0
 * @license      GPL-2.0+
**/
?>
<!doctype html>

<html class="no-js" <?php language_attributes(); ?>>

    <?php get_template_part('partials/head'); ?>

    <body <?php body_class(); ?>>

        <?php wp_body_open(); ?>

        <a href="#main" class="screen-reader-text"><?php esc_html_e('Skip to main content', '@textdomain'); ?></a>

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
