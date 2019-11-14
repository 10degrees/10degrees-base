<?php

namespace App\Providers;

use App\Inc\ServiceProvider;

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
        // '\App\ACF_Fields\ProtectContent',
        // '\App\ACF_Fields\PageBuilder',
        // '\App\ACF_Fields\LoginSettings'
    ];
}
