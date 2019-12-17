<?php

namespace App\Providers;

use App\Inc\ServiceProvider;

/**
 * Registers ACF fields
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class FieldServiceProvider extends ServiceProvider
{
    /**
     * List the acf field specific classes that need to be booted on every request
     *
     * @var array
     */
    protected $classes = [
        '\App\ACF_Fields\SiteSettings',
        '\App\ACF_Fields\Testimonials',
        '\App\ACF_Fields\Accordion',
        // '\App\ACF_Fields\ProtectContent',
        // '\App\ACF_Fields\PageBuilder',
        // '\App\ACF_Fields\LoginSettings'
    ];
}
