<?php

namespace App\Controllers\Abstractions;

use App\Controllers\Abstractions\HandlesRestApi;

//@TODO check class description
/**
 * Handle authenticated REST API requests
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
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
     * @param \WP_Rest_Request $request A request
     *
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
