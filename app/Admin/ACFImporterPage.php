<?php

namespace App\Admin;

/**
 * ACFImporterPage
 *
 * Add a page to import ACF fields based off their group key
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class ACFImporterPage
{
    public $pageName = 'acf-importer';

    /**
     * Constructor
     */
    public function __construct()
    {
        add_action('admin_menu', [$this, 'addPage']);
    }

    /**
     * Add the page to the WordPress admin area under "Tools"
     *
     * @return  void
     */
    public function addPage()
    {
        add_submenu_page(
            "tools.php",
            "ACF Field Group Importer",
            "ACF Field Group Importer",
            'manage_options',
            $this->pageName,
            array($this, 'create_admin_page')
        );
    }

    /**
     * Import an ACF field Group
     *
     * @param   string  $key  An ACF field group key
     *
     * @return  string        A success or error message
     */
    public function importFieldGroup($key)
    {
        if (!$key) { // No key provided
            return "Please enter an ACF Group key.";
        }

        $group = acf_get_local_field_group($key);

        if (!acf_get_field_group($key)) { // Field group doesn't exist
            return "Field group doesn't exist.";
        }

        $fields = acf_get_local_fields($group['key']);
    
        $group['fields'] = $fields;
    
        acf_import_field_group($group);

        return "Field group imported.";
    }

    /**
     * Create the page
     *
     * @return  void  
     */
    public function create_admin_page()
    {
        $notice = $this->importFieldGroup($_POST['group_key']);

        ?> 
        <div class="wrap">
            <h1>ACF Field Group Importer</h1>
            <div id="col-left">
                <div class="col-wrap">
                    <form method="post" action="tools.php?page=<?php echo $this->pageName?>">
                        <div class="form-wrap">
                            <div class="form-field">
                                <label for="group_key">ACF Group Key</label>
                                <input type="text" name="group_key" id="group_key" value="<?php echo $groupKey; ?>">
                            </div>
                            <p class="submit">
                                <button class="button button-primary">Convert</button>
                            </p>
                            <p><?php echo $notice; ?></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php 
    }
}
