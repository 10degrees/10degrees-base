<?php

namespace App\Boot;

/**
 * Enqueue scripts, styles and fonts.
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class Enqueue
{
    /**
     * Constructor
     */
    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'style'], 100);
        add_action('wp_enqueue_scripts', [$this, 'removeBlockCSS'], 100);
        // add_action('wp_enqueue_scripts', [$this, 'styleIe'], 100);
        add_action('wp_enqueue_scripts', [$this, 'scripts'], 100);
        add_action('admin_init', [$this, 'adminStyle'], 100);
        add_action('admin_init', [$this, 'adminScript'], 100);
        add_action('enqueue_block_editor_assets', [$this, 'blockEditorStyle'], 1, 1);
        add_action('enqueue_block_editor_assets', [$this, 'blockEditorScript'], 1, 1);
        // add_action('admin_init', [$this, 'classicEditorStyle'], 100);
        // add_action('wp_enqueue_scripts', [$this, 'googleFont'], 99);
        // add_action('wp_enqueue_scripts', [$this, 'typekitFont'], 100);
        add_filter('style_loader_src', [$this, 'removeWpVersion'], 9999);
        add_filter('script_loader_src', [$this, 'removeWpVersion'], 9999);
    }

    /**
     * Remove the default block styles
     *
     * @return void
     */
    public function removeBlockCSS()
    {
        wp_dequeue_style('wp-block-library');
    }

    /**
     * CSS for front end
     *
     * @return void
     */
    public function style()
    {
        wp_enqueue_style(
            'td-main',
            get_template_directory_uri() . td_asset_path('css/main.css'),
            '',
            false,
            'screen'
        );
    }

    /**
     * CSS for Internet Explorer IE9 and below
     *
     * Can also target specific IE versions
     *
     * @link https://developer.wordpress.org/reference/functions/wp_style_add_data/
     *
     * @return void
     */
    public function styleIe()
    {
        wp_enqueue_style(
            'td-ie',
            get_template_directory_uri() . td_asset_path('css/ie.css'),
            'td-main',
            false,
            'screen'
        );
        wp_style_add_data('td-ie', 'conditional', 'IE');
    }

    /**
     * JavaScript for front end
     *
     * @return void
     */
    public function scripts()
    {
        // die(td_asset_path('js/main.js'));
        wp_register_script('td-main', get_stylesheet_directory_uri() . td_asset_path('js/main.js'), ['jquery'], '', true);
        if (is_single() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
        wp_enqueue_script('td-main');
    }

    /**
     * CSS for Block Editor
     *
     * @return void
     */
    public function blockEditorStyle()
    {
        wp_enqueue_style('td-editor-block-style', get_stylesheet_directory_uri() . td_asset_path('css/editor-block.css'), '', '', 'screen');
    }

    /**
     * JavaScript for Block Editor
     *
     * @return void
     */
    public function blockEditorScript()
    {
        wp_enqueue_script('td-editor-block-script', get_stylesheet_directory_uri() . td_asset_path('js/editor-block.js'), ['wp-blocks', 'wp-dom','wp-edit-post'], '', true);

        wp_enqueue_script('td-blocks-script', get_stylesheet_directory_uri() . td_asset_path('js/blocks.js'), ['wp-blocks', 'wp-dom', 'wp-edit-post'], '', true);
    }

    /**
     * CSS for Classic Editor
     *
     * @return void
     */
    public function classicEditorStyle()
    {
        add_editor_style(get_stylesheet_directory_uri() . td_asset_path('/css/classic-editor.css'));
    }

    /**
     * CSS for wp-admin
     *
     * @return void
     */
    public function adminStyle()
    {
        wp_enqueue_style('td-admin', get_stylesheet_directory_uri() . td_asset_path('css/admin.css'), '', '', 'screen');
    }

    /**
     * JavaScript for wp-admin
     *
     * @return void
     */
    public function adminScript()
    {
        wp_enqueue_script('td-admin', get_stylesheet_directory_uri() . td_asset_path('js/admin.js'), '', '', true);
    }

    /**
     * Google Fonts
     *
     * Now with support for font-display
     *
     * @link https://css-tricks.com/font-display-masses/
     *
     * @return void
     */
    public function googleFont()
    {
        wp_enqueue_style('td-google-font', 'https://fonts.googleapis.com/css?family=Open+Sans&display=swap', false);
    }

    /**
     * TypeKit Fonts
     *
     * @return void
     */
    public function typekitFont()
    {
        wp_enqueue_style('td-typekit-font', 'https://use.typekit.net/xxxxxxx.css', false);
    }

    /**
     * Remove WP version query strings from scripts and stylesheets
     *
     * @param string $src Url of external resource being called into the page
     *
     * @return string
     */
    public function removeWpVersion($src)
    {
        if (strpos($src, 'ver=')) {
            return remove_query_arg('ver', $src);
        }
        return $src;
    }
}
