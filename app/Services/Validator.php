<?php

namespace App\Services;

use Illuminate\Validation;
use Illuminate\Translation;
use Illuminate\Filesystem\Filesystem;

/**
 * Provides validation
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @see      For list of validation rules see https://laravel.com/docs/5.8/validation#available-validation-rules
 * @since    2.0.0
 */
class Validator
{
    private $factory;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->factory = new Validation\Factory(
            $this->loadTranslator()
        );
    }

    /**
     * Loads translator
     *
     * @return Translation\Translator
     */
    protected function loadTranslator()
    {
        $filesystem = new Filesystem();

        $loader = new Translation\FileLoader(
            $filesystem,
            get_template_directory() . '/lang'
        );

        $loader->addNamespace(
            'lang',
            get_template_directory() . '/lang'
        );
        
        return new Translation\Translator($loader, 'en');
    }

    /**
     * //@TODO find out what this does
     *
     * @param [type] $method comment
     * @param [type] $args   comment
     *
     * @return void
     */
    public function __call($method, $args)
    {
        return call_user_func_array(
            [$this->factory, $method],
            $args
        );
    }
}
