<?php

namespace App\Providers;

use App\Inc\ServiceProvider;

class ThemeServiceProvider extends ServiceProvider
{
	/**
	 * List the classes that need to be booted on every request
	 * 
	 * @var array
	 */
	protected $classes = [
		'\App\Boot\Init',
		'\App\Boot\BaseWrapper',
		'\App\Boot\Enqueue',
		'\App\Boot\RegisterMenus',
		'\App\Boot\RegisterWidgets',
		'\App\Boot\CustomMenuWalkerRegister',
		'\App\Boot\ACFToTheContent',
		'\App\Boot\GoogleMapsAPIIntegration',
		'\App\Boot\CleanUp',
		'\App\Boot\RealtimeFindAndReplace',
		'\App\Boot\Util',
		'\App\Boot\GravityForms',
	];
}