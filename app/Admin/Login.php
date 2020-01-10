<?php

namespace App\Admin;

/**
 * Login page customisations
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class Login
{
    /**
     * Constructor
     */
    public function __construct()
    {
        add_action('login_head', [$this, 'loginCss']);
        add_filter('login_headerurl', [$this, 'loginLogoUrl']);
        add_filter('login_headertext', [$this, 'loginLogoUrlTitle']);
        add_action('login_footer', [$this, 'loginCheckedRememberMe']);
    }

    /**
     * Login screen
     *
     * Add CSS in the file referenced below, then create the appropriate
     * logo in assets/img/logo-login.png
     *
     * @return void
     */
    public function loginCss()
    {
        echo '<link rel="stylesheet" type="text/css" href="' . get_stylesheet_directory_uri() . td_asset_path('css/login.css') . '" />';
    }

    /**
     * Change login link. Note home_url not site_url
     *
     * @return string $url Home URL
     */
    public function loginLogoUrl()
    {
        return home_url();
    }

    /**
     * Logo title login page
     *
     * @return string $name Blog name
     */
    public function loginLogoUrlTitle()
    {
        return get_bloginfo('name');
    }

    /**
     * Make sure Remember Me is checked = fewer password resets!
     *
     * @return void
     */
    public function loginCheckedRememberMe()
    {
        echo "<script>document.getElementById('rememberme').checked = true;</script>";
    }
}
