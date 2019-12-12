<?php

namespace App\Admin;

/**
 * ACF
 *
 * Add custom ACF functions
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class Acf
{
    /**
     * Define the email domains that are allowed access to
     * the acf settings in the dashboard
     *
     * @var array $allowedDomains Users with this domain in their
     * email will be allowed to view the ACF dashboard menu
     */
    private $allowedDomains = [
        '10degrees.uk'
    ];

    /**
     * Constructor
     */
    public function __construct()
    {
        add_action('admin_init', [$this, 'hideAcfFromMenu']);

        add_action('after_switch_theme', [$this, 'setLicenseKey']);

        $this->defineOptionsPages();
    }

    /**
     * Define Options Pages
     *
     * @return void
     */
    public function defineOptionsPages()
    {
        if (function_exists('acf_add_options_page')) {
            acf_add_options_page(
                array(
                    'title' => 'Site settings',
                    'capability' => 'manage_options',
                    'position' => '80.020',
                    'icon_url' => 'dashicons-admin-settings'
                )
            );
        }
    }

    /**
     * Hides ACF from menu
     *
     * Remove ACF from dashboard
     *
     * @return void
     */
    public function hideAcfFromMenu()
    {
        $current_user = wp_get_current_user();

        if ($this->notAllowedToSeeAcf($current_user)) {
            remove_menu_page('edit.php?post_type=acf-field-group');
        }
    }

    /**
     * Check if user is not allowed to see ACF menu
     *
     * Users that cannot see ACF menu
     *
     * @param WP_User $user User object
     *
     * @return bool
     */
    protected function notAllowedToSeeAcf($user)
    {
        $domain = $this->getDomainFromEmail($user->user_email);

        return !in_array($domain, $this->allowedDomains);
    }

    /**
     * Gets domain from email
     *
     * @param string $email Users email
     *
     * @return string Domain name of the email
     */
    protected function getDomainFromEmail($email)
    {
        return substr(strrchr($email, "@"), 1);
    }

    /**
     * Set ACF 5 license key on theme activation
     *
     * @return void;
     */
    public function setLicenseKey()
    {
        if (!get_option('acf_pro_license') && defined('ACF_5_KEY')) {
            $save = array(
                'key' => ACF_5_KEY,
                'url' => home_url()
            );

            $save = maybe_serialize($save);

            $save = base64_encode($save);

            update_option('acf_pro_license', $save);
        }
    }
}
