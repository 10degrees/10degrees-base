<?php

namespace App\Shortcodes;

use App\Shortcodes\Shortcode;

class SocialIconsShortcode extends Shortcode
{
	/**
	 * Set the shortcode name
	 * 
	 * @var string
	 */
	protected $shortcode = 'socialicons';

	/**
	 * Set the default variable attributes
	 * 
	 * @var array
	 */
	public $defaultAttributes = [
		// 'foo' => 'bar'
	];

	/**
	 * Handle the incoming shortcode. Variables are available to you as properties of the class
	 * 
	 * @return td_view
	 */
	public function handle()
	{
		return td_view('partials/content-social');
	}
}