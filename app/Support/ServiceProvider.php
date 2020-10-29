<?php

namespace App\Support;

abstract class ServiceProvider
{
    /**
     * Boot each class in the provider
     */
    public function __construct()
    {
        foreach ($this->classes as $class) {
            new $class();
        }
    }
}
