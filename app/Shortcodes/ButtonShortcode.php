<?php

namespace App\Shortcodes;

use App\Shortcodes\Shortcode;

/**
 * Provides a shortcode for buttons
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class ButtonShortcode extends Shortcode
{
    /**
     * Set the shortcode name
     *
     * @var string
     */
    protected $shortcode = 'button';

    /**
     * Set the default variable attributes
     *
     * @var array
     */
    public $defaultAttributes = [
        'class' => 'button',
        'link' => '#',
        'text' => '',
        'post_id' => null,
    ];

    /**
     * Handle the incoming shortcode. Variables are available to
     * you as properties of the class
     *
     * @return string
     */
    public function handle()
    {
        $permalink = $this->getPermalink();

        if ($permalink) {
            return '<a class="' . $this->class . '" href="' . $permalink . '">' . $this->text . '</a>';
        }

        return;
    }

    /**
     * Get the permalink for the button. Allows for a post id or link attribute.
     *
     * @return string
     */
    private function getPermalink()
    {
        if ($this->post_id) {
            $permalink = get_permalink($this->post_id);
        }

        if ($permalink) {
            return $permalink;
        }

        return $this->link;
    }
}
