<?php

namespace App\Providers;

use App\Inc\ServiceProvider;

class BlockServiceProvider extends ServiceProvider
{
	/**
	 * List the admin specific classes that need to be booted on every request
	 * 
	 * @var array
	 */
	protected $classes = [
		// '\App\ACF_Blocks\Testimonial',
	];
}