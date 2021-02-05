<?php

namespace App\Acf\Blocks;

use App\Boot\Yoast;
use App\Support\Acf\Block;

/**
 * Accordion block
 *
 * Provides an ACF block to display an accordion
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class SocialLinks extends Block
{
    /**
     * A unique name that identifies the block (without namespace)
     *
     * @var string
     */
    protected $name = 'social-links';

    /**
     * The block options
     *
     * @var array
     */
    protected $options = [
        'title'       => 'Social links',
        'description' => 'Add links to social media.',
        'icon'        => 'admin-links',
        'category'    => 'theme',
        'keywords'    => ['social', 'custom', 'links'],
        'supports'    => ['align' => ['wide', 'full']],
        'example'  => [
            'attributes' => [
                'mode' => 'preview',
                'data' => [],
            ],
        ],
    ];

    /**
     * Constructor
     *
     * Only register the class if ACF is active
     */
    public function __construct()
    {
        if (function_exists('is_plugin_active') && is_plugin_active('wordpress-seo/wp-seo.php')) {
            parent::__construct();
        }
    }

    /**
     * Callback to render ACF blocks
     *
     * @param $block Name of block
     *
     * @return void
     */
    public function render(array $block): void
    {
        echo td_view(
            "partials/blocks/{$this->name}",
            [
                'options'  => Yoast::getSocialLinkOptions(),
                'seo_data' => get_option('wpseo_social'),
                'block'    => $block,
            ]
        );
    }
}
