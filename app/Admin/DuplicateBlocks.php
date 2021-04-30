<?php

namespace App\Admin;

/**
 * Add duplicate blocks to Yoast Duplicate Post
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class DuplicateBlocks
{
    /**
     * Constructor
     */
    public function __construct()
    {
        add_filter('duplicate_post_enabled_post_types', [$this, 'duplicateBlocks']);
    }

     /**
      * Enable duplication of Blocks
      *
      * @param array $enabled_post_types The array of post type names for which the plugin is enabled.
      *
      * @return array The filtered array of post types names.
      */
    public function duplicateBlocks($enabled_post_types)
    {
        $enabled_post_types[] = 'wp_block';
        return $enabled_post_types;
    }
}