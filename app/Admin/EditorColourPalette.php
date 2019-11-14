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
                    'color' => 'var(--primary-colour)',
                ],
                [
                    'name'  => __('Secondary', '@textdomain'),
                    'slug'  => 'secondary',
                    'color' => 'var(--secondary-colour)',
                ],
                [
                    'name'  => __('Tertiary', '@textdomain'),
                    'slug'  => 'Tertiary',
                    'color' => 'var(--tertiary-colour)',
                ],
                [
                    'name'  => __('White', '@textdomain'),
                    'slug'  => 'white',
                    'color' => 'white',
                ],
                [
                    'name'  => __('Dark Grey', '@textdomain'),
                    'slug'  => 'grey-9',
                    'color' => 'var(--text-colour)',
                ],
            ]
        );
    }
}
