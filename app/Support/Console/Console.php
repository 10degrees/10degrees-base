<?php

namespace App\Support\Console;

use Closure;
use ReflectionClass;
use App\Support\Console\Commands\ClosureCommand;
use Symfony\Component\Finder\Finder;

class Console
{
    /**
     * Register a closure command.
     *
     * @param  string   $signature The command signature
     * @param  \Closure $callback  The callback to run
     *
     * @return mixed
     */
    public static function command(string $signature, Closure $callback)
    {
        return new ClosureCommand($signature, $callback);
    }

    /**
     * Load commands from the console directory
     *
     * @param string|array $paths The directory paths to load
     *
     * @return void
     */
    public static function load($paths): void
    {
        $paths = is_array($paths) ? $paths : [$paths];

        $paths = array_filter($paths, function ($path) {
            return is_dir($path);
        });

        if (empty($paths)) {
            return;
        }

        foreach ((new Finder)->in($paths)->files() as $command) {

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
