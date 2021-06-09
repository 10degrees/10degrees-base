<?php

namespace App\Acf\Blocks;

use App\Support\Acf\Block;

/**
 * Posts block
 *
 * Provides an ACF block to display a number of posts filtered by category
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class Posts extends Block
{
    /**
     * A unique name that identifies the block (without namespace)
     *
     * @var string
     */
    protected $name = 'posts';

    /**
     * The block options
     *
     * @var array
     */
    protected $options = [
        'title' => 'Posts',
        'description' => 'An in-page filterable list of posts, with pagination.',
        'icon'        => 'format-aside',
        'category'    => 'theme',
        'keywords'    => ['posts'],
        'supports'    => ['align' => ['wide', 'full']],
        'example'  => [
            'attributes' => [
                'mode' => 'preview',
                'data' => [],
            ],
        ],
    ];
}
