<?php

namespace App\Providers;

use App\Support\ServiceProvider;

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
     * The AJAX and REST controllers
     *
     * @var array
     */
    protected $classes = [

        /**
         * AJAX Controllers
         */
        \App\Http\Controllers\ExampleAjaxController::class,

        /**
         * REST API Controllers
         */
        \App\Http\Controllers\ExampleRestController::class,

    ];
}
