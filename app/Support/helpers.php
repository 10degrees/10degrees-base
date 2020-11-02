<?php

if (!function_exists('abort')) {
    /**
     * Abort the request.
     *
     * @param int    $code    The status code to abort with
     * @param string $message The message to abort with
     *
     * @return void
     */
    function abort(int $code, string $message = ''): void
    {
        die(status_header($code, $message));
    }
}
