<?php

/**
 * 404 template
 *
 * PHP version 7.2
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 **/
?>

<div class="wrapper">
    <?php
    get_template_part('partials/page', 'header');

    if ($option_text = get_option('options_404_error_page_text')) :
        esc_html_e($option_text);
    else :
        echo '<div>';
        esc_html_e('Sorry, that page does not exist.', '@textdomain');
        echo '</div>';
    endif;

    get_search_form();

    ?>
</div>