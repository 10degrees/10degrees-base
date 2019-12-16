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


/**
 *
 * Wrap specific wp-block-embeds in a div to enable responsiveness
 *
 */
function td_block_embed_html($html, $url)
{
    $classes = 'wp-block-embed';
    switch ($url) {
        case (false !== strpos($url, 'facebook.com')):
            $classes = 'wp-block-embed-facebook is-provider-facebook';
            $pattern = '/data-width="(\d+)"/';
            $html = preg_replace($pattern, 'data-width="auto"', $html);
            break;
        default:
            $classes = 'wp-block-embed';
    }
    return '<div class="' . $classes . '">' . $html . '</div>';
}
add_filter('block_embed_html', 'td_block_embed_html', 10, 4);


function gutenberg_examples_01_register_block()
{

    register_block_type('ten-degrees/button', []);
}
add_action('init', 'gutenberg_examples_01_register_block');
