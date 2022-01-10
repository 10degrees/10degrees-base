<?php

/**
 * Base template
 *
 * PHP version 7.2
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 **/
?>
<!doctype html>

<html class="no-js" <?php language_attributes(); ?>>

<?php get_template_part('partials/head'); ?>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>

    <a href="#main" class="sr-only sr-only-on-focus"><?php esc_html_e('Skip to main content', '@textdomain'); ?></a>
    <a href="#footer" class="sr-only sr-only-on-focus"><?php esc_html_e('Skip to footer', '@textdomain'); ?></a>

    <?php
    do_action('get_header');
    get_template_part('partials/header');
    ?>

    <main id="main">
        <?php get_template_part('partials/breadcrumbs'); ?>
        <?php require \App\Boot\BaseWrapper::$main_template; ?>
    </main>

    <?php get_template_part('partials/footer'); ?>

    <?php get_template_part('partials/ie-modal'); ?>

</body>

</html>