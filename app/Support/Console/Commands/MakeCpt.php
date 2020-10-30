<?php

namespace App\Support\Console\Commands;

use App\Support\Console\GeneratorCommand;

class MakeCpt extends GeneratorCommand
{
    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Custom post type';

    /**
     * The command signature.
     *
     * @var string
     */
    protected $signature = 'make:cpt {name : The name of custom post type}
                                     {--model : Create a model for the custom post type}
                                     {--force : Overwrite the cpt if it exists}';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Make a custom post type';

    /**
     * Handle further calls
     *
     * @return void
     */
    protected function handle(): void
    {
        parent::handle();

        $model = $this->option('model') ?? $this->confirm('Create a model?');

        if ($model) {
            $this->call("make:model {$this->argument('name')}");
        }
    }

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
            ['{{ posttype }}', '{{ plural }}', '{{ singular }}'],
            [
                strtolower($this->argument('name')),
                $this->ask('What is the plural name?'),
                $this->ask('What is the singular name?'),
            ],
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
        return __DIR__ . '/stubs/cpt.stub';
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
        return $rootNamespace . '\Cpt';
    }
}
