<?php

namespace App\Http\Middleware;

use Closure;
use App\Support\Http\Request;

/**
 * Check if a user is logged in
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param \App\Support\Http\Request $request The request object
     * @param \Closure                  $next    The next middleware to run
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (is_user_logged_in()) {
            return $next($request);
        }
        abort(403, 'Not logged in');
    }
}
