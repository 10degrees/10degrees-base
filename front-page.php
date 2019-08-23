<?php

/**
 *
 * Template Name: Front page
 * 
 */

the_post();

get_template_part( 'partials/page', 'header' );
?>

<div class="fp__content">
    <div class="fp__container">
        <?php the_content(); ?>
    </div>
</div>