<?php
/**
 * Index template
 *
 * @package      10degrees-base
 * @author       10 Degrees
 * @since        2.0.0
 * @license      GPL-2.0+
**/

if (! have_posts()) : ?>
    <div class="alert">
        <p><?php _e('Sorry, no results were found.', '@textdomain'); ?></p>
    </div>
    <?php get_search_form();
endif;

while (have_posts()) :
    the_post();
    get_template_part('partials/content');
endwhile;

if ($wp_query->max_num_pages > 1) {
    td_page_navi();
}
