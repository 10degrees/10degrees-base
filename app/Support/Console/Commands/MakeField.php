<?php

namespace App\Support\Console\Commands;

use App\Support\Console\GeneratorCommand;

class MakeField extends GeneratorCommand
{
    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Field';

    /**
     * The command signature.
     *
     * @var string
     */
    protected $signature = 'make:field {name : The field name}
                                       {--force : Overwrite the field if it exists}';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Make an ACF field group';

    /**
     * Get the stub path.
     *
     * @return string
     */
    protected function getStub(): string
    {
        return __DIR__ . '/stubs/field.stub';
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
        return $rootNamespace . '\Acf\Fields';
    }
}
