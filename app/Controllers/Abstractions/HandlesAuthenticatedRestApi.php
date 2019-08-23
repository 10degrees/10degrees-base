<?php

namespace App\Controllers\Abstractions;

use App\Controllers\Abstractions\HandlesRestApi;

class HandlesAuthenticatedRestApi extends HandlesRestApi
{
	/**
	 * Override the callback property to check for authentincation
	 * 
	 * @var string
	 */
	protected $callback = 'checkAuthentication';

	/**
	 * An api key to stop this url beiong easily abused.
	 * 
	 * @var string
	 */
	protected $key = 'set-your-api-key';

	/**
	 * Check the given key matches
	 * 
	 * @param  \WP_Rest_Request $request 
	 * @return mixed
	 */
	public function checkAuthentication(\WP_Rest_Request $request)
	{
		if ($request->get_param('key') != $this->key) {
			$this->responseJson(['message' => 'Key invalid'], 422);
		}

		return $this->handle($request);
	}
}