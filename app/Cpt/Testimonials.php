<?php

namespace App\Cpt;

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
    protected $singular = 'Testimonial';

    public function __construct()
    {
        $this->register();
    }

    public function register()
    {
        register_extended_post_type(
            $this->postType,
            [
                'enter_title_here' => $this->singular,
                'show_in_rest' => true,
                'quick_edit' => true,
                'menu_icon' => 'dashicons-businessman',
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
                # Override the base names used for labels:
                'plural'   => $this->plural,
                'slug'     => 'testimonials',
            ]
        );

        register_extended_taxonomy(
            'testimonial-categories',
            $this->postType,
            [],
            [
                'plural' => 'Testimonial Categories',
                'slug' => 'testimonial-categories'
            ]
        );
    }
}
