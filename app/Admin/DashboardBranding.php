<?php

namespace App\Admin;

/**
 * Dashboard branding
 *
 * Prettify the admin dashboard
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class DashboardBranding
{
    /**
     * Constructor
     */
    public function __construct()
    {
        add_action('admin_init', [$this, 'defineColorScheme'], 10);
        add_action('user_register', [$this, 'setColorScheme']);
        add_action('admin_head', [$this, 'editButton']);
    }

    /**
     * Set wp-admin colour scheme
     *
     * @return void
     */
    public function defineColorScheme()
    {
        wp_admin_css_color(
            '10degrees',
            __('10&deg;'),
            get_template_directory_uri() . '/assets/css/wp-admin.css',
            array('#07273E', '#14568A', '#6e949c', '#bb3131'),
            array('base' => '#e5f8ff', 'focus' => '#fff', 'current' => '#fff')
        );
    }

    /**
     * Set default colour scheme to 10degrees for new users.
     * http://www.hongkiat.com/blog/wordpress-admin-color-scheme/
     *
     * @param int $user_id UserID
     *
     * @return void
     */
    public function setColorScheme($user_id)
    {
        $args = array(
            'ID' => $user_id,
            'admin_color' => '10degrees',
        );
    
        wp_update_user($args);
    }

    /**
     * Change post edit button from WP logo
     *
     * @return void
     */
    public function editButton()
    {
        ?>
        <style>
        .edit-post-fullscreen-mode-close.has-icon svg {
            display: none !important;
        }
        .edit-post-fullscreen-mode-close.has-icon {
            color: transparent ;
            background: url('<?php echo td_img_path('dashboard.svg'); ?>') no-repeat 50% 50% / 100% auto !important;
            height: 46px;
            width: 46px;
            margin: 8px;
        }
        </style>
        <?php
    }
}
