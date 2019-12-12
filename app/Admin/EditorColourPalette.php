<?php

namespace App\Admin;

/**
 * Add custom CSS properties to block editor colour palette
 */
class EditorColourPalette
{
    public function __construct()
    {
        $this->addEditorColourPalette();
    }

    /**
     * Set the colour palette according to colours defined in SCSS
     * @see src/scss/common/_variables.scss
     */
    public function addEditorColourPalette()
    {
        add_theme_support(
            'editor-color-palette',
            [
                [
                    'name'  => __('Primary', '@textdomain'),
                    'slug'  => 'primary',
                    'color' => 'var(--primary)',
                ],
                [
                    'name'  => __('Secondary', '@textdomain'),
                    'slug'  => 'secondary',
                    'color' => 'var(--secondary)',
                ],
                [
                    'name'  => __('Tertiary', '@textdomain'),
                    'slug'  => 'tertiary',
                    'color' => 'var(--tertiary)',
                ],
                [
                    'name'  => __('White', '@textdomain'),
                    'slug'  => 'white',
                    'color' => 'var(--white)',
                ],
                [
                    'name'  => __('Body text', '@textdomain'),
                    'slug'  => 'body-text',
                    'color' => 'var(--body-text)',
                ],
            ]
        );
    }
}
