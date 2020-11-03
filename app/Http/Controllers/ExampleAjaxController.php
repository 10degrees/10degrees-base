<?php

namespace App\Http\Controllers;

use App\Support\Http\AjaxController as Controller;
use App\Support\Http\Request;

/**
 * An example AJAX controller
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class ExampleAjaxController extends Controller
{
    /**
     * The AJAX action
     *
     * @var string
     */
    protected $action = 'example_action';

    /**
     * The route middleware
     *
     * @var array
     */
    protected $middleware = [
        \App\Http\Middleware\VerifyCsrfToken::class,
        \App\Http\Middleware\Authenticate::class,
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
