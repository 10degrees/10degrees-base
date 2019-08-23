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

    <div class="article__content">
        <div class="article__container">
            <?php the_content(); ?>
        </div>
    </div>

</article>