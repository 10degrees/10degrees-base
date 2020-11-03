<?php

namespace App\Support\Http;

use JsonSerializable;

class Request implements JsonSerializable
{
    /**
     * The request items
     *
     * @var array
     */
    protected $request = [];

    /**
     * Build the request object
     */
    public function __construct()
    {
        $this->request = array_merge($_GET, $_POST);
    }









    /**
     * Get the request path
     *
     * @return string
     */
    public function path(): string
    {
        return strtok($_SERVER['REQUEST_URI'], '?');
    }

    /**
     * Compare the request path with the given path for a match
     *
     * @param string $path The path to check against
     *
     * @return boolean
     */
    public function isPath(string $path): bool
    {
        return trim($path, '/') === trim($this->path(), '/');
    }

    /**
     * Get the root domain
     *
     * @return string
     */
    public function root(): string
    {
        return home_url();
    }

    /**
     * Get the URL without the query parameters
     *
     * @return string
     */
    public function url(): string
    {
        return home_url(strtok($_SERVER['REQUEST_URI'], '?'));
    }

    /**
     * Get the full URL including query parameters
     *
     * @return string
     */
    public function fullUrl(): string
    {
        return home_url($_SERVER['REQUEST_URI']);
    }

    /**
     * Get the scheme
     *
     * @return string
     */
    public function getScheme(): string
    {
        return $this->isSecure() ? 'https' : 'http';
    }

    /**
     * Check if the request is using https
     *
     * @return boolean
     */
    public function isSecure(): bool
    {
        return is_ssl();
    }

    /**
     * Get the method of the request, or the override method
     *
     * @return string
     */
    public function method(): string
    {
        $realMethod = $this->getRealMethod();

        if ($realMethod !== 'POST') {
            return $realMethod;
        }

        $method = strtoupper($this->input('_method'));

        if (in_array($method, ['GET', 'HEAD', 'POST', 'PUT', 'DELETE', 'CONNECT', 'OPTIONS', 'PATCH', 'PURGE', 'TRACE'], true)) {
            return $method;
        }
        return $realMethod;
    }

    /**
     * Get the real method of the request.
     *
     * @return string
     */
    public function getRealMethod(): string
    {
        return strtoupper($_SERVER['REQUEST_METHOD'] ?? 'GET');
    }

    /**
     * Check if the methods match.
     *
     * @param string $method The method to check
     *
     * @return bool
     */
    public function isMethod(string $method): bool
    {
        return $this->method() === strtoupper($method);
    }

    /**
     * Get a request by the key.
     *
     * @param string|null $key     The key to check for
     * @param mixed       $default The fallback value
     *
     * @return mixed
     */
    public function input(?string $key = null, $default = null)
    {
        if ($key) {
            return $this->request[$key] ?? $default;
        }
        return $this->request;
    }











    /**
     * Convert the request object to JSON
     *
     * @return string
     */
    public function __toString(): string
    {
        return json_encode($this->request);
    }
    public function jsonSerialize()
    {
        return $this->request;
    }


    public function has(string $key)
    {
        return isset($this->request[$key]);
    }
    public function get(string $key)
    {
        return $this->request[$key] ?? null;
    }

    public function header(string $key)
    {
        return '';
    }
}
