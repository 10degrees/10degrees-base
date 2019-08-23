<?php

namespace App\Controllers\Abstractions;

use App\Traits\GivesResponses;
use App\Traits\RedirectsUsers;
use App\Traits\ValidatesRequests;

class HandlesRestApi
{
	use RedirectsUsers, GivesResponses, ValidatesRequests;
	
	/**
	 * The rest api endpoint.
	 *
	 * Full path will result in /wp-json/api/your-endpoint
	 * 
	 * @var string
	 */
	protected $endpoint = '';

	/**
	 * The the methods that this endpoint is reachable by
	 * 
	 * @var string
	 */
	protected $methods = 'GET';

	/**
	 * The callback method to call
	 * 
	 * @var string
	 */
	protected $callback = 'handle';

	/**
	 * Hook into rest api init
	 */
	public function __construct()
	{
		add_action( 'rest_api_init', [$this, 'register']);
	}

	/**
	 * Registe the rest api endpoint
	 * 
	 * @return void
	 */
	public function register()
	{
		register_rest_route( 'api', $this->endpoint, [
			'methods' => $this->getMethods(),
			'callback' => [$this, $this->callback],
		]);
	}

	/**
	 * Get the action for this endpoint. Allows for overriding with logic in the extending class.
	 * 
	 * @return string|mixed
	 */
	public function getMethods()
	{
		return $this->methods;
	}
}