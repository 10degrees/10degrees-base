<?php
/**
 * 404 template
 *
 * @package      10degrees-base
 * @author       10 Degrees
 * @since        2.0.0
 * @license      GPL-2.0+
**/

get_template_part('partials/page', 'header');

if ($option_text = get_option('options_404_error_page_text')) :
    esc_html_e($option_text);
else :
    esc_html_e('Sorry, that page does not exist.', '@textdomain');
endif;

get_search_form();
