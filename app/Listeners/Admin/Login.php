<?php

namespace App\Listeners\Admin;

use App\Support\Events\Dispatcher;

/**
 * Subscribe to some events
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
     * Subscribe to some events
     *
     * @param \App\Support\Events\Dispatcher $events The event dispatcher
     *
     * @return void
     */
    public function subscribe(Dispatcher $events): void
    {
        $events->listen('login_enqueue_scripts', [$this, 'enqueueScripts']);
        $events->listen('login_headerurl', [$this, 'loginLogoUrl']);
        $events->listen('login_headertext', [$this, 'loginLogoUrlTitle']);
        $events->listen('login_footer', [$this, 'loginCheckedRememberMe']);
        $events->listen('login_head', [$this, 'maybeOverrideLoginLogo']);
    }

    /**
     * Enqueue the login CSS
     *
     * @return void
     */
    public function enqueueScripts()
    {
        wp_enqueue_style('td-login', get_template_directory_uri() . td_asset_path('css/login.css'), [], null);
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

    /**
     * Maybe override login logo if Customiser logo is set
     *
     * @return void
     */
    public function maybeOverrideLoginLogo()
    {
        $custom_logo_id = get_theme_mod('custom_logo');
        $logo_url = $custom_logo_id ? wp_get_attachment_image_url($custom_logo_id, 'full') : null;

        if (!$logo_url) {
            return; // Use the default SCSS logo in login.scss
        }

        echo '<style>
        body.login h1 a {
            background-image: url("' . esc_url($logo_url) . '") !important;
            background-size: contain;
            width: 320px;
            height: 150px;
        }
        </style>';
    }
}
