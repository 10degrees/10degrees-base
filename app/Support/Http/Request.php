<?php

namespace App\Support\Http;

class Request
{
    /**
     * The request items
     *
     * @var array
     */
    protected $request = [];

    /**
     * Build the request object
     *
     * @param array $get
     * @param array $post
     */
    public function __construct(array $get, array $post)
    {
        $this->request = array_merge($get, $post);
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


    public function has(string $key)
    {
        return isset($this->request[$key]);
    }
    public function get(string $key)
    {
        return $this->request[$key] ?? null;
    }
    public function input(string $key)
    {
        return $this->request[$key] ?? null;
    }
    public function method()
    {
        return $this->request['_method'] ?? $_SERVER['REQUEST_METHOD'];
    }
    public function header(string $key)
    {
        return '';
    }
}
