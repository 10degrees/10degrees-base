<?php

/**
 * Load a view and pass variables into it
 *
 * To ouput a view you would want to echo it
 * 
 * @param  string $fileName excluding file extension
 * @param  array  $vars
 * @return string
 */
function td_view($fileName, $vars = array()) {

    foreach ($vars as $key => $value) {
        
        ${$key} = $value;

    }

    ob_start();

    include( get_template_directory() . '/' .$fileName . '.php');

    return ob_get_clean();

}