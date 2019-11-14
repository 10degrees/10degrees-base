<?php

namespace App\ACF_Fields;

abstract class AbstractFieldRegistration
{
    public function __construct()
    {
        if (function_exists('acf_add_local_field_group')) {
            $this->register();
        }
    }
}
