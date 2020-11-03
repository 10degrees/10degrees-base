<?php

use App\Support\Http\Request;
use App\Support\Http\Response;
use App\Support\View\View;
use App\Support\Routing\URL;

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

if (!function_exists('dd')) {
    /**
     * Die and dump.
     *
     * @param mixed ...$args The arguments to dump and die
     *
     * @return void
     */
    function dd(...$args): void
    {
        die(var_dump(...$args));
    }
}

if (!function_exists('dump')) {
    /**
     * Dump.
     *
     * @param mixed ...$args The arguments to dump
     *
     * @return void
     */
    function dump(...$args): void
    {
        var_dump(...$args);
    }
}

if (!function_exists('inline_svg')) {
    /**
     * Inline an SVG file.
     *
     * @param string $path The SVG path
     *
     * @return string
     */
    function inline_svg(string $path): string
    {
        $path = str_replace('.', '/', $path);

        return file_get_contents(get_stylesheet_directory() . "/dist/img/{$path}.svg");
    }
}

if (!function_exists('response')) {
    /**
     * Return a response
     *
     * @param string $content The response content
     *
     * @return \App\Support\Http\Response
     */
    function response(string $content = ''): Response
    {
        if ($content) {
            return (new Response)->content($content);
        }
        return (new Response);
    }
}

if (!function_exists('url')) {
    /**
     * Return the url instance.
     *
     * @param string $path The path to append to the home URL
     *
     * @return \App\Support\Routing\URL|string
     */
    function url(string $path = '')
    {
        if ($path) {
            return (new Url())->home($path);
        }
        return (new Url());
    }
}

if (!function_exists('view')) {
    /**
     * Undocumented function
     *
     * @param string $path The view path
     * @param array  $data The view data
     *
     * @return \App\Support\View\View
     */
    function view(string $path, array $data = []): string
    {
        return (new View(get_template_directory()))->make($path, $data);
    }
}
