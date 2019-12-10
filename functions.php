<?php

/**
 *
 * If this file is accessed directory, then abort.
 *
 */
if (!defined('WPINC')) {
    die;
}

/**
 *
 * Composer
 *
 */
require __DIR__ . '/vendor/autoload.php';

/**
 *
 * Global helpers
 *
 */
foreach (glob(get_template_directory() . '/app/Helpers/*.php') as $filename) {
    require_once($filename);
}

/**
 *
 * Finally boot the theme and all core functionality
 *
 */
add_action('init', function () {
    new \App\Inc\RegisterServiceProviders;
});

function be_reusable_blocks_admin_menu() {
    add_menu_page( 'Reusable Blocks', 'Reusable Blocks', 'edit_posts', 'edit.php?post_type=wp_block', '', 'dashicons-editor-table', 22 );
}
add_action( 'admin_menu', 'be_reusable_blocks_admin_menu' );