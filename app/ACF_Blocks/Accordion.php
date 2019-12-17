<?php

namespace App\ACF_Blocks;

use App\ACF_Blocks\AbstractBlockRegistration;

/**
 * Accordion
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
class Accordion extends AbstractBlockRegistration
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
                'name' => 'accordion',
                'title' => __('Accordion'),
                'description' => __('An accordion, with a heading and content.'), //@TODO add namespace
                'render_callback' => [$this, 'render'],
                'category' => 'common',
                'icon' => 'arrow-down',
                'keywords' => array( 'accordion'),
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
        // convert name ("acf/testimonial") into path friendly slug ("testimonial")
        $slug = str_replace('acf/', '', $block['name']);
        
        // include a template part from within the "views/blocks" folder
        if (file_exists(get_theme_file_path("/partials/blocks/{$slug}.php"))) {
            include get_theme_file_path("/partials/blocks/{$slug}.php");
        }
    }
}
