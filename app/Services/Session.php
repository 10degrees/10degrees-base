<?php

namespace App\Services;

use App\Inc\Singleton;

/**
 *
 * Handles storing data with the Help of plugin WP Session Manager
 *
 * @see WP Session Manager https://wordpress.org/plugins/wp-session-manager/
 * 
 */

class Session extends Singleton
{
	public function set($key, $data)
	{
		$_SESSION[$key] = $data;

		return $this->get();
	}

	public function merge($key, $value)
	{
		$merged = array_merge($_SESSION[$key], $value);

		$_SESSION[$key] = array_unique($merged);
	}

	public function get($key = null)
	{
		if (is_null($key)) 
		{
			return $_SESSION;
		}

		if (array_key_exists($key, $_SESSION)) 
		{
			return $_SESSION[$key];
		}

		return [];
	}

	public function has($key)
	{
		return isset($_SESSION[$key]);
	}

	public function all()
	{
		return $_SESSION;
	}

	public function delete($key)
	{
		unset($_SESSION[$key]);

		return;
	}

	public function flush()
	{
		$_SESSION = [];

		return;
	}

	public function flash($title, $message = null, $status = 'success')
	{
		$this->set('flash_message', [
			'title'			=> $title,
			'message'		=> $message,
			'status'		=> $status,
		]);
	}

	public function addError($key, $value)
	{
		// todo add error flash messaging
		
		$this->set('errors', [$key => $value]);
	}
}

