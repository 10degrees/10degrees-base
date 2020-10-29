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
}
