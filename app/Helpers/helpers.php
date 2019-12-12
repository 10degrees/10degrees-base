<?php

/**
 * Dump and Die variable or whatever
 *
 * @param $dump Variable to dump
 *
 * @return void
 */
function dd($dump)
{
    echo "<pre>";
    var_export($dump);
    echo "</pre>";
    die();
}

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
