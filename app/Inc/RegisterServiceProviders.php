<?php

namespace App\Inc;

use App\Inc\ServiceProvider;

class RegisterServiceProviders extends ServiceProvider
{
	/**
	 * Register your service providers here.
	 * 
	 * @var array
	 */
	protected $classes = [
		'\App\Providers\ConfigServiceProvider',
		'\App\Providers\AdminServiceProvider',
		'\App\Providers\ThemeServiceProvider',
		'\App\Providers\CptServiceProvider',
		'\App\Providers\BlockServiceProvider',
		'\App\Providers\ShortcodeServiceProvider',
		'\App\Providers\ControllerServiceProvider',
		'\App\Providers\FieldServiceProvider'
		// '\App\Providers\WoocommerceServiceProvider',
	];

}