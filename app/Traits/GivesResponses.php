<?php

namespace App\Traits;

trait GivesResponses
{
	/**
	 * Send a JSON Response
	 * @param  mixed $response
	 * @return wp_send_json
	 */
	protected function responseJson($response, $code = '200')
	{
		return wp_send_json($response, $code);
	}
}