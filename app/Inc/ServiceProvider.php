<?php

namespace App\Inc;

abstract class ServiceProvider
{
	public function __construct()
	{
		$this->call();
	}

	public function call()
	{
		foreach ($this->classes as $class) 
		{
			new $class;
		}
	}
}