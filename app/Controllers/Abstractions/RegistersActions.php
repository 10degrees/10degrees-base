<?php

namespace App\Controllers\Abstractions;

use App\Traits\RedirectsUsers;
use App\Traits\ValidatesRequests;

abstract class RegistersActions
{
	use RedirectsUsers, ValidatesRequests;

	/**
	 * The action passed from the ajax call
	 * 
	 * @var string|false
	 */
	protected $action = false;

	protected $priority = 10;

	protected $args = 1;

	/**	
	 * Register the ajax actions if the extending class provides the action property
	 */
	public function __construct()
	{
		if ($this->action) {
			add_action($this->action, [$this, 'handle'], $this->priority, $this->args);
		}
	}
}
