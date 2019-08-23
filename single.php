<?php

while ( have_posts() ) {

	the_post();
	
	get_template_part( 'partials/content', 'single' );
	get_template_part( 'partials/comments' );

}