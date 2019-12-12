<?php

namespace App\Inc;

use App\Inc\ServiceProvider;

/**
 * Registers service providers
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
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
