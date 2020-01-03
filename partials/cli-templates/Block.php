<?php

namespace App\ACF_Blocks;

use App\ACF_Blocks\AbstractBlockRegistration;

/**
 * __BLOCK_CLASSNAME__
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class __BLOCK_CLASSNAME__ extends AbstractBlockRegistration
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
                'name' => '__BLOCK_NAME__',
                'title' => __('__BLOCK_TITLE__'),
                'description' => __(''),
                'render_callback' => [$this, 'render'],
                'category' => 'common',
                'icon' => 'arrow-down',
                'keywords' => array( '__BLOCK_NAME__'),
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
        if (file_exists(get_theme_file_path("/partials/blocks/{$slug}.php"))) {
            include get_theme_file_path("/partials/blocks/{$slug}.php");
        }
    }
}
