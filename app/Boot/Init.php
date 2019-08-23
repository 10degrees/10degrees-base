<?php

namespace App\Boot;

/**
 *
 * Set up some defaults, add theme supports, textdomain, excerpt niceness, etc.
 *
 */
class Init
{
    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        /**
         *
         * Make theme available for translation
         *
         */
        load_theme_textdomain('@textdomain', get_template_directory() . '/lang');

        /**
         *
         * Enable plugins to manage the document title
         *
         * @link https://github.com/roots/roots/pull/1234/files
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
         *
         */
        add_theme_support('title-tag');

        /**
         *
         * Add post thumbnail support
         *
         */
        add_theme_support('post-thumbnails');

        /**
         *
         * Add Woocommerce support
         *
         */
        add_theme_support('woocommerce');
        
        /**
         *
         * Add Editor style support
         *
         */
        add_theme_support('editor-styles');

        /**
         *
         * Selective Refresh Support for Widgets
         *
         * @link https://make.wordpress.org/core/2016/03/22/implementing-selective-refresh-support-for-widgets/
         *
         */
        add_theme_support('customize-selective-refresh-widgets');

        /**
         *
         * Custom logo
         *
         */
        add_theme_support('custom-logo');

        /**
         *
         * Block Editor wide image
         *
         */
        add_theme_support('align-wide');

        /**
         *
         * Add custom image sizes
         *
         */
        // add_image_size( 'td-60', 60, 60, true );

        /**
         *
         * Add post formats
         *
         */
        // add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio'));

        /**
         *
         * Clean up the_excerpt()
         *
         */
        add_filter('excerpt_more', function () {
            return ' &hellip; <a href="' . get_permalink() . '">' . __( 'Continued', '@textdomain' ) . '</a>';
        });

        /**
         *
         * Excerpt length in words
         *
         * @param  integer $length
         * @return integer
         */
        add_filter('excerpt_length', function ($length) {
            return 10;
        }, 999);
    }
}
