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
class ACFImport extends Command
{
    /**
     * The command signature.
     *
     * @var string
     */
    protected $signature = 'acf:import {key : The field group\'s key}';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Import an ACF Field Group into the UI';

    /**
     * Handle the command call.
     *
     * @return void
     */
    protected function handle(): void
    {
        $fieldGroupKey = $this->argument('key');

        $fieldGroup = $this->importFieldGroup($fieldGroupKey);

        if(!$fieldGroup){
            $this->error('No ACF Field Group exists with that key.');
        }

        $this->success('Imported ACF Field Group: ' . $fieldGroup['title']);
    }

    private function importFieldGroup($key)
    {
        $group = acf_get_local_field_group($key);

        if(!$group){
            return false;
        }

        $fields = acf_get_fields($group['key']); // Get the groups fields - recursively
        
        $group['fields'] = $fields;

        // Setting the ID tells the importer that the group already exists
        $post = acf_get_field_group_post($key);
        if ($post) {
            $group['ID'] = $post->ID;
        }
    
        $fieldGroup = acf_import_field_group($group);

        return $fieldGroup;
    }
}