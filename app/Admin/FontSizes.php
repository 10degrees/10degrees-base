<?php

namespace App\Admin;

/**
 * Add custom CSS properties to block editor colour palette
 */
class FontSizes
{
    public function __construct()
    {
        $this->addFontSizes();
    }

    /**
     * Set the colour palette according to colours defined in SCSS
     * @see src/scss/common/_variables.scss
     */
    public function addFontSizes()
    {
        add_theme_support(
            'editor-font-sizes',
            [
                [
                    'name'  => __('Normal', '@textdomain'),
                    'slug'  => 'normal',
                    'size' => '16'
                ],
                [
                    'name'  => __('Large', '@textdomain'),
                    'slug'  => 'large',
                    'size' => '24'
                ]
            ]
        );
    }
}
