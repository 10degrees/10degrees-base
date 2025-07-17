<?php

namespace App\Listeners\Admin;

/**
 * Add a menu page for reuseable blocks.
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class RegisterReusableBlockMenu
{
    /**
     * The event priority
     *
     * @var integer
     */
    public static $priority = 10;

    /**
     * The name used on the edit page.
     *
     * @var string
     */
    public $pageTitle = 'Reusable Blocks';

    /**
     * The name used in the menu.
     *
     * @var string
     */
    public $menuTitle = 'Reusable Blocks';

    /**
     * The dashicon used in the menu.
     *
     * @var string
     */
    public $icon = 'dashicons-controls-repeat';

    /**
     * Add the reuseable blocks page to the menu.
     *
     * @return void
     */
    public function handle(): void
    {
        add_menu_page(
            $this->pageTitle,
            $this->menuTitle,
            'edit_posts',
            'edit.php?post_type=wp_block',
            '',
            $this->icon,
            22
        );
    }
}
