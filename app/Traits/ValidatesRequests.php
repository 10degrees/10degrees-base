<?php

namespace App\Traits;

use App\Services\Validator;

/**
 * A trait for objects that validate requests
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
trait ValidatesRequests
{
    /**
     * $validator->fails()
     * $validator->passes()
     * $validator->errors()
     * $validator->errors()->first('email')
     * $validator->errors()->get('email')
     */

    /**
     * Returns an instance of validator. Available methods from the
     * returned result. For full list inspect the class.
     *
     * @param array $data     Data to validate
     * @param array $rules    Rules to validate
     * @param array $messages Validation messages
     *
     * @return void
     */
    public function validate($data = [], $rules = [], $messages = [])
    {
        return (new Validator())->make($data, $rules, $messages);
    }
}
