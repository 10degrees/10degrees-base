<?php

namespace App\Providers;

use App\Support\ServiceProvider;

/**
 * Registers admin services
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class AdminServiceProvider extends ServiceProvider
{
    /**
     * List the admin specific classes that need to be booted on every request
     *
     * @var array
     */
    protected $classes = [
        \App\Admin\DashboardBranding::class,
        \App\Admin\CleanUp::class,
        \App\Admin\Acf::class,
        \App\Admin\MenuOrder::class,
        \App\Admin\EditorColourPalette::class,
        \App\Admin\FontSizes::class,
        \App\Admin\ACFImporterPage::class,
        \App\Admin\DuplicateBlocks::class,
    ];
}
