<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @since 2.0.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php get_template_part('partials/page', 'header'); ?>

    <div class="container">
        <div class="row">
            <div class="col-sm">
                <div class="article__content">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>

</article>