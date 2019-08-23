<?php

namespace App\Shortcodes;

abstract class Shortcode
{
	protected $defaultAttributes = false;

	public function __construct()
	{
		add_shortcode( $this->shortcode, [$this, 'setVariables'] );
	}

	public function setVariables($attributes)
	{
		if ($attributes == '') {
			$attributes = [];
		}
		
		if ($this->defaultAttributes) {
			$attributes = shortcode_atts( $this->defaultAttributes, $attributes );
		}

		foreach ($attributes as $key => $value) 
		{
			$this->{$key} = $value;
		}

		return $this->handle();
	}
}