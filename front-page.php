<?php

/**
 *
 * Template Name: Front page
 * 
 */

the_post();

get_template_part('partials/page', 'header');
?>

<div class="fp__content">

    <div class="container fp__container">
        <div class="row">
            <div class="col-sm">
                <?php the_content(); ?>
            </div>
        </div>
    </div>

</div>