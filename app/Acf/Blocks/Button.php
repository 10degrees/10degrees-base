<?php

namespace App\Acf\Blocks;

use App\Support\Acf\Block;

/**
 * Register a block
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class Button extends Block
{
    /**
     * A unique name that identifies the block (without namespace)
     *
     * @var string
     */
    protected $name = 'button';

    /**
     * The block options
     *
     * @var array
     */
    protected $options = [
        'title'       => 'Button',
        'description' => 'Block description',
        'icon'        => 'button',
        'category'    => 'theme',
        'keywords'    => ['button'],
        'supports'    => ['align' => false],
        'example'  => [
            'attributes' => [
                'mode' => 'preview',
                'data' => [],
            ],
        ],
    ];
}
