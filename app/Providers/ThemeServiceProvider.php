<?php

namespace App\Providers;

use App\Inc\ServiceProvider;

/**
 * Registers theme services (god service provider? :))
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
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
        '\App\Boot\ACFToTheContent',
        '\App\Boot\GoogleMapsAPIIntegration',
        '\App\Boot\CleanUp',
        '\App\Boot\RealtimeFindAndReplace',
        '\App\Boot\Util',
        '\App\Boot\GravityForms',
        '\App\Boot\Yoast',
    ];
}
