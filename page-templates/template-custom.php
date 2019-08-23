<?php
/*
Template Name: Custom Template
*/

while ( have_posts() ) {
	the_post();

	get_template_part( 'partials/page', 'header' );
	
	the_content();

}