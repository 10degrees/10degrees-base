<?php

namespace App\Providers;

use App\Inc\ServiceProvider;

class WoocommerceServiceProvider extends ServiceProvider
{
	/**
	 * List the classes that need to be booted on every request
	 * 
	 * @var array
	 */
	protected $classes = [
		// '\App\Woocommerce\TemplateActions\Archive',
	];
}