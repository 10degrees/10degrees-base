<?php

namespace App\Boot;

/**
 * Filters and Actions relating to Users
 */
class Users
{
    /**
     * Constructor
     */
    public function __construct()
    {
        add_filter('rest_endpoints', [$this, 'disableUserEndpoints']);
    }

    /**
     * Disable the default user endpoints to users who aren't logged in
     *
     * @param   array  $endpoints  Array of endpoints
     *
     * @return  array              Array of endpoints
     */
    public function disableUserEndpoints($endpoints)
    {
        if (!is_user_logged_in()) {
            if (isset($endpoints['/wp/v2/users'])) {
                unset($endpoints['/wp/v2/users']);
            }
    
            if (isset($endpoints['/wp/v2/users/(?P<id>[\d]+)'])) {
                unset($endpoints['/wp/v2/users/(?P<id>[\d]+)']);
            }
        }
    
        return $endpoints;
    }
}