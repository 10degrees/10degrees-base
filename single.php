<?php
/**
 * Single template
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

while (have_posts()) :
    the_post();
    get_template_part('partials/content', 'single');
    get_template_part('partials/comments');
endwhile;
