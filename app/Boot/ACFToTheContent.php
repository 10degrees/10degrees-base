<?php

namespace App\Boot;

/**
 * Adds a filter that places the Page Builder into the_content, so
 * that plugins which use the_content (WooCommerce, MemberPress,
 * etc) won't need template overrides.
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class ACFToTheContent
{
    /**
     * Constructor
     */
    public function __construct()
    {
        add_filter('the_content', [$this, 'addPageBuilderToTheContent'], 99);
    }

    /**
     * Adds page builder content to main content
     *
     * @param mixed $content Pagebuilder content
     *
     * @return void
     */
    public function addPageBuilderToTheContent($content)
    {

        ob_start();

        get_template_part('partials/content', 'page-builder');

        $content .= ob_get_clean();

        return $content;
    }
}
