<?php

/**
 * Initial WordPress entry point
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */

/**
 * If this file is accessed directory, then abort.
 */

if (!defined('WPINC')) {
    die;
}

add_action('after_switch_theme', function (string $oldName, WP_Theme $oldTheme) {
    if (!class_exists('ACF')) {
        add_action('admin_head', function () {
            echo '<div class="notice notice-error">';
            echo '<p>' . __('ACF is not activated!', '@textdomain') . '</p>';
            echo '</div>';
        });
        switch_theme($oldTheme->stylesheet);
        return false;
    }
}, 10, 2);

/**
 * Composer
 */
require __DIR__ . '/vendor/autoload.php';

/**
 * Global helpers
 */
foreach (glob(get_template_directory() . '/app/Helpers/*.php') as $filename) {
    include_once $filename;
}

/**
 * Syntax-highlighting Code Block
 */
add_filter(
    'syntax_highlighting_code_block_style',
    function () {
        return 'github';
    }
);

/**
 * Finally boot the theme and all core functionality
 */
new \App\Inc\RegisterServiceProviders();
