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

    public function create_admin_page()
    {
        $notice = '';
        $groupKey = $_POST['group_key'] ? $_POST['group_key'] : '';

        if ($groupKey) {
            $group = acf_get_local_field_group($groupKey);

            $fields = acf_get_local_fields($group['key']);

            $group['fields'] = $fields;

            acf_import_field_group($group);

            $notice = "Field group imported.";
        } else {
            $notice = '';
        }
    
        
        ?> 
        <div class="wrap">
            <h1>ACF Field Group Importer</h1>
            <form method="post" action="tools.php?page=<?php echo $this->pageName?>">
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"><?php _e( 'ACF Group Key' ); ?></th>
                        <td>
                            <input type="text" name="group_key" id="group_key" value="<?php echo $groupKey; ?>">
                        </td>
                    </tr>
                    <tr valign="top">
                        <td>
                            <button class="acf-convert-button">Convert</button>
                        </td>
                    </tr>
                    <tr valign="top">
                        <td>
                            <p><?php echo $notice; ?></p>
                        </td>
                    </tr>   
                </table>
            </form>
        </div>
    <?php }
}
