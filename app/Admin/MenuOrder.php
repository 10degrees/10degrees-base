<?php

namespace App\Admin;

/**
 * Rearrange the admin menu items
 */
class MenuOrder
{
    public function __construct()
    {
        add_filter('custom_menu_order', '__return_true');
        add_filter('menu_order', [$this, 'moveMenuItems']);
    }

    /**
     * Set the new admin menu item order
     *
     * @return  array  List of menu items in their new order (excluded items are left as they are)
     */
    public function moveMenuItems()
    {
        return array(
            'index.php',
            'separator1',
            'edit.php',
            'edit.php?post_type=page'
        );
    }
}
