<?php
	
namespace App\Boot;

/**
 *
 * Adds a filter that places the Page Builder into the_content, so 
 * that plugins which use the_content (WooCommerce, MemberPress, 
 * etc) won't need template overrides.
 * 
 */
class ACFToTheContent
{
	public function __construct()
	{
		add_filter( 'the_content', [$this, 'addPageBuilderToTheContent'], 99 );
	}

	public function addPageBuilderToTheContent( $content ) {

		ob_start();

		get_template_part( 'partials/content', 'page-builder' );

		$content .= ob_get_clean();

	    return $content;

	}
}