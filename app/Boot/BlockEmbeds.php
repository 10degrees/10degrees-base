<?php

namespace App\Boot;

/**
 * Filters the embed block
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class BlockEmbeds
{
    /**
     * Initialize the object
     */
    public function __construct()
    {
        add_filter('embed_oembed_html', [$this, 'blockEmbedHTML'], 10, 4);
    }

    /**
     * Makes the facebook block responsive.
     *
     * @param string $html The embed HTML
     * @param string $url  The embed URL
     *
     * @return void
     */
    public function blockEmbedHTML($html, $url)
    {
        // phpcs:disable
        $classes = 'wp-block-embed';
        switch ($url) {
            case (false !== strpos($url, 'facebook.com')):
                $classes = 'wp-block-embed is-provider-facebook';
                $pattern = '/data-width="(\d+)"/';
                $html = preg_replace($pattern, 'data-width="auto"', $html);
                break;
            default:
                $classes = 'wp-block-embed';
        }
        // phpcs:enable
        return '<div class="' . $classes . '">' . $html . '</div>';
    }
}
