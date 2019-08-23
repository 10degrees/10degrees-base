<?php get_template_part( 'partials/page', 'header' ); ?>

<?php
if ( get_option( 'options_404_error_page_text' ) ) {

	echo get_option( 'options_404_error_page_text' );

} else {

	_e( 'Sorry, but the page you were trying to view does not exist.', '@textdomain' );

}

get_search_form();