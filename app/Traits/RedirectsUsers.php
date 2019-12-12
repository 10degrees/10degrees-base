<?php

namespace App\Traits;

/**
 * A trait for objects that redirects users
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
trait RedirectsUsers
{
    /**
     * Perform a safe redirect
     *
     * @param string  $url    URL to redirect to
     * @param integer $status HTTP status code
     *
     * @return void
     */
    public function redirect($url, $status = 302)
    {
        wp_safe_redirect($url, $status);
        exit;
    }

    /**
     * Perform an external redirect
     *
     * @param string  $url    URL to redirect to
     * @param integer $status HTTP status code
     *
     * @return void
     */
    public function redirectExternal($url, $status = 302)
    {
        wp_redirect($url, $status);
        exit;
    }
}
