<?php

/**
 * Get the current page url
 *
 * @return string
 */
function td_current_page_url()
{
    global $wp;
    $current_url = home_url(add_query_arg(array(), $wp->request));
    return $current_url;
}

/**
 * Is the given variable empty?
 *
 * @param mixed $element element to check
 *
 * @return boolean
 */
function is_element_empty($element)
{
    $element = trim($element);
    return !empty($element);
}

/**
 * Generate a unique token
 *
 * @param string $length Character length of token
 *
 * @return string
 */
function td_token($length = 128)
{
    return bin2hex(random_bytes($length));
}


/**
 * Get the current post ID (useful in ACF Blocks)
 *
 * @return int  ID of the current post
 */
function td_post_id()
{
    if (is_admin() && function_exists('acf_maybe_get_POST')) :
        return intval(acf_maybe_get_POST('post_id'));
    else :
        global $post;
        return $post->ID;
    endif;

    return -1;
}

/**
 * Get the link attributes from an ACF link field
 *
 * @param   array  $link  ACF Link data
 *
 * @return  array         Link data
 */
function td_get_link_attributes($link)
{
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';

    return [$link_url, $link_title, $link_target];
}