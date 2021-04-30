<?php

namespace App\Support\Console\Commands;

use App\Support\Console\GeneratorCommand;

class MakeController extends GeneratorCommand
{
    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Controller';

    /**
     * The command signature.
     *
     * @var string
     */
    protected $signature = 'make:controller {name : The controller class}
                                            {--rest : Is a REST controller}
                                            {--action=action : The AJAX action}
                                            {--url=url : The REST url}
                                            {--force : Overwrite the controller if it exists}';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Make a controller';

    /**
     * Replace the class name for the given stub.
     *
     * @param string $stub The stub contents
     * @param string $name The classname to replace
     *
     * @return string
     */
    protected function replaceClass(string $stub, string $name): string
    {
        $stub = parent::replaceClass($stub, $name);

        return str_replace(
            ['{{ action }}', '{{ url }}'],
            [$this->option('action'), $this->option('url')],
            $stub
        );
    }

    /**
     * Get the stub path.
     *
     * @return string
     */
    protected function getStub(): string
    {
        if ($this->option('rest')) {
            return __DIR__ . '/stubs/controller.rest.stub';
        }
        return __DIR__ . '/stubs/controller.ajax.stub';
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
        return $rootNamespace . '\Http\Controllers';
    }
}
