<?php get_template_part( 'partials/page', 'header' ); ?>

<?php if ( ! have_posts() ) { ?>
	<div class="alert">
		<p><?php _e( 'Sorry, no results were found.', '@textdomain' ); ?></p>
	</div>
	<?php get_search_form();
} ?>

<?php while ( have_posts() ) {
	the_post(); ?>
		
	<article <?php post_class(); ?>>
		<header>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php get_template_part( 'partials/entry-meta' ); ?>
		</header>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div>
	</article>

<?php } ?>

<?php if ( $wp_query->max_num_pages > 1 ) { td_page_navi(); } ?>