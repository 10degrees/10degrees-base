<?php

namespace App\Traits;

trait RedirectsUsers
{
	/**
	 * Perform a safe redirect
	 * 
	 * @param  string  $url
	 * @param  integer $status
	 * @return void
	 */
	public function redirect($url, $status = 302)
	{
		wp_safe_redirect( $url, $status );
		exit;
	}

	/**
	 * Perform an external redirect
	 * 
	 * @param  string  $url
	 * @param  integer $status
	 * @return void
	 */
	public function redirectExternal($url, $status = 302)
	{
		wp_redirect( $url, $status );
		exit;
	}
}