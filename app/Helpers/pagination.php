<?php

/**
 * Numeric page navigation, adapted from Bones
 *
 * @return void
 */
function td_page_navi()
{
    global $wp_query;
    $bignum = 999999999;
    if ($wp_query->max_num_pages <= 1) {
        return;
    }

    echo '<nav class="pagination">';

    echo paginate_links(
        array(
            'base' => str_replace($bignum, '%#%', esc_url(get_pagenum_link($bignum))),
            'format' => '',
            'current' => max(1, get_query_var('paged')),
            'total' => $wp_query->max_num_pages,
            'prev_text' => '&larr;',
            'next_text' => '&rarr;',
            'type' => 'list',
            'end_size' => 3,
            'mid_size' => 3,
        )
    );

    echo '</nav>';
}

/**
 * Pagination implementation for WPQueryBuilder queries
 *
 * @param WP_Query $query A WP_Query object
 *
 * @return void
 */
function td_query_builder_pagination($query)
{
    $bignum = 999999999;

    if ($query->max_num_pages <= 1) {
        return;
    }

    echo '<nav class="pagination">';

    echo paginate_links(
        array(
            'format' => '?page=%#%',
            'current'       => max(1, get_query_var('page')),
            'total'         => $query->max_num_pages,
            'prev_text'     => '&larr;',
            'next_text'     => '&rarr;',
            'type'          => 'list',
            'end_size'      => 3,
            'mid_size'      => 3,
        )
    );

    echo '</nav>';
}
