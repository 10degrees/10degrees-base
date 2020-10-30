<?php

namespace App\Support\Console\Commands;

use App\Support\Console\GeneratorCommand;

class MakeProvider extends GeneratorCommand
{
    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Provider';

    /**
     * The command signature.
     *
     * @var string
     */
    protected $signature = 'make:provider {name : The provider class}
                                          {--force : Overwrite the provider if it exists}';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Make a provider';

    /**
     * Get the stub path.
     *
     * @return string
     */
    protected function getStub(): string
    {
        return __DIR__ . '/stubs/provider.stub';
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
        return $rootNamespace . '\Providers';
    }
}
