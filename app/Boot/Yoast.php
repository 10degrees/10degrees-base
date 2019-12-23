<?php

namespace App\Boot;

/**
 * Yoast integration
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class Yoast
{
    /**
     * Constructor
     */
    public function __construct()
    {
        add_filter('admin_head', [$this, 'hideDeadSocialNetworksInYoastSocial']);
    }

    /**
     * Get social link options for Yoast SEO
     *
     * @return void
     */
    public static function getSocialLinkOptions()
    {
        $options = array(
            'facebook' => array(
                'key' => 'facebook_site',
                'icon' => td_get_svg('social-icons/facebook.svg'),
            ),
            'twitter' => array(
                'key' => 'twitter_site',
                'prepend' => 'https://twitter.com/',
                'icon' => td_get_svg('social-icons/twitter.svg'),
            ),
            'instagram' => array(
                'key' => 'instagram_url',
                'icon' => td_get_svg('social-icons/instagram.svg'),
            ),
            'linkedin' => array(
                'key' => 'linkedin_url',
                'icon' => td_get_svg('social-icons/linkedin.svg'),
            ),
            'myspace' => array(
                'key' => 'myspace_url',
                'icon' => '',
            ),
            'pinterest' => array(
                'key' => 'pinterest_url',
                'icon' => td_get_svg('social-icons/pinterest.svg'),
            ),
            'youtube' => array(
                'key' => 'youtube_url',
                'icon' => td_get_svg('social-icons/youtube.svg'),
            ),
            'googleplus' => array(
                'key' => 'google_plus_url',
                'icon' => '',
            )
        );

        return $options;
    }

    /**
     * CSS away social networks that flopped
     *
     * @return string CSS
     */
    public function hideDeadSocialNetworksInYoastSocial()
    {
        ob_start(); ?>
        <style>
        #myspace_url,
        label[for="myspace_url"],
        #myspace_url + br {
            display: none!important;//RIP Tom
        }
        </style>
        <?php
        echo ob_get_clean();
    }
}
