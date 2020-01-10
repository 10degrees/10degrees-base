<?php

namespace App\ACF_Blocks;

use App\ACF_Blocks\AbstractBlockRegistration;

/**
 * Social Share Block
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class SocialShare extends AbstractBlockRegistration
{

    /**
     * Declare ACF blocks for Block Editor
     *
     * @return void
     */
    public function register()
    {
        acf_register_block(
            [
                'name' => 'social-share',
                'title' => __('Social share'),
                'description' => __('Add share buttons.'), //@TODO add namespace
                'render_callback' => [$this, 'render'],
                'category' => 'common',
                'icon' => 'share',
                'keywords' => array( 'social','custom','share'),
                'supports' => array(
                'align' => array('wide', 'full')
                )
            ]
        );
    }
    /**
     * Callback to render ACF blocks
     *
     * @param $block Name of block
     *
     * @return void
     */
    public function render($block)
    {
        $slug = str_replace('acf/', '', $block['name']);
        $url = urlencode(rtrim($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], '/'));
        $title = urlencode(get_the_title());
        $excerpt = urlencode(get_the_excerpt());
        $featured_image_url = get_the_post_thumbnail_url();//Fallback to site logo
        if (!$featured_image_url && $logo = get_field('site_logo', 'option')) {
            $featured_image_url =  wp_get_attachment_image_src($logo['id']);
        }

        $options = $block['data'];

        // Check both field name and key as updates to the options in the admin area change which one is available
        $socialNetworks = [];
        if ($options['show_facebook'] || $options['key_show_facebook']) {
            $socialNetworks['facebook'] = [
                'url' =>  'https://www.facebook.com/sharer/sharer.php?u='.$url.'&t='.$title,
                'icon' => 'social-icons/facebook.svg'
            ];
        }

        //NB. LinkedIn share throws an error for any URL with the .local TLD
        if ($options['show_linkedin'] || $options['key_show_linkedin']) {
            $socialNetworks['linkedin'] = [
                'url' =>  'https://www.linkedin.com/sharing/share-offsite/?url='.$url,
                'icon' => 'social-icons/linkedin.svg'
            ];
        }

        if ($options['show_twitter'] || $options['key_show_twitter']) {
            $socialNetworks['twitter'] = [
                'url' =>  'http://twitter.com/share?text='.$title.'+'.$url.'&url='.$url,
                'icon' => 'social-icons/twitter.svg'
            ];
        }

        if ($options['show_pinterest'] || $options['key_show_pinterest']) {
            $socialNetworks['pinterest'] = [
                'url' => 'http://pinterest.com/pin/create/button/?url='.$url.'&media='.$featured_image_url.'&description='.$excerpt,
                'icon' => 'social-icons/pinterest.svg'
            ];
        }

        echo td_view("partials/blocks/{$slug}", [
            'block' => $block,
            'socialNetworks' => $socialNetworks
        ]);
    }
}
