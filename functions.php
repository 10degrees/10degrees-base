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
