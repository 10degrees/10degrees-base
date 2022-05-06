<?php

namespace App\Support\Http;

use Closure;
use App\Support\Http\ControllerInterface;
use App\Support\Http\Request;
use App\Support\Pipeline;
use WP_REST_Request;

/**
 * Abstract AJAX controller
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
abstract class RestController implements ControllerInterface
{
    /**
     * The REST route namespace
     *
     * @var string
     */
    protected $namespace = 'api';

    /**
     * The REST route
     *
     * @var string
     */
    protected $url = '';

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
    protected $middleware = [];

    /**
     * Add the controller actions
     */
    public function __construct()
    {
        add_action('rest_api_init', [$this, 'register']);
    }

    /**
     * Register the controller callback
     *
     * @return mixed
     */
    public function register()
    {
        register_rest_route(
            $this->namespace,
            $this->parseUrl($this->url),
            [
                'methods'  => $this->method,
                'callback' => [$this, 'resolveClosure'],
                'permission_callback' => '__return_true'
            ]
        );
    }

    /**
     * Parse the url into a WordPress readable format
     *
     * @param string $url The URL to parse
     *
     * @return string
     */
    public function parseUrl(string $url): string
    {
        return preg_replace('@\/\{([\w]+?)(\?)?\}@', '\/?(?P<$1>[a-zA-Z0-9-]+)$2', $url);
    }

    /**
     * Resolve the callback closure
     *
     * @param \WP_REST_Request $wpRequest The WordPress request object
     *
     * @return \Closure
     */
    public function resolveClosure(WP_REST_Request $wpRequest)
    {
        $request = Request::capture()->merge($wpRequest->get_url_params());

        return (new Pipeline())
            ->send($request)
            ->through($this->middleware)
            ->then(function ($request) {
                die($this->handle($request));
            });
    }

    /**
     * Handle the request
     *
     * @param App\Support\Http\Request $request The request object
     *
     * @return mixed
     */
    abstract public function handle(Request $request);
}
