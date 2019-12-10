<?php

namespace App\Providers;

use App\Inc\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * List the admin specific classes that need to be booted on every request
     *
     * @var array
     */
    protected $classes = [
        '\App\Admin\Login',
        '\App\Admin\DashboardBranding',
        '\App\Admin\CleanUp',
        '\App\Admin\Acf',
        '\App\Admin\MenuOrder',
        '\App\Admin\EditorColourPalette',
        '\App\Admin\FontSizes'
    ];
}