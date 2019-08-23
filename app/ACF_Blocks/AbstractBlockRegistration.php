<?php

namespace App\ACF_Blocks;

abstract class AbstractBlockRegistration
{
	public function __construct()
	{
		if( function_exists('acf_register_block_type') )
		{
			$this->register();
		}
	}
}