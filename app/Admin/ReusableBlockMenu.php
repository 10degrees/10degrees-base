<?php

namespace App\Admin;

/**
 * Rearrange the admin menu items
 */
class ReusableBlockMenu
{
	public $page_title = 'Reusable Blocks';

	public $menu_title = 'Reusable Blocks';

    public function __construct()
    {
		add_action( 'admin_menu', [$this, 'addMenuPage'] );
    }

    /**
     * Set the new admin menu item order
     *
     * @return  array  List of menu items in their new order (excluded items are left as they are)
     */
    public function addMenuPage()
    {
        add_menu_page( $this->page_title, $this->menu_title, 'edit_posts', 'edit.php?post_type=wp_block', '', 'dashicons-editor-table', 22 );
    }
}
