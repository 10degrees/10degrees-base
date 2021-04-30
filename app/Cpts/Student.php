<?php

namespace App\Cpts;

use App\Support\WordPress\Cpt;

/**
 * Register a custom post type
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class Student extends Cpt
{
    /**
     * Define the post type
     *
     * @var string
     */
    protected $postType = 'student';

    /**
     * Define the plural title
     *
     * @var string
     */
    protected $plural = 'Students';

    /**
     * Define the singular title
     *
     * @var string
     */
    protected $singular = 'Student';

    /**
     * Register the post type
     *
     * @return void
     */
    public function registerPostType()
    {
        // see https://github.com/johnbillion/extended-cpts/wiki for more options
        register_extended_post_type(
            $this->postType,
            [
                'enter_title_here'  => $this->singular,
                'quick_edit'        => true,
                'public'            => true,
                'hierarchical'      => false,
                'show_ui'           => true,
                'show_in_nav_menus' => true,
                'supports'          => ['title', 'editor'],
                'has_archive'       => true,
                'rewrite'           => true,
                'query_var'         => true,
                'menu_position'     => null,
                'menu_icon'         => 'dashicons-superhero',
                'show_in_rest'      => true,
                'rest_base'         => $this->singular,

                'admin_cols' => [
                    'student-category' => [
                        'taxonomy' => 'student-category',
                    ],
                    'post_date' => [
                        'title'      => __('Added', 'Date'),
                        'post_field' => 'post_date',
                    ],
                    'post_modified' => [
                        'title'      => __('Last Changed', 'Date'),
                        'post_field' => 'post_modified',
                    ],
                ],
                'admin_filters' => [
                    'student-category' => [
                        'title'    => 'Category',
                        'taxonomy' => 'student-category',
                    ],
                ],
            ],
            [
                'singular' => $this->singular,
                'plural'   => $this->plural,
                'slug'     => $this->postType,
            ]
        );
    }

    /**
     * Register the post taxonomies
     *
     * @return void
     */
    public function registerTaxonomies()
    {
        // see https://github.com/johnbillion/extended-cpts/wiki for more options
        register_extended_taxonomy(
            'student-category',
            $this->postType,
            [
                'public'           => true,
                'show_ui'          => true,
                'hierarchical'     => true,
                'query_var'        => true,
                'exclusive'        => false,
                'allow_hierarchy'  => false,
                'meta_box'         => null,
                'dashboard_glance' => false,
                'checked_ontop'    => null,
                'admin_cols'       => null,
                'required'         => false,
            ],
            [
                'singular' => 'Category',
                'plural'   => 'Categories',
                'slug'     => 'student-category',
            ]
        );
    }
}
