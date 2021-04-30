<?php

namespace App\Http\Controllers;

use App\Support\Http\Request;
use App\Support\Http\RestController as Controller;

/**
 * An example REST controller
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class ExampleRestController extends Controller
{
    /**
     * The REST route
     *
     * @var string
     */
    protected $url = 'example/{id}/url/{name?}';

    /**
     * The REST route method
     *
     * @var string
     */
    protected $method = 'GET';

    /**
     * The route middleware
     *
     * @var array
     */
    protected $middleware = [
        \App\Http\Middleware\VerifyApiKey::class,
    ];

    /**
     * Handle the request
     *
     * @param App\Support\Http\Request $request The request object
     *
     * @return mixed
     */
    public function handle(Request $request)
    {
        return $request;
    }
}
