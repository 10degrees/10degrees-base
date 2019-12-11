<?php

namespace App\Controllers\Api;

use App\Controllers\Abstractions\HandlesRestApi;

/**
 * Example usage of HandlesRestApi base class
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
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
     * @param WP_Rest_Request $request A REST API Request
     *
     * @return json
     */
    public function handle(\WP_Rest_Request $request)
    {
        $requestParam = $requeat->get_param('requestParam');

        return $this->responseJson(
            ['foo' => 'bar']
        );
    }
}
