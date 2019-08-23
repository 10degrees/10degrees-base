<?php

namespace App\Boot;

/**
 *
 * Register the menus for the theme.
 * 
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
     */
    public function menus()
    {
    	return [
			'primary_navigation' => __( 'Main Menu', '@textdomain' ),
			'footer_navigation' => __( 'Footer Menu', '@textdomain' )
    	];
    }
	    
    public function __construct()
    {
        $this->register();
    }
	
    public function register() 
    {
		register_nav_menus($this->menus());
    }

}
