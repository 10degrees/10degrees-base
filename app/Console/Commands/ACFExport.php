<?php

namespace App\Console\Commands;

use App\Support\Console\Command;

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
class ACFExport extends Command
{
    /**
     * The command signature.
     *
     * @var string
     */
    protected $signature = 'acf:export {key : The field group\'s key}';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Export an ACF Field Group into PHP';

    /**
     * Handle the command call.
     *
     * @return void
     */
    protected function handle(): void
    {
        if(!class_exists('ACF')){
            $this->error('ACF isn\'t installed.');
        }

        $fieldGroupKey = $this->argument('key');

        $exportedFieldGroup = $this->getExportedFieldGroup($fieldGroupKey);

        if(!$exportedFieldGroup){
            $this->error('Couldn\'t find a field group with that key.');
        }

        $this->success('ACF Group imported.');
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
}