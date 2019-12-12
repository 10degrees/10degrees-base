<?php

namespace App\Services;

/**
 * A helpful wrapper around $_GET and $_POST
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class Request
{
    /**
     * Post request
     *
     * @var array
     */
    private $get;

    /**
     * Get request
     *
     * @var array
     */
    private $post;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->post = $_POST;

        $this->get = $_GET;
    }

    /**
     * $_POST request wrapper
     *
     * @param string $key Key to get
     *
     * @return mixed
     */
    public function get($key = null)
    {
        if (is_null($key)) {
            return $this->get;
        }
        if (isset($this->get[$key])) {
            return $this->getValue($this->get[$key]);
        }
        return null;
    }

    /**
     * $_GET request wrapper
     *
     * @param string $key
     *
     * @return mixed
     */
    public function post($key = null)
    {
        if (is_null($key)) {
            return $this->post;
        }

        if (isset($this->post[$key])) {
            return $this->getValue($this->post[$key]);
        }
        return null;
    }

    /**
     * Gets value
     *
     * @param string $value Key to fetch
     *
     * @return mixed $value The value, or null if not exists
     */
    protected function getValue($value)
    {
        if ($this->hasValue($value)) {
            return $value;
        }
        return null;
    }

    /**
     * Check value exists
     *
     * @param string $value Key to check for
     *
     * @return boolean
     */
    protected function hasValue($value)
    {
        return isset($value) && !empty($value) && $value != '';
    }
}
