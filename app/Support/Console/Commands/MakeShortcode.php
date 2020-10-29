<?php

namespace App\Support\Console\Commands;

use App\Support\Console\GeneratorCommand;

class MakeShortcode extends GeneratorCommand
{
    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Shortcode';

    /**
     * The command signature.
     *
     * @var string
     */
    protected $signature = 'make:shortcode {name : The shortcode class}
                                           {--shortcode=shortcode:name : The shortcode}
                                           {--force : Overwrite the shortcode if it exists}';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Make a shortcode';

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

        return str_replace('{{ shortcode }}', $this->option('shortcode'), $stub);
    }

    /**
     * Get the stub path.
     *
     * @return string
     */
    protected function getStub(): string
    {
        return __DIR__ . '/stubs/shortcode.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Shortcodes';
    }
}
