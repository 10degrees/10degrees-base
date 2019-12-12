<?php
/**
 * Template part for displaying post content in single.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @since 2.0.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('block-wrapper'); ?>>
    <?php get_template_part('partials/post', 'header'); ?>
    <div class="article__content">
        <div class="article__container">
            <?php the_content(); ?>
        </div>
    </div>
</article>
