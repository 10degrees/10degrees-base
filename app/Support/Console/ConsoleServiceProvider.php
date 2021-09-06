<?php

namespace App\Support\Console;

use ReflectionClass;
use App\Support\Console\Command;
use App\Support\ServiceProvider;
use Symfony\Component\Finder\Finder;

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
        \App\Support\Console\Commands\MakeBlock::class,
        \App\Support\Console\Commands\MakeCommand::class,
        \App\Support\Console\Commands\MakeCpt::class,
        \App\Support\Console\Commands\MakeController::class,
        \App\Support\Console\Commands\MakeField::class,
        \App\Support\Console\Commands\MakeJob::class,
        \App\Support\Console\Commands\MakeListener::class,
        \App\Support\Console\Commands\MakeMail::class,
        \App\Support\Console\Commands\MakeMiddleware::class,
        \App\Support\Console\Commands\MakeModel::class,
        \App\Support\Console\Commands\MakePartial::class,
        \App\Support\Console\Commands\MakeProvider::class,
        \App\Support\Console\Commands\MakeShortcode::class,
        \App\Support\Console\Commands\MakeSubscriber::class,
        \App\Support\Console\Commands\SetEnvironment::class,
    ];

    /**
     * Only boot the services if running in console
     */
    public function __construct()
    {
        /**
         * If not running the console then bail.
         */
        if (!class_exists('WP_CLI')) {
            return;
        }

        /**
         * Autoload all commands in the Commands directory. This means commands
         * are instantly available to the console.
         */
        $this->load(get_template_directory() . '/app/Console/Commands');

        /**
         * Call the parent constructor to continue booting the provider.
         */
        parent::__construct();
    }

    /**
     * Load commands from the console directory
     *
     * @param string $path The directory paths to load
     *
     * @return void
     */
    protected function load(string $path): void
    {
        if (!is_dir($path)) {
            return;
        }

        foreach ((new Finder)->in($path)->files() as $command) {
            $command = 'App\\Console\\Commands\\' . str_replace(
                ['/', '.php'],
                ['\\', ''],
                $command->getRelativePathname()
            );

            if (is_subclass_of($command, Command::class) && !(new ReflectionClass($command))->isAbstract()) {
                new $command;
            }
        }
    }
}
