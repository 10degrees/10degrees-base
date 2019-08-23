<?php

namespace App\Controllers\Abstractions;

use App\Services\Request;
use App\Traits\GivesResponses;
use App\Traits\RedirectsUsers;
use App\Traits\ValidatesRequests;

abstract class HandlesAjax
{
	use RedirectsUsers, GivesResponses, ValidatesRequests;

	/**
	 * The action passed from the ajax call
	 * 
	 * @var string|false
	 */
	protected $action = false;

	/**
	 * Should we validate the nonce? Override this and set it to false in your extending class if not.
	 * 
	 * @var string|false
	 */
	protected $validateNonce = true;

	/**	
	 * Register the ajax actions if the extending class provides the action property
	 */
	public function __construct()
	{
		if ($this->action) {
			add_action( 'wp_ajax_' . $this->action, [$this, 'setupHandler']);
			add_action( 'wp_ajax_nopriv_' . $this->action, [$this, 'setupHandler']);
		}
	}

	/**
	 * Put the posted data into a Request object and pass to controller
	 * 
	 * @return $this->handle()
	 */
	public function setupHandler()
	{
		$request = new Request;

		if (!$this->validateNonce($request)) {
			return $this->responseJson(['message' => 'Failed Nonce Check'], 422);
		}

		return $this->handle($request);
	}

	/**
	 * Validate the nonce for all post requests to check 
	 * whether it should be passed to the handler.
	 * 
	 * @param  App\Services\Request $request
	 * @return bool
	 */
	private function validateNonce($request)
	{
		if (!$this->validateNonce) {
			return true;
		}

		if (!count($request->post())) {
			return true;
		}

		return wp_verify_nonce( $request->post($this->action . '_nonce'), $this->action . '_nonce' );
	}
}