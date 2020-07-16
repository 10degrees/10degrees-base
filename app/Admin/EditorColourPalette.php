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
class EditorColourPalette
{
    /**
     * The name of the ACF field to filter.
     *
     * @var string
     */
    protected $acfColourSelectName = 'theme_colour_palette';

    /**
     * Constructor
     */
    public function __construct()
    {
        add_filter('acf/load_field', [$this, 'acfColourPicker']);
        $this->addEditorColourPalette();
    }

    /**
     * Set the colour palette according to colours defined in SCSS
     *
     * @see src/scss/common/_variables.scss
     *
     * @return void
     */
    public function addEditorColourPalette()
    {
        add_theme_support('editor-color-palette', $this->getColours());
    }

    /**
     * Get the colour array.
     *
     * @return array
     */
    public function getColours()
    {
        return [
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
        ];
    }

    /**
     * Return the theme colours to the ACF colour picker.
     *
     * @param array $field The ACF field
     *
     * @return array
     */
    public function acfColourPicker($field)
    {
        if ($field['type'] === 'select' && $field['name'] == $this->acfColourSelectName) {

            $field['choices'] = $this->getACFColourOptions();
            $field['default_value'] = 'primary';
        }
        return $field;
    }

    /**
     * Return a formatted array for ACF select options.
     *
     * @return array
     */
    public function getACFColourOptions()
    {
        $array = [];
        foreach ($this->getColours() as $color) {
            $array[$color['slug']] = $color['name'];
        }
        return $array;
    }
}
