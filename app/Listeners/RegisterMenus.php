<?php

namespace App\Listeners;

/**
 * Register the menus for the theme.
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class RegisterMenus
{
    /**
     * The event priority
     *
     * @var integer
     */
    public static $priority = 10;

    /**
     * Handle an event
     *
     * @return void
     */
    public function handle(): void
    {
        register_nav_menus(
            [
                'primary_navigation' => __('Main Menu', '@textdomain'),
                'footer_navigation'  => __('Footer Menu', '@textdomain'),
            ]
        );
    }
}
