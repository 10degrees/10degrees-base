<?php

namespace App\Cpt;

/**
 * Registers testimonial CPT
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class Testimonials
{
    /**
     * Define the post type
     *
     * @var string
     */
    protected $postType = 'testimonial';

    /**
     * Define the plural title
     *
     * @var string
     */
    protected $plural = 'Testimonials';

    /**
     * Define the singular title
     *
     * @var string
     */
    protected $singular = 'Testimonial title';

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->register();
    }

    /**
     * Register the CPT using Johnbillions extened CPTs library
     *
     * @return void
     */
    public function register()
    {
        register_extended_post_type(
            $this->postType,
            [
                'enter_title_here' => $this->singular,
                'show_in_rest' => true,
                'quick_edit' => true,
                'supports' => [
                    'title',
                    'editor',
                ],
                'menu_icon' => 'dashicons-format-quote',
                'template' => array(
                    array(
                        'core/quote'
                    )
                ),
                'template_lock' => 'all',
                'admin_cols' => [
                    'post_date' => [
                        'title'      => __('Added', 'Date', $this->postType),
                        'post_field' => 'post_date',
                    ],
                    'post_modified' => [
                        'title'      => __('Last Changed', 'Date', $this->postType),
                        'post_field' => 'post_modified',
                    ],
                    'testimonial-categories' => [
                        'taxonomy' => 'testimonial-categories'
                    ],
                ],
                'admin_filters' => [
                    'testimonial-categories' => [
                        'title'    => 'Testimonal Category',
                        'taxonomy' => 'testimonial-categories',
                    ],
                ],
            ],
            [
                //Override the base names used for labels:
                'plural'   => $this->plural,
                'slug'     => 'testimonials',
            ]
        );

        register_extended_taxonomy(
            'testimonial-categories',
            $this->postType,
            [
                'meta_box' => 'radio'
            ],
            [
                'plural' => 'Testimonial Categories',
                'slug' => 'testimonial-categories'
            ]
        );
    }
}
