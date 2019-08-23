<?php

namespace App\Admin;

class DashboardBranding
{
	public function __construct()
	{
		add_action( 'admin_init', [$this, 'defineColorScheme'], 10 );
		add_action( 'user_register', [$this, 'setColorScheme'] );
	}

	/**
	 *
	 * Set wp-admin colour scheme
	 * 
	 */
	public function defineColorScheme() 
	{
		wp_admin_css_color(
		    '10degrees',
		    __( '10&deg;' ),
		    get_template_directory_uri() . '/assets/css/wp-admin.css',
		    array( '#07273E', '#14568A', '#6e949c', '#bb3131' ),
		    array( 'base' => '#e5f8ff', 'focus' => '#fff', 'current' => '#fff' )
		);
	}

	/**
	 *
	 * Set default colour scheme to 10degrees for new users.
	 * http://www.hongkiat.com/blog/wordpress-admin-color-scheme/
	 * 
	 */
	public function setColorScheme( $user_id ) 
	{
		$args = array(
		    'ID' => $user_id,
		    'admin_color' => '10degrees',
		);
	
		wp_update_user( $args );
	}
}