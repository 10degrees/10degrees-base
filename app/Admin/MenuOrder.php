<?php

namespace App\Admin;

class MenuOrder
{
    public function __construct()
    {
        add_filter('custom_menu_order', '__return_true');
        add_filter('menu_order', [$this, 'moveMenuItems']);
    }

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
