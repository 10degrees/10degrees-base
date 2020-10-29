<?php

namespace App\Providers;

use App\Support\Console\Console;
use App\Support\ServiceProvider;

class ConsoleServiceProvider extends ServiceProvider
{
    /**
     * The classes to autoload
     */
    protected $classes = [
        \App\Support\Console\Commands\MakeCommand::class,
        \App\Support\Console\Commands\MakeCpt::class,
        \App\Support\Console\Commands\MakeController::class,
        \App\Support\Console\Commands\MakeModel::class,
        \App\Support\Console\Commands\MakeProvider::class,
    ];

    /**
     * Only boot the services if running in console
     */
    public function __construct()
    {
        if (!class_exists('WP_CLI')) {
            return;
        }

        Console::load(get_template_directory() . '/app/Console/Commands');

        #require get_template_directory() . '/app/Console/console.php';

        parent::__construct();
    }
}
