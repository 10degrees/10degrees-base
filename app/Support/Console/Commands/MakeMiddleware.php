<?php

namespace App\Support\Console\Commands;

use App\Support\Console\GeneratorCommand;

class MakeMiddleware extends GeneratorCommand
{
    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Middleware';

    /**
     * The command signature.
     *
     * @var string
     */
    protected $signature = 'make:middleware {name : The middleware class}
                                            {--force : Overwrite the middleware if it exists}';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Make a middleware class';

    /**
     * Get the stub path.
     *
     * @return string
     */
    protected function getStub(): string
    {
        return __DIR__ . '/stubs/middleware.stub';
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
        return $rootNamespace . '\Http\Middleware';
    }
}
