<?php

namespace App\Admin;

/**
 * Rearrange the admin menu items
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class MenuOrder
{
    /**
     * Constructor
     */
    public function __construct()
    {
        add_filter('custom_menu_order', '__return_true');
        add_filter('menu_order', [$this, 'moveMenuItems']);
    }

    /**
     * Set the new admin menu item order
     *
     * @return array List of menu items in their new order
     */
    public function moveMenuItems()
    {
        return array(
            'index.php',
            'separator1',
            'wpengine-common',
            'edit.php',
            'edit.php?post_type=page'
        );
    }
}
