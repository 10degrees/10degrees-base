<?php

namespace App\Support\Console\Commands;

use App\Support\Console\GeneratorCommand;

/**
 * Make a command
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class MakeListener extends GeneratorCommand
{
    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Listener';

    /**
     * The command signature.
     *
     * @var string
     */
    protected $signature = 'make:listener {name : The listener class}
                                          {--force : Overwrite the listener class if it exists}';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Make a listener class';

    /**
     * Get the stub path.
     *
     * @return string
     */
    protected function getStub(): string
    {
        return __DIR__ . '/stubs/listener.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace The root namespace
     *
     * @return string
     */
    protected function getDefaultNamespace(string $rootNamespace): string
    {
        return $rootNamespace . '\\Listeners';
    }
}
