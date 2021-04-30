<?php

namespace App\Support\Console\Commands;

use App\Support\Console\GeneratorCommand;

class MakePartial extends GeneratorCommand
{
    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Partial';

    /**
     * The command signature.
     *
     * @var string
     */
    protected $signature = 'make:partial {name : The block partial name}
                                              {--block : Is this a block partial?}
                                              {--force : Overwrite the block partial if it exists}';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Make a partial';

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

        return str_replace('{{ name }}', strtolower($this->argument('name')), $stub);
    }

    /**
     * Get the stub path.
     *
     * @return string
     */
    protected function getStub(): string
    {
        if ($this->option('block')) {
            return __DIR__ . '/stubs/partial.block.stub';
        }
        return __DIR__ . '/stubs/partial.stub';
    }

    /**
     * Get the destination class path.
     *
     * @param string $name The filename
     *
     * @return string
     */
    protected function getPath(string $name): string
    {
        if ($this->option('block')) {
            return get_template_directory() . '/partials/blocks/' . strtolower($this->argument('name')) . '.php';
        }
        return get_template_directory() . '/partials/' . strtolower($this->argument('name')) . '.php';
    }
}
