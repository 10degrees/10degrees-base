<?php

namespace App\Services;

class Request 
{
	/**
	 * Post request
	 * 
	 * @var array
	 */
	private $get;

	/**
	 * Get request
	 * 
	 * @var array
	 */
	private $post;

	public function __construct()
	{
		$this->post = $_POST;

		$this->get = $_GET;
	}

	/**
	 * $_POST request wrapper
	 * 
	 * @param  string $key
	 * @return mixed
	 */
	public function get($key = null)
	{
		if (is_null($key)) 
		{
			return $this->get;
		}

		if (isset($this->get[$key])) 
		{
			return $this->getValue( $this->get[$key] );
		}

		return null;
	}

	/**
	 * $_GET request wrapper
	 * 
	 * @param  string $key
	 * @return mixed
	 */
	public function post($key = null)
	{
		if (is_null($key)) 
		{
			return $this->post;
		}

		if (isset($this->post[$key])) 
		{
			return $this->getValue( $this->post[$key] );
		}

		return null;
	}

	protected function getValue($value)
	{
		if ($this->hasValue($value)) 
		{
			return $value;
		}

		return null;
	}

	protected function hasValue($value)
	{
		return isset($value) && !empty($value) && $value != '';
	}
}