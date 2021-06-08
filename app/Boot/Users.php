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
        add_action('init', [$this, 'removeRoles']);
    }

    /**
     * Disable the default user endpoints
     *
     * @param   array  $endpoints  Array of endpoints
     *
     * @return  array              Array of endpoints
     */
    public function disableUserEndpoints($endpoints)
    {
        if (is_user_logged_in()){
           return $endpoints;
        }

        if (isset($endpoints['/wp/v2/users'])) {
            unset($endpoints['/wp/v2/users']);
        }

        if (isset($endpoints['/wp/v2/users/(?P<id>[\d]+)'])) {
            unset($endpoints['/wp/v2/users/(?P<id>[\d]+)']);
        }
    
        return $endpoints;
    }

    /**
     * Remove roles that aren't used often
     *
     * @return  void
     */
    public function removeRoles()
    {
        remove_role('author');
        remove_role('contributor');
        remove_role('subscriber');
    }
}