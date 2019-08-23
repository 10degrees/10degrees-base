<?php

namespace App\Providers;

use App\Inc\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider
{
	/**
	 * List the admin specific classes that need to be booted on every request
	 * 
	 * @var array
	 */
	protected $classes = [
		'\App\Config\Mail',
		'\App\Config\Queue',
	];
}