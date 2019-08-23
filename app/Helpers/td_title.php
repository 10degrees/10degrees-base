<?php
/**
* Page titles
*/
function td_title() {

	if ( is_home() ) {

		if ( get_option( 'page_for_posts', true ) ) {
			return get_the_title( get_option( 'page_for_posts', true ) );

		} else {
			return __( 'Latest Posts', '@textdomain' );
		}
	// }  elseif ( is_post_type_archive( 'career' ) ) {
	// 	return __( 'Careers', '@textdomain' );

	} elseif ( is_archive() ) {

		// https://github.com/roots/roots/pull/1235/files
		//        $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
		//
		//        if ($term) {
		//            return apply_filters('single_term_title', $term->name);
		//
		//        } elseif (is_post_type_archive()) {
		//
		//            return apply_filters('the_title', get_queried_object()->labels->name);
		//
		//        } elseif (is_day()) {
		//
		//            return sprintf(__('Daily Archives: %s', '@textdomain'), get_the_date());
		//
		//        } elseif (is_month()) {
		//
		//            return sprintf(__('Monthly Archives: %s', '@textdomain'), get_the_date('F Y'));
		//
		//        } elseif (is_year()) {
		//
		//            return sprintf(__('Yearly Archives: %s', '@textdomain'), get_the_date('Y'));
		//
		//        } elseif (is_author()) {
		//
		//            $author = get_queried_object();
		//            return sprintf(__('Author Archives: %s', '@textdomain'), apply_filters('the_author', is_object($author) ? $author->display_name : null));
		//
		//        } else {
		//
		//            return single_cat_title('', false);
		//
		//        }
		return get_the_archive_title();

	} elseif ( is_search() ) {
		return sprintf( __( 'Search Results for %s', '@textdomain' ), get_search_query() );

	} elseif ( is_404() ) {
		return __( 'Page Not Found', '@textdomain' );

	} else {
		return get_the_title();

	}
}
