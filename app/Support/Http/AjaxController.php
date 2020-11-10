<?php

namespace App\Support\Http;

use App\Support\Http\ControllerInterface;
use App\Support\Http\Request;
use App\Support\Pipeline;

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
abstract class AjaxController implements ControllerInterface
{
    /**
     * The AJAX action
     *
     * @var string
     */
    protected $action = '';

    /**
     * The route guards
     *
     * @var array
     */
    protected $guards = ['auth', 'guest'];

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
        if ($this->action) {
            if (in_array('auth', $this->guards)) {
                add_action("wp_ajax_{$this->action}", [$this, 'register']);
            }
            if (in_array('guest', $this->guards)) {
                add_action("wp_ajax_nopriv_{$this->action}", [$this, 'register']);
            }
        }
    }

    /**
     * Register the controller callback
     *
     * @return mixed
     */
    public function register()
    {
        return (new Pipeline())
            ->send(Request::capture())
            ->through($this->middleware)
            ->then(
                function ($request) {
                    die($this->handle($request));
                }
            );
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
