<?php

namespace App\Shortcodes;

/**
 * Provides a base class for registering shortcodes
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
abstract class Shortcode
{
    protected $defaultAttributes = false;

    /**
     * Constructor
     */
    public function __construct()
    {
        add_shortcode($this->shortcode, [$this, 'setVariables']);
    }

    /**
     * Set shortcode atts
     *
     * @param array $attributes Key value array of attributes
     *
     * @return void
     */
    public function setVariables($attributes)
    {
        if ($attributes == '') {
            $attributes = [];
        }
        
        if ($this->defaultAttributes) {
            $attributes = shortcode_atts($this->defaultAttributes, $attributes);
        }

        foreach ($attributes as $key => $value) {
            $this->{$key} = $value;
        }

        return $this->handle();
    }
}
