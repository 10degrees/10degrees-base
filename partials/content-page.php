<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @since 2.0.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('block-wrapper'); ?>>
    <header>
        <h1><?php echo td_title(); ?></h1>
    </header>
    <?php the_content(); ?>
</article>
