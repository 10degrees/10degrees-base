<?php

namespace App\Providers;

use App\Support\ServiceProvider;

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
        \App\ACF_Fields\SiteSettings::class,
        \App\ACF_Fields\Testimonials::class,
        \App\ACF_Fields\Accordion::class,
        \App\ACF_Fields\SocialShare::class,
        // \App\ACF_Fields\ProtectContent::class,
        // \App\ACF_Fields\PageBuilder::class,
        // \App\ACF_Fields\LoginSettings::class,
    ];
}
