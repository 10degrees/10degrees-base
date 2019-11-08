<?php

namespace App\Admin;

/**
 *
 * Login page customisations
 *
 */
class Login
{
    public function __construct()
    {
        add_action('login_head', [$this, 'loginCss']);
        add_filter('login_headerurl', [$this, 'loginLogoUrl']);
        add_filter('login_headertext', [$this, 'loginLogoUrlTitle']);
        add_action('login_footer', [$this, 'loginCheckedRememberMe']);
    }

    /**
     *
     * Login screen
     *
     * Add CSS in the file referenced below, then create the appropriate logo in assets/img/logo-login.png
     *
     */
    public function loginCss()
    {
        echo '<link rel="stylesheet" sheeit type="text/css" href="' . get_stylesheet_directory_uri() . td_asset_path('css/login.css') . '" />';
    }

    /**
     *
     * Change login link. Note home_url not site_url
     *
     */
    public function loginLogoUrl()
    {
        return home_url();
    }

    /**
     *
     * Logo title login page
     *
     */
    public function loginLogoUrlTitle()
    {
        return get_bloginfo('name');
    }

    /**
     *
     * Make sure Remember Me is checked = fewer password resets!
     *
     */
    public function loginCheckedRememberMe()
    {
        echo "<script>document.getElementById('rememberme').checked = true;</script>";
    }
}
