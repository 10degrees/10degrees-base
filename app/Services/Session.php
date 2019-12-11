<?php

namespace App\Services;

use App\Inc\Singleton;

/**
 * Handles storing data with the Help of plugin WP Session Manager
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @see      WP Session Manager https://wordpress.org/plugins/wp-session-manager/
 * @since    2.0.0
 */
class Session extends Singleton
{
    /**
     * Setter
     *
     * @param string $key  Key name
     * @param mixed  $data Value
     *
     * @return void
     */
    public function set($key, $data)
    {
        $_SESSION[$key] = $data;

        return $this->get();
    }

    /**
     * Merge
     *
     * @param string $key   Key name
     * @param mixed  $value Value to merge
     *
     * @return void
     */
    public function merge($key, $value)
    {
        $merged = array_merge($_SESSION[$key], $value);
        $_SESSION[$key] = array_unique($merged);
    }

    /**
     * Get a value by its key
     *
     * @param string $key Key name
     *
     * @return void
     */
    public function get($key = null)
    {
        if (is_null($key)) {
            return $_SESSION;
        }

        if (array_key_exists($key, $_SESSION)) {
            return $_SESSION[$key];
        }

        return [];
    }

    /**
     * Check if key exists
     *
     * @param string $key Key to check
     *
     * @return boolean
     */
    public function has($key)
    {
        return isset($_SESSION[$key]);
    }

    /**
     * Get all session data
     *
     * @return array $_SESSION The global session variable
     */
    public function all()
    {
        return $_SESSION;
    }

    /**
     * Delete a key from the session
     *
     * @param string $key Key name
     *
     * @return void
     */
    public function delete($key)
    {
        unset($_SESSION[$key]);
        return;
    }

    /**
     * Clear the global session variable
     *
     * @return void
     */
    public function flush()
    {
        $_SESSION = [];
        return;
    }

    /**
     * Set a flash message
     *
     * @param string $title   Message title
     * @param string $message Message content
     * @param string $status  Message status
     *
     * @return void
     */
    public function flash($title, $message = null, $status = 'success')
    {
        $this->set(
            'flash_message',
            [
            'title' => $title,
            'message' => $message,
            'status' => $status,
            ]
        );
    }

    /**
     * Add errors to the session
     *
     * @param string $key   Key name
     * @param string $value Value
     *
     * @return void
     */
    public function addError($key, $value)
    {
        //@TODO add error flash messaging
        $this->set('errors', [$key => $value]);
    }
}
