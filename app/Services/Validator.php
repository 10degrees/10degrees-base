<?php

namespace App\Services;

use Illuminate\Validation;
use Illuminate\Translation;
use Illuminate\Filesystem\Filesystem;

/**
 *
 * For list of validation rules
 * @see https://laravel.com/docs/5.8/validation#available-validation-rules
 * 
 */
class Validator
{
    private $factory;
    
    public function __construct()
    {
        $this->factory = new Validation\Factory(
            $this->loadTranslator()
        );
    }

    protected function loadTranslator()
    {
        $filesystem = new Filesystem();

        $loader = new Translation\FileLoader(
            $filesystem, get_template_directory() . '/lang');
            $loader->addNamespace(
                'lang',
                get_template_directory() . '/lang'
            );
        
        return new Translation\Translator($loader, 'en');
    }

    public function __call($method, $args)
    {
        return call_user_func_array(
            [$this->factory, $method],
            $args
        );
    }
}