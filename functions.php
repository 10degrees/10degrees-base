<?php
// phpcs:ignoreFile

/**
 *
 * If this file is accessed directory, then abort.
 *
 */
if (!defined('WPINC')) {
    die;
}

/**
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
    include_once $filename;
}

/**
 *
 * Syntax-highlighting Code Block
 *
 */
add_filter(
    'syntax_highlighting_code_block_style',
    function () {
        return 'github';
    }
);

/**
 *
 * Finally boot the theme and all core functionality
 *
 */
add_action('init', function () {
    new \App\Inc\RegisterServiceProviders;
});
