<?php

namespace App\Providers;

use App\Inc\ServiceProvider;

class CptServiceProvider extends ServiceProvider
{
	/**
	 * List the classes that need to be booted on every request
	 * 
	 * @var array
	 */
	protected $classes = [
		'\App\Cpt\Testimonials',
	];
}