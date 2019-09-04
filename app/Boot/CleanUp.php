<?php

namespace App\Boot;

/**
 * Remove bloat
 * 
 * @category Cleanup
 * @package  TenDegrees/Base
 * @author   10 Degrees <hello@10degrees.uk>
 * @license  https://opensource.org/licenses/MIT MIT 
 * @link     https://www.10degrees.uk
 */
class CleanUp
{
    /**
     * Initialize the object
     */
    public function __construct()
    {
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'wp_generator');
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action('admin_print_styles', 'print_emoji_styles'); 
        remove_filter('the_content_feed', 'wp_staticize_emoji');
        remove_filter('comment_text_rss', 'wp_staticize_emoji'); 
        remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
        add_filter('feed_links_show_comments_feed', '__return_false'); 
        add_filter('tiny_mce_plugins', [$this, 'disableEmojisTinyMce']);
        add_filter('wp_resource_hints', [$this, 'disableEmojiDnsPrefetch'], 10, 2);
    }

    /**
     * Filter emojis out of TinyMCE
     *
     * @param array $plugins 
     * 
     * @return void
     */
    public function disableEmojisTinyMce( $plugins ) 
    {

        if (is_array($plugins)) {

            return array_diff($plugins, array( 'wpemoji' ));

        } else {

            return array();

        }

    }

    /**
     * Disable emoji DNS prefetch
     *
     * @param array  $urls          URLs to prefetch
     * @param string $relation_type type of DNS hint
     * 
     * @return void
     */
    public function disableEmojiDnsPrefetch( $urls, $relation_type ) 
    {

        if ('dns-prefetch' == $relation_type) {

            $emoji_url = 'https://s.w.org/images/core/emoji/2/svg/';

            $emoji_svg_url = apply_filters('emoji_svg_url', $emoji_url);

            $urls = array_diff($urls, array($emoji_svg_url));

        }

        return $urls;

    }

}