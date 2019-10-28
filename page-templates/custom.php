<?php
/**
 * Template Name: Custom
 * Template Post Type: post
 *
 * @package      10degrees-base
 * @author       10 Degrees
 * @since        2.0.0
 * @license      GPL-2.0+
**/

while (have_posts()) :
    the_post();
    get_template_part('partials/page', 'header');
    the_content();
endwhile;
