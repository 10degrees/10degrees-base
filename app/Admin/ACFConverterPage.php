<?php

namespace App\Admin;

/**
 * ACF
 *
 * Add custom ACF functions
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class ACFConverterPage
{
    /**
     * Constructor
     */
    public function __construct()
    {
        add_action('admin_menu', [$this, 'addPage']);
    }

    public function addPage(){
        add_submenu_page(
            "tools.php",
            "ACF Converter",
            "ACF Converter",
            'manage_options',
            'acf-converter',
            array($this, 'create_admin_page')
        );
    }

    public function create_admin_page() {
        if ($_POST['acf-php']) {
            $group = acf_get_local_field_group($_POST['acf-php']);

            $fields = acf_get_local_fields($group['key']);

            $group['fields'] = $fields;

            acf_import_field_group($group);
        }
    
        
        ?> 
        <div class="wrap">
            <h1>ACF Converter</h1>
            <form method="post" action="tools.php?page=acf-converter">
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"><?php _e( 'ACF Group Key' ); ?></th>
                        <td>
                            <input type="text" name="acf-php" id="acf-php">
                        </td>
                    </tr>
                    <tr valign="top">
                        <td>
                            <button class="acf-convert-button">Convert</button>
                        </td>
                    </tr>   
                </table>
            </form>
        </div>
    <?php }
}
