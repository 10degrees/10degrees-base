<?php

namespace App\Support\Console\Commands;

use App\Support\Console\GeneratorCommand;

class MakeBlock extends GeneratorCommand
{
    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Block';

    /**
     * The command signature.
     *
     * @var string
     */
    protected $signature = 'make:block {name : The block name}
                                       {--force : Overwrite the block if it exists}';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Make a block';

    /**
     * Handle further calls
     *
     * @return void
     */
    protected function handle(): void
    {
        parent::handle();

        $this->call("make:partial {$this->argument('name')} --block");
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
            ['{{ name }}', '{{ title }}', '{{ icon }}'],
            [
                strtolower($this->argument('name')),
                $this->ask('What is the title?'),
                $this->ask('What is the icon? (without "dashicon-"'),
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
        return __DIR__ . '/stubs/block.stub';
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
        return $rootNamespace . '\Blocks';
    }
}
