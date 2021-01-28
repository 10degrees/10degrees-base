<?php

namespace App\Boot;

/**
 * Register custom Gutenberg blocks.
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class RegisterCustomBlocks
{
    /**
     * An array of custom blocks to register. The block options are set in the
     * JavaScript.
     *
     * @var array
     */
    protected $customBlocks = [
        'link-button',
        'spacer',
    ];

    /**
     * Add actions and filters.
     */
    public function __construct()
    {
        add_action('init', [$this,'registerBlocks']);
        add_filter('block_categories', [$this, 'registerCategories'], 10, 2);
    }

    /**
     * Loop over the blocks and register then with the ten-degrees namespace.
     *
     * @return void
     */
    public function registerBlocks()
    {
        foreach ($this->customBlocks as $blockName) {
            register_block_type('custom-blocks/' . $blockName, []);
        }
    }

    /**
     * Register custom block categories.
     *
     * @param array   $categories The block category array.
     * @param WP_Post $post       The post object.
     *
     * @return array
     */
    public function registerCategories($categories, $post)
    {
        return array_merge(
            $categories,
            [
                [
                    'slug'  => 'custom-blocks',
                    'title' => __('Custom Blocks', '@textdomain'),
                ],
            ]
        );
    }
}
