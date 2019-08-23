<?php

namespace App\Boot;

class CleanUp
{
	public function __construct()
	{
		add_action( 'after_setup_theme', [$this, 'cleanUpHead'] );
	}

	public function cleanUpHead()
	{
	    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	    remove_action( 'wp_print_styles', 'print_emoji_styles' );
	    remove_action( 'wp_head', 'rsd_link' );
	    remove_action( 'wp_head', 'wlwmanifest_link' );
	    remove_action( 'wp_head', 'wp_generator' );

	    // Disable comments feed, WP 4.4 onwards
	    add_filter( 'feed_links_show_comments_feed', '__return_false' ); 
	}
	
}