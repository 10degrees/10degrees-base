<?php

namespace App\Traits;

use App\Services\Validator;

trait ValidatesRequests
{
	/**
	 *
	 * Returns an instance of validator. Available methods from the returned result. For full list inspect the class.
	 *
	 * $validator->fails()
	 * $validator->passes()
	 * $validator->errors()
	 * $validator->errors()->first('email')
	 * $validator->errors()->get('email')
	 */
	public function validate($data = [], $rules = [], $messages = [])
	{
		return (new Validator())->make($data, $rules, $messages);
	}
}