<?php

namespace App\Boot;

 /**
  * Try your best not to use this too much. it is only for random FRONTEND
  * actions and filters that really don't belong anywhere else logically
  *
  * @category Theme
  * @package  TenDegrees/10degrees-base
  * @author   10 Degrees <wordpress@10degrees.uk>
  * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
  * @link     https://github.com/10degrees/10degrees-base
  * @since    2.0.0
  */
class Util
{
    /**
     * Constructor
     */
    public function __construct()
    {
        add_filter('get_search_form', [$this, 'setSearchTemplate']);
        add_filter('embed_oembed_html', [$this, 'wrapIframesInContainer'], 10, 3);
        add_filter('video_embed_html', [$this, 'wrapIframesInContainer']);//Jetpack
    }

    /**
     * Use searchform.php from the templates/ directory
     *
     * @param string $form A form
     *
     * @return string $form
     */
    public function setSearchTemplate($form)
    {
        $form = '';

        locate_template('/partials/searchform.php', true, false);
        
        return $form;
    }

    /**
     * Wrap embeds in a div to enable responsiveness
     *
     * @param string $html iFrame to be wrapped
     *
     * @return string $html iFrame in embed container
     */
    public function wrapIframesInContainer($html)
    {
        return '<div class="embed__container">' . $html . '</div>';
    }
}
