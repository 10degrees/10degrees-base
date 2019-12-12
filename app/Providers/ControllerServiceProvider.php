<?php

namespace App\Providers;

use App\Inc\ServiceProvider;

/**
 * Registers controllers
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class ControllerServiceProvider extends ServiceProvider
{
    /**
     * List the admin specific classes that need to be booted on every request
     *
     * @var array
     */
    protected $classes = [
        
        /**
         * Web Controllers
         */
        '\App\Controllers\Web\ExampleController',
        
        /**
         * REST API Controllers
         */
        // '\App\Controllers\Api\ExampleRestApiController',
        
    ];
}
