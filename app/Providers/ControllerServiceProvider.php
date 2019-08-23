<?php

namespace App\Providers;

use App\Inc\ServiceProvider;

class ControllerServiceProvider extends ServiceProvider
{
	/**
	 * List the admin specific classes that need to be booted on every request
	 * 
	 * @var array
	 */
	protected $classes = [
		
		/**
		 *
		 * 
		 * Web Controllers
		 *
		 * 
		 */
		'\App\Controllers\Web\ExampleController',
		

		/**
		 *
		 * 
		 * REST API Controllers
		 *
		 * 
		 */
		// '\App\Controllers\Api\ExampleRestApiController',
		
	];
}