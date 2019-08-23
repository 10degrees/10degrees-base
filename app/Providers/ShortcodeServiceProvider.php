<?php

namespace App\Providers;

use App\Inc\ServiceProvider;

class ShortcodeServiceProvider extends ServiceProvider
{
	/**
	 * List the classes that need to be booted on every request
	 * 
	 * @var array
	 */
	protected $classes = [
		'\App\Shortcodes\SocialIconsShortcode',
		'\App\Shortcodes\ButtonShortcode',
	];
}
