<?php

namespace App\Boot;

/**
 * Enqueue scripts, styles and fonts here.
 */
class Enqueue
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'styles'], 100);
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
     * CSS for front end
     */
    public function styles()
    {
        wp_enqueue_style(
            'main',
            get_template_directory_uri() . td_asset_path('css/main.css')
        );
    }

    /**
     * JavaScript for front end
     */
    public function scripts()
    {
        wp_register_script('main', get_stylesheet_directory_uri() . td_asset_path('js/main.js'), ['jquery'], '', true);
        if (is_single() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
        wp_enqueue_script('main');
    }

    /**
     * CSS for Block Editor
     */
    public function blockEditorStyle()
    {
        wp_enqueue_style('td-block-editor-style', get_stylesheet_directory_uri() . td_asset_path('css/editor-style-block.css'), '', '', 'all');
    }

    /**
     * JavaScript for Block Editor
     */
    public function blockEditorScript()
    {
        wp_enqueue_script('td-block-editor-script', get_stylesheet_directory_uri() . td_asset_path('js/editor-script-block.js'), ['wp-blocks', 'wp-dom'], '', true);
    }

    /**
     * CSS for Classic Editor
     */
    public function classicEditorStyle()
    {
        add_editor_style(get_stylesheet_directory_uri() . td_asset_path('/css/editor-style-classic.css'));
    }

    /**
     * CSS for wp-admin
     */
    public function adminStyle()
    {
        wp_enqueue_style('td-admin-main', get_stylesheet_directory_uri() . td_asset_path('css/admin-main.css'), '', '', true);
    }

    /**
     * JavaScript for wp-admin
     */
    public function adminScript()
    {
        wp_enqueue_script('td-admin-script', get_stylesheet_directory_uri() . td_asset_path('js/admin-main.js'), '', '', true);
    }

    /**
     * Google Fonts
     *
     * Now with support for font-display
     * @link https://css-tricks.com/font-display-masses/
     */
    public function googleFont()
    {
        wp_enqueue_style('td-google-font', 'https://fonts.googleapis.com/css?family=Open+Sans&display=swap', false);
    }

    /**
     * TypeKit Fonts
     */
    public function typekitFont()
    {
        wp_enqueue_style('td-typekit-font', 'https://use.typekit.net/xxxxxxx.css', false);
    }

    /**
     * Remove WP version query strings from scripts and stylesheets
     *
     * @param  string $src Url of external resource being called into the page
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
