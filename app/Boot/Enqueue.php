<?php

namespace App\Boot;

/**
 *
 * Enqueue scripts, styles and fonts here.
 *
 */
class Enqueue
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'styles'], 100);
		add_action('wp_enqueue_scripts', [$this, 'scripts'], 100);
        add_action('admin_init', [$this, 'editorStyle'], 100);

        add_action('wp_enqueue_scripts', [$this, 'googleFont'], 99);
        add_action('wp_enqueue_scripts', [$this, 'typekitFont'], 100);

        add_filter('style_loader_src', [$this, 'removeWpVersion'], 9999);
        add_filter('script_loader_src', [$this, 'removeWpVersion'], 9999);
    }

    /**
     *
     * Enqueue stylesheets
     *
     */
    public function styles()
    {
        wp_enqueue_style(
            'main',
            get_template_directory_uri() . get_asset_path('css/main.css')
        );

        // Either use both of the below (for IE support) or none
        // wp_enqueue_style('ie', get_template_directory_uri() . '/assets/css/ie.min.css');
        // wp_style_add_data('ie', 'conditional', 'IE');
    }

    /**
     *
     * Enqueue scripts
     *
     */
    public function scripts()
    {
        if (!is_admin()) {
            wp_deregister_script('jquery');
            wp_register_script('jquery', get_stylesheet_directory_uri() . '/assets/js/jquery-3.2.1.min.js');
            wp_enqueue_script('jquery');
            
            wp_register_script('jquery-migrate', get_stylesheet_directory_uri() . '/assets/js/jquery-migrate-3.0.1.min.js', array('jquery'), '3.0.1', false);
            wp_enqueue_script('jquery-migrate');

            // The following output in the footer, after jQuery
            if (is_single() && comments_open() && get_option('thread_comments')) {
                wp_enqueue_script('comment-reply');
            }

            wp_register_script('main-js', get_template_directory_uri() . get_asset_path('js/main.js'), array('jquery'), '', true);
            wp_enqueue_script('main-js');
        }
    }

    /**
     *
     * Custom stylesheet for TinyMCE and Block Editor
     *
     */
    public function editorStyle()
    {
        add_editor_style('assets/css/wp-editor.css');
    }

    /**
     *
     * Google Fonts
     *
     */
    public function googleFont()
    {
        wp_enqueue_style('td-google-font', 'https://fonts.googleapis.com/css?family=Open+Sans', false);
    }

    /**
     *
     * TypeKit Fonts
     *
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
