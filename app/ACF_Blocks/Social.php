<?php

namespace App\ACF_Blocks;

use App\ACF_Blocks\AbstractBlockRegistration;
use App\Boot\Yoast;

/**
 * Social
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class Social extends AbstractBlockRegistration
{
    /**
     * Constructor
     *
     * Only register the class if ACF is active
     */
    public function __construct()
    {
        if (function_exists('acf_register_block_type') && is_plugin_active('wordpress-seo/wp-seo.php')) {
            $this->register();
        }
    }
    /**
     * Declare ACF blocks for Block Editor
     *
     * @return void
     */
    public function register()
    {
        acf_register_block(
            [
                'name' => 'social',
                'title' => __('Social'),
                'description' => __('A social.'), //@TODO add namespace
                'render_callback' => [$this, 'render'],
                'category' => 'common',
                'icon' => 'share',
                'keywords' => array( 'social','custom'),
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

        $options = Yoast::getSocialLinkOptions();

        $options_custom['webshare'] = [
            'key' => 'webshare',
            'icon' =>  td_get_svg('social-icons/share.svg')
        ];

        $options = array_merge($options_custom, $options);//Put WebShare first
        
        echo td_view("partials/blocks/{$slug}", [
            'options' => $options,
            'seo_data' => get_option('wpseo_social'),
            'block' => $block
        ]);
    }
}
