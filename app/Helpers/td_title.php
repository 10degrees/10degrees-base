<?php
/**
 * Page titles
 * 
 * @link https://github.com/roots/roots/pull/1235/files
 * 
 * @return string $title The page title
 */
function td_title()
{
    if (is_home()) {
        if (get_option('page_for_posts', true)) {
            return get_the_title(get_option('page_for_posts', true));
        } else {
            return __('Latest Posts', '@textdomain');
        }
    } elseif (is_archive()) {
        return get_the_archive_title();
    } elseif (is_search()) {
        return sprintf(__('Search Results for %s', '@textdomain'), get_search_query());
    } elseif (is_404()) {
        return __('Page Not Found', '@textdomain');
    } else {
        return get_the_title();
    }
}
