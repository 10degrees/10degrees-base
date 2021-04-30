<?php

namespace App\Support\Http;

use Illuminate\Http\Request as IlluminateRequest;
use JsonSerializable;

class Request extends IlluminateRequest implements JsonSerializable
{
    /**
     * Get the request path
     *
     * @return string
     */
    public function path(): string
    {
        return strtok($this->server('REQUEST_URI'), '?');
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
        return home_url(strtok($this->server('REQUEST_URI'), '?'));
    }

    /**
     * Get the full URL including query parameters
     *
     * @return string
     */
    public function fullUrl(): string
    {
        return home_url($this->server('REQUEST_URI'));
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
     * Convert the request into a json string
     *
     * @return string
     */
    public function __toString(): string
    {
        return json_encode($this);
    }

    /**
     * Only serialize the parameter bag
     *
     * @return void
     */
    public function jsonSerialize(): array
    {
        return $this->all();
    }
}
