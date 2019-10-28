<?php

namespace App\Admin;

/**
 *
 * Login page customisations
 *
 */
class Login
{
	public function __construct()
	{
		add_action( 'login_head', [$this, 'login_css'] );
		add_filter( 'login_headerurl', [$this, 'login_logo_url'] );
		add_filter( 'login_headertext', [$this, 'login_logo_url_title'] );
		add_action( 'login_footer', [$this, 'login_checked_remember_me'] );
	}

	/**
	 *
	 * Login screen
	 *
	 * Add CSS in the file referenced below, then create the appropriate logo in assets/img/logo-login.png
	 *
	 */
	public function login_css()
	{
	    echo '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . td_asset_path('/css/wp-login.css') . '" />';
	}

	/**
	 *
	 * Change login link. Note home_url not site_url
	 *
	 */
	public function login_logo_url()
	{
	    return home_url();
	}

	/**
	 *
	 * Logo title login page
	 *
	 */
	public function login_logo_url_title()
	{
	    return get_bloginfo( 'name' );
	}

	/**
	 *
	 * Make sure Remember Me is checked = fewer password resets!
	 *
	 */
	public function login_checked_remember_me()
	{
        echo "<script>document.getElementById('rememberme').checked = true;</script>";
	}

}