<?php

namespace App\Inc;

use App\Support\ServiceProvider;

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
        \App\Providers\ConsoleServiceProvider::class,
        \App\Providers\ConfigServiceProvider::class,
        \App\Providers\DatabaseServiceProvider::class,
        \App\Providers\AdminServiceProvider::class,
        \App\Providers\ThemeServiceProvider::class,
        \App\Providers\CptServiceProvider::class,
        \App\Providers\BlockServiceProvider::class,
        \App\Providers\ShortcodeServiceProvider::class,
        \App\Providers\ControllerServiceProvider::class,
        \App\Providers\FieldServiceProvider::class,
        // \App\Providers\WoocommerceServiceProvider::class,
    ];
}
