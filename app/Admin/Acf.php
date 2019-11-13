<?php

namespace App\Admin;

class Acf
{
	/**
	 * Define the email domains that are allowed access to the acf settings in the dashboard
	 * 
	 * @var array
	 */
	private $allowedDomains = [
		'10degrees.uk'
	];

	public function __construct()
	{
		add_action( 'admin_init', [$this, 'hideAcfFromMenu'] );

		add_action('after_switch_theme', [$this, 'setLicenseKey']);

		$this->defineOptionsPages();
	}

	public function defineOptionsPages()
	{
		if( function_exists('acf_add_options_page') ){
			acf_add_options_page( array(
                'title' => 'Site Settings',
                'capability' => 'manage_options',
                'position' => '59.1',
                'icon_url' => 'dashicons-admin-settings'
            ));
		}
	}

	public function hideAcfFromMenu() 
	{
	    $current_user = wp_get_current_user();
	    
	    if ($this->notAllowedToSeeAcf($current_user)) 
	    {
	        remove_menu_page( 'edit.php?post_type=acf-field-group' );
	    }
	}

	protected function notAllowedToSeeAcf($user)
	{
		$domain = $this->getDomainFromEmail($user->user_email);

	    return ! in_array( $domain, $this->allowedDomains );
	}

	protected function getDomainFromEmail($email)
	{
		return substr( strrchr( $email, "@" ), 1 );
	}

	/**
	 * 
	 * Set ACF 5 license key on theme activation
	 * 
	 */
	public function setLicenseKey() 
	{
		if ( !get_option('acf_pro_license') && defined('ACF_5_KEY') )
		{
			$save = array(
				'key'	=> ACF_5_KEY,
				'url'	=> home_url()
			);

			$save = maybe_serialize($save);
			
			$save = base64_encode($save);

			update_option('acf_pro_license', $save);
		}
	}
}