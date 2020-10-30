<?php

namespace App\Support\Console\Commands;

use App\Support\Console\GeneratorCommand;

class MakeModel extends GeneratorCommand
{
    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Model';

    /**
     * The command signature.
     *
     * @var string
     */
    protected $signature = 'make:model {name : The name of model}
                                       {--force : Overwrite the model if it exists}';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Make a model';

    /**
     * Get the stub path.
     *
     * @return string
     */
    protected function getStub(): string
    {
        return __DIR__ . '/stubs/model.stub';
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
        return $rootNamespace . '\Models';
    }
}
