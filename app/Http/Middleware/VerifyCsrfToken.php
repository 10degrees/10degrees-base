<?php

namespace App\Http\Middleware;

use Closure;
use App\Support\Http\Request;

class VerifyCsrfToken
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
        if ($this->isReading($request) || $this->tokensMatch($request)) {
            return $next($request);
        }
        abort(403, 'CSRF token mismatch.');
    }

    /**
     * Determine if the HTTP request uses a ‘read’ verb.
     *
     * @param \App\Support\Http\Request $request The request object
     *
     * @return boolean
     */
    protected function isReading(Request $request): bool
    {
        return in_array($request->method(), ['HEAD', 'GET', 'OPTIONS']);
    }

    /**
     * Determine if the session and input CSRF tokens match.
     *
     * @param \App\Support\Http\Request $request The request object
     *
     * @return bool
     */
    protected function tokensMatch(Request $request): bool
    {
        return (bool) wp_verify_nonce($this->getTokenFromRequest($request), '_token');
    }

    /**
     * Get the CSRF token from the request.
     *
     * @param \App\Support\Http\Request $request The request object
     *
     * @return string
     */
    protected function getTokenFromRequest(Request $request): string
    {
        return $request->input('_token') ?: $request->header('X-CSRF-TOKEN');
    }
}
