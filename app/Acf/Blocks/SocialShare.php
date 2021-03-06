<?php

namespace App\Acf\Blocks;

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
class SocialShare extends Block
{
    /**
     * A unique name that identifies the block (without namespace)
     *
     * @var string
     */
    protected $name = 'social-share';

    /**
     * The block options
     *
     * @var array
     */
    protected $options = [
        'title'       => 'Social share',
        'description' => 'Add buttons to share the current post/page.',
        'icon'        => 'share',
        'category'    => 'theme',
        'keywords'    => ['social', 'custom', 'share'],
        'supports'    => ['align' => ['wide', 'full']],
        'example'  => [
            'attributes' => [
                'mode' => 'preview',
                'data' => [],
            ],
        ],
    ];
}
