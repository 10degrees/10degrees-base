<?php

namespace App\Boot;

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
     * The menus to register with the theme
     *
     * Example:
     *
     * 'menu_location_slug' => 'Menu name'
     *
     * @var array
     *
     * @return array $menus Array of menus to register
     */
    public function menus()
    {
        return [
            'primary_navigation' => __('Main Menu', '@textdomain'),
            'footer_navigation' => __('Footer Menu', '@textdomain')
        ];
    }
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->register();
    }

    /**
     * Registers nav menus
     *
     * @return void
     */
    public function register()
    {
        register_nav_menus($this->menus());
    }
}
