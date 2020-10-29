<?php

namespace App\Providers;

use App\Support\Console\Console;
use App\Support\ServiceProvider;

/**
 * Registers console commands
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class ConsoleServiceProvider extends ServiceProvider
{
    /**
     * The classes to autoload
     */
    protected $classes = [
        \App\Support\Console\Commands\MakeCommand::class,
        \App\Support\Console\Commands\MakeCpt::class,
        \App\Support\Console\Commands\MakeController::class,
        \App\Support\Console\Commands\MakeJob::class,
        \App\Support\Console\Commands\MakeModel::class,
        \App\Support\Console\Commands\MakeProvider::class,
        \App\Support\Console\Commands\MakeShortcode::class,
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

        parent::__construct();
    }
}
