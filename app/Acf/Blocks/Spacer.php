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
class Spacer extends Block
{
    /**
     * A unique name that identifies the block (without namespace)
     *
     * @var string
     */
    protected $name = 'spacer';

    /**
     * The block options
     *
     * @var array
     */
    protected $options = [
        'title'       => 'Spacer',
        'description' => 'Add a section of whitespace to the page.',
        'icon'        => 'sort',
        'category'    => 'theme',
        'keywords'    => ['spacer', 'whitespace'],
        'supports'    => ['align' => false],
        'example'  => [
            'attributes' => [
                'mode' => 'preview',
                'data' => [],
            ],
        ],
    ];
}
