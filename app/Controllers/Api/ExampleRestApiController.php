<?php

namespace App\Controllers\Api;

use App\Controllers\Abstractions\HandlesRestApi;

class ExampleRestApiController extends HandlesRestApi
{
	/**
	 * The rest api endpoint.
	 *
	 * Full path will result in /wp-json/api/your-endpoint
	 * 
	 * @var string
	 */
	protected $endpoint = '/your-endpoint';

	/**
	 * The the methods that this endpoint is reachable by
	 * 
	 * @var string
	 */
	protected $methods = 'GET';

	/**
	 * Handles the incoming REST API request
	 * 
	 * @param  WP_Rest_Request
	 * @return wp_send_json()
	 */
	public function handle(\WP_Rest_Request $request)
	{
		$requestParam = $requeat->get_param('requestParam');

	    return $this->responseJson([
	    	'foo' => 'bar'
	    ]);
	}
}