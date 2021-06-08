<?php

namespace App\Providers;

use App\Support\ServiceProvider;

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
        \App\Boot\Init::class,
        \App\Boot\BaseWrapper::class,
        \App\Boot\Enqueue::class,
        \App\Boot\BlockEmbeds::class,
        \App\Boot\RegisterCustomBlocks::class,
        \App\Boot\GoogleMapsAPIIntegration::class,
        \App\Boot\CleanUp::class,
        \App\Boot\RealtimeFindAndReplace::class,
        \App\Boot\Util::class,
        \App\Boot\GravityForms::class,
        \App\Boot\Yoast::class,
        \App\Boot\WPHead::class,
        \App\Boot\Users::class,
    ];
}
