<?php

namespace App\Support\Console;

use ReflectionClass;
use Symfony\Component\Finder\Finder;

/**
 * The console class
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class Console
{
    /**
     * Load commands from the console directory
     *
     * @param string $path The directory paths to load
     *
     * @return void
     */
    public static function load(string $path): void
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
