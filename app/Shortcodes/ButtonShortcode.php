<?php

namespace App\Shortcodes;

use App\Shortcodes\Shortcode;

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
	 * Handle the incoming shortcode. Variables are available to you as properties of the class
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