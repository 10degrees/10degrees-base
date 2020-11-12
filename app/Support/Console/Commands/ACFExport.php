<?php

namespace App\Support\Console\Commands;

use App\Support\Console\GeneratorCommand;

/**
 * Create a wp-cli command
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class ACFExport extends GeneratorCommand
{
    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'ACFFieldGroup';

    /**
     * The command signature.
     *
     * @var string
     */
    protected $signature = 'acf:export {key : The field group\'s key}
                                        {name : The field group class}';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Export an ACF Field Group into PHP';

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

        if(!class_exists('ACF')){
            $this->error('ACF isn\'t installed.');
        }

        $fieldGroupKey = $this->argument('key');

        $exportedFieldGroup = $this->getExportedFieldGroup($fieldGroupKey);

        if(!$exportedFieldGroup){
            $this->error('Couldn\'t find a field group with that key.');
        }

        return str_replace(
            ['{{ fields }}'],
            [var_export($exportedFieldGroup, true)],
            $stub
        );
    }

    /**
     * Get the exported field group for the given key
     *
     * @param   string  $key  ACF Field Group key
     *
     * @return  array|false        Exported Field Group
     */
    private function getExportedFieldGroup($key)
    {
        $fieldGroup = acf_get_field_group($key);

        if(!$fieldGroup){
            return false;
        }

        $fieldGroup['fields'] = acf_get_fields($fieldGroup);

        $fieldGroup = acf_prepare_field_group_for_export($fieldGroup);

        return $fieldGroup;
    }

    /**
     * Get the stub path.
     *
     * @return string
     */
    protected function getStub(): string
    {
        return __DIR__ . '/stubs/acffield.stub';
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
        return $rootNamespace . '\ACF_Fields';
    }
}