<?php

namespace App\Support\Console\Commands;

use App\Support\Console\GeneratorCommand;

class MakeCommand extends GeneratorCommand
{
    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Command';

    /**
     * The command signature.
     *
     * @var string
     */
    protected $signature = 'make:command {name : The command class}
                                         {--command=command:name : The command}
                                         {--force : Overwrite the command if it exists}';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Make a command';

    /**
     * Replace the class name for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return string
     */
    protected function replaceClass($stub, $name)
    {
        $stub = parent::replaceClass($stub, $name);

        return str_replace('{{ command }}', $this->option('command'), $stub);
    }

    /**
     * Get the stub path.
     *
     * @return string
     */
    protected function getStub(): string
    {
        return __DIR__ . '/stubs/command.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Console\Commands';
    }
}
