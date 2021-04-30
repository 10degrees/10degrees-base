<?php

namespace App\Support\WordPress;

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
    /**
     * The shortcode name
     *
     * @var string
     */
    protected $shortcode = '';

    /**
     * The default attributes
     *
     * @var array
     */
    protected $defaultAttributes = [];

    /**
     * The shortcode attributes
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * The shortcode content
     *
     * @var string
     */
    protected $content = '';

    /**
     * Add the shortcode
     */
    public function __construct()
    {
        add_shortcode($this->shortcode, [$this, 'setVariables']);
    }

    /**
     * Set shortcode atts
     *
     * @param array|string|null $attrs   The shortcode attributes
     * @param string|null       $content The shortcode content
     *
     * @return string
     */
    public function setVariables($attrs = [], ?string $content = null): string
    {
        if ($this->defaultAttributes) {
            $this->attributes = shortcode_atts($this->defaultAttributes, $attrs);
        }
        $this->content = $content ?? '';

        return $this->handle();
    }

    /**
     * Handle the incoming shortcode. Variables are available to you as
     * properties of the class
     *
     * @return string
     */
    abstract public function handle(): string;

    /**
     * Dynamically get the shortcode attributes
     *
     * @param string $key The attribute name
     *
     * @return mixed
     */
    public function __get(string $key)
    {
        return $this->attributes[$key] ?? null;
    }
}
