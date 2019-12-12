<?php

namespace App\Models;

/**
 * Wrapper class for WP User
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class User
{
    protected $user;

    /**
     * Constructor
     *
     * @param WP_User $user  A WordPress user object
     * @param string  $field //@TODO add description
     */
    public function __construct($user = null, $field = 'ID')
    {
        if (is_null($user)) {
            $this->user = wp_get_current_user();
        } elseif ($user instanceof WP_User) {
            $this->user = $user;
        } else {
            $this->user = get_user_by($field, $user);
        }
    }

    /**
     * Fetch a user by associated metadata
     *
     * @param string $field Field name to search with
     * @param string $value Value to search with
     *
     * @return void
     */
    public function findByUserMeta($field, $value)
    {
        $users = get_users(
            [
                'meta_key' => $field,
                'meta_value' => $value
            ]
        );

        if (count($users)) {
            $this->user = $users[0];
        } else {
            $this->user = false;
        }

        return $this;
    }

    /**
     * Return users Id
     *
     * @return string
     */
    public function id()
    {
        return $this->user->ID;
    }

    /**
     * Get the users username
     *
     * @return string
     */
    public function userLogin()
    {
        return $this->user->user_login;
    }

    /**
     * Return users Email
     *
     * @return string
     */
    public function email()
    {
        return $this->user->user_email;
    }

    /**
     * Return users first & last name
     *
     * @return string
     */
    public function name()
    {
        return $this->firstName() . ' ' . $this->lastName();
    }

    /**
     * Return users first name
     *
     * @return string
     */
    public function firstName()
    {
        return $this->meta('first_name');
    }

    /**
     * Return users last name
     *
     * @return string
     */
    public function lastName()
    {
        return $this->meta('last_name');
    }

    /**
     * Return users display name
     *
     * @return string
     */
    public function displayName()
    {
        return $this->user->display_name;
    }

    /**
     * Return users nice name
     *
     * @return string
     */
    public function niceName()
    {
        return $this->user->user_nicename;
    }

    /**
     * Create a new user and rehydrate this user Model
     *
     * @param array $data //@TODO write description
     *
     * @return User
     */
    public function create($data)
    {
        $userdata = array(
            'user_login' => $this->generateUsername($data['username']),
            'user_pass'  => (isset($data['password']) ? $data['password'] : wp_generate_password())
        );

        $userId = wp_insert_user($userdata);

        if (is_wp_error($userId)) {
            return $userId;
        }

        $this->user = get_user_by('ID', $userId);

        return $this->user;
    }

    /**
     * Generate a unique username
     *
     * @param string $username Username
     *
     * @return string
     */
    public function generateUsername($username)
    {
        $username = sanitize_title($username);

        static $i;
        if (null === $i) {
            $i = 1;
        } else {
            $i ++;
        }
        if (!username_exists($username)) {
            return $username;
        }
        $new_username = sprintf('%s-%s', $username, $i);
        if (!username_exists($new_username)) {
            return $new_username;
        } else {
            return $this->generateUsername($username);
        }
    }

    /**
     * Save a piece of meta information to user meta
     *
     * @param $field meta_key - string
     * @param $value - anything you want to save
     *
     * @return boolean - true / false
     */
    public function update($field, $value)
    {
        return update_user_meta($this->user->ID, $field, $value);
    }

    /**
     * Update the user info that WordPress only
     * let's us update through wp_update_user
     *
     * @param array $data User meta data to update
     *
     * @return boolean
     */
    public function updateOnUsersTable(array $data)
    {
        return wp_update_user(
            array_merge(
                ['ID' => $this->id()],
                $data
            )
        );
    }

    /**
     * Get user meta
     *
     * @param string  $meta_key     Metakey
     * @param boolean $returnString //@TODO find out what this does
     *
     * @return string/null
     */
    public function meta($meta_key, $returnString = true)
    {
        $meta = get_user_meta($this->user->ID, $meta_key, $returnString);

        if ($meta != '') {
            return $meta;
        }

        return null;
    }

    /**
     * Delete user meta
     *
     * @param string         $meta_key   Meta key
     * @param string|optionl $meta_value //@TODO find out what this does
     *
     * @return boolean
     */
    public function deleteMeta($meta_key, $meta_value = '')
    {
        return delete_user_meta($this->user->ID, $meta_key, $meta_value);
    }

    /**
     * Does the fetched user exist
     *
     * @return boolean
     */
    public function exists()
    {
        return $this->user;
    }

    /**
     * Is the user logged in
     *
     * @return boolean
     */
    public function isLoggedIn()
    {
        if ($this->user->ID == 0) {
            return false;
        }

        return true;
    }

    /**
     * Log the current browser in as he given user. Careful.
     *
     * @return void
     */
    public function logInAsUser()
    {
        wp_set_current_user($this->id(), $this->userLogin());
        wp_set_auth_cookie($this->id());
        // do_action('wp_login', $user_login);
    }

    /**
     * Handles one user role. Useful for determining in more detail
     * difference between employer and employer_premium for instance.
     *
     * @param string $role User role
     *
     * @return boolean
     */
    public function hasRole($role)
    {
        if (in_array($role, $this->getRoles())) {
            return true;
        }

        return false;
    }

    /**
     * Fetches users roles
     *
     * @return void
     */
    public function getRoles()
    {
        return $this->user->roles;
    }
}
