<?php

namespace App\Providers;

use App\Support\ServiceProvider;

/**
 * Registers shortcodes
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class ShortcodeServiceProvider extends ServiceProvider
{
    /**
     * List the classes that need to be booted on every request
     *
     * @var array
     */
    protected $classes = [
        \App\Shortcodes\ButtonShortcode::class,
    ];
}
