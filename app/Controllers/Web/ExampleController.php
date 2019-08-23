<?php

namespace App\Controllers\Web;

use App\Controllers\Abstractions\HandlesAjax;

class ExampleController extends HandlesAjax
{
	/**
	 * The action specified by the ajax call
	 * 
	 * @var string
	 */
	protected $action = 'td_example_ajax_action';

	/**
	 * Handle the ajax call to filter the Indeed job feed
	 * 
	 * @param App\Request $request
	 * @return wp_send_json()
	 */
	public function handle($request) 
	{
		$post_parameter = $request->get('some_post_parameter');

		// Perform some logic here

	    return wp_send_json( td_view('partials/...', [
	    	'post_parameter' => $post_parameter
	    ]) );
	}
}