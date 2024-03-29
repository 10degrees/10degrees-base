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
class Accordion extends Block
{
    /**
     * A unique name that identifies the block (without namespace)
     *
     * @var string
     */
    protected $name = 'accordion';

    /**
     * The block options
     *
     * @var array
     */
    protected $options = [
        'title'       => 'Accordion',
        'description' => 'An accordion, with a heading and content.',
        'icon'        => 'arrow-down',
        'category'    => 'theme',
        'keywords'    => ['accordion'],
        'supports'    => ['align' => ['wide', 'full']],
        'enqueue_script' => 'https://unpkg.com/@alpinejs/collapse@3.5.0/dist/cdn.min.js',
        'example'  => [
            'attributes' => [
                'mode' => 'preview',
                'data' => [],
            ],
        ],
    ];
}
