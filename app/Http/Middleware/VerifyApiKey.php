<?php

namespace App\Http\Middleware;

use Closure;
use App\Support\Http\Request;

/**
 * Verify an API key
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class VerifyApiKey
{
    protected $key = 'api-key';

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
        if ($request->input('key') === $this->key) {
            return $next($request);
        }
        abort(403, 'Invalid api key');
    }
}
