<?php

namespace App\ACF_Blocks;

use App\ACF_Blocks\AbstractBlockRegistration;

class Testimonials extends AbstractBlockRegistration
{
    /**
     *
     * Declare ACF blocks for Block Editor
     *
     */
    public function register()
    {
        acf_register_block(
            [
                'name'				=> 'testimonials',
                'title'				=> __('Testimonials'),
                'description'		=> __('Displays a number of testimonials from a category.'),
                'render_callback'	=> [$this, 'render'],
                'category'			=> 'common',
                'icon'				=> 'admin-comments',
                'keywords'			=> array( 'testimonial', 'quote' ),
            ]
        );
    }

    /**
     *
     * Callback to render ACF blocks
     *
     */
    public function render($block)
    {
        // convert name ("acf/testimonial") into path friendly slug ("testimonial")
        $slug = str_replace('acf/', '', $block['name']);
        
        // include a template part from within the "views/blocks" folder
        if (file_exists(get_theme_file_path("/partials/blocks/{$slug}.php"))) {
            include(get_theme_file_path("/partials/blocks/{$slug}.php"));
        }
    }
}
