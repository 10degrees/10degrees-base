<?php

namespace App\Shortcodes;

use App\Shortcodes\Shortcode;

/**
 * Provides a shortcode for social icons
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class SocialIconsShortcode extends Shortcode
{
    /**
     * Set the shortcode name
     *
     * @var string
     */
    protected $shortcode = 'socialicons';

    /**
     * Set the default variable attributes
     *
     * @var array
     */
    public $defaultAttributes = [
        // 'foo' => 'bar'
    ];

    /**
     * Handle the incoming shortcode. Variables are available
     * to you as properties of the class
     *
     * @return td_view
     */
    public function handle()
    {
        return td_view('partials/content-social');
    }
}
