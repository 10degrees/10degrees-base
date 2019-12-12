<?php

namespace App\Admin;

/**
 * Add custom CSS properties to block editor colour palette
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class FontSizes
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->addFontSizes();
    }

    /**
     * Set the custom font sizes for text-based blocks
     *
     * @return void
     */
    public function addFontSizes()
    {
        add_theme_support(
            'editor-font-sizes',
            [
                [
                    'name'  => __('Small', '@textdomain'),
                    'slug'  => 'small',
                    'size' => 12
                ],
                [
                    'name'  => __('Normal', '@textdomain'),
                    'slug'  => 'normal',
                    'size' => 16
                ],
                [
                    'name'  => __('Large', '@textdomain'),
                    'slug'  => 'large',
                    'size' => 24
                ]
            ]
        );
    }
}
