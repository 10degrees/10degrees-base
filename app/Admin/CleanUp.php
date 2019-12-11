<?php

namespace App\Admin;

/**
 * Cleanup
 *
 * Remove unecessary functionality
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class CleanUp
{
    /**
     * Constructor
     */
    public function __construct()
    {
        add_action('add_meta_boxes', [$this, 'removeYoastMetaBoxForNon'], 99);
        add_action('add_meta_boxes', [$this, 'removeYoastMetaBoxForPostType'], 99);
        add_filter('wpseo_metabox_prio', [$this, 'moveYoastToBottomOfEditPage']);
        add_filter('tiny_mce_before_init', [$this, 'forceAdvancedWysiwyg']);
        add_action('admin_notices', [$this, 'restrictUpdateNotification'], 1);
        add_filter('admin_bar_menu', [$this, 'replaceHowdy'], 25);
        add_action('wp_dashboard_setup', [$this, 'cleanUpDashboard']);

        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('admin_print_styles', 'print_emoji_styles');

        $this->maybeDefineDisallowFileEdit();
    }

    /**
     * Remove ability to modify themes and plugins
     *
     * @return void
     */
    public function maybeDefineDisallowFileEdit()
    {
        if (!defined('DISALLOW_FILE_EDIT')) {
            define('DISALLOW_FILE_EDIT', true);
        }
    }

    /**
     * Remove Yoast SEO meta from users below Editor
     *
     * @return void
     */
    public function removeYoastMetaBoxForNon()
    {
        if (!current_user_can('edit_posts')) {
            remove_meta_box('wpseo_meta', 'page', 'normal');
            remove_meta_box('wpseo_meta', 'post', 'normal');
        }
    }

    /**
     * Remove Yoast SEO meta for specified post types
     *
     * @return void
     */
    public function removeYoastMetaBoxForPostType()
    {
        remove_meta_box('wpseo_meta', 'testimonial', 'normal');
    }

    /**
     * Yoast SEO to bottom of edit screen
     *
     * @return string $position
     */
    public function moveYoastToBottomOfEditPage()
    {
        return 'low';
    }

    /**
     * Force the kitchen sink to always be on
     *
     * @param $args Kitchen sink config params
     *
     * @return array $args Kitchen sink config params
     */
    public function forceAdvancedWysiwyg($args)
    {
        $args['wordpress_adv_hidden'] = false;

        return $args;
    }

    /**
     * Disable update notifications for non-admins
     *
     * @return void
     */
    public function restrictUpdateNotification()
    {
        if (!current_user_can('activate_plugins')) {
            remove_action('admin_notices', 'update_nag', 3);
        }
    }

    /**
     * Replace How Are You (en-GB)
     *
     * @param $wp_admin_bar WP_Admin_Bar
     *
     * @return void
     */
    public function replaceHowdy($wp_admin_bar)
    {
        $my_account = $wp_admin_bar->get_node('my-account');

        $newtitle = str_replace('How are you,', 'Your account: ', $my_account->title);

        $wp_admin_bar->add_node(
            array(
                'id' => 'my-account',
                'title' => $newtitle,
            )
        );
    }

    /**
     * Remove dashboard widgets except Gravity Forms
     *
     * @return void
     */
    public function cleanUpDashboard()
    {
        global $wp_meta_boxes;

        // Dashboard core widgets :: Left Column
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
        unset($wp_meta_boxes['dashboard']['normal']['core']['pb_backupbuddy_stats']);
        unset($wp_meta_boxes['dashboard']['normal']['core']['bruteprotect_dashboard_widget']);

        // Additional dashboard core widgets :: Right Column
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);

        // Remove the welcome panel
        update_user_meta(get_current_user_id(), 'show_welcome_panel', '0');

        unset($wp_meta_boxes['dashboard']['normal']['core']['rg_forms_dashboard']);
        unset($wp_meta_boxes['dashboard']['normal']['core']['cws-wp-help-dashboard-widget']);
    }
}
