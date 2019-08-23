<?php

namespace App\Boot;

/**
 *
 * Try your best not to use this too much. it is only for random FRONTEND 
 * actions and filters that really don't belong anywhere else logically
 * 
 */

class Util
{
	public function __construct()
	{
		add_filter( 'get_search_form', [$this, 'setSearchTemplate'] );
		add_filter( 'embed_oembed_html', [$this, 'wrapIframesInContainer'], 10, 3 );
		add_filter( 'video_embed_html', [$this, 'wrapIframesInContainer'] ); // Jetpack
	}

	/**
	 *
	 * Use searchform.php from the templates/ directory
	 * 
	 */
	public function setSearchTemplate( $form ) 
	{
		$form = '';

		locate_template( '/partials/searchform.php', true, false );
		
		return $form;
	}

	/**
	 *
	 * Wrap embeds in a div to enable responsiveness
	 * 
	 */
	public function wrapIframesInContainer( $html ) 
	{
	    return '<div class="embed__container">' . $html . '</div>';
	}
}