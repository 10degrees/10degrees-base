<?php

namespace App\ACF_Fields;

use App\ACF_Fields\AbstractFieldRegistration;

class Testimonials extends AbstractFieldRegistration
{
    /**
     * Register ACF fields for this group
     */
    public function register()
    {
        acf_add_local_field_group(array(
            'key' => 'group_5c2f476d08b99',
            'title' => 'Block: Testimonials',
            'fields' => array(
                array(
                    'key' => 'field_5dcd6f4d6c883',
                    'label' => 'Number of Testimonials',
                    'name' => 'number_of_testimonials',
                    'type' => 'number',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => 1,
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'min' => 1,
                    'max' => 30,
                    'step' => 1,
                ),
                array(
                    'key' => 'field_5dcd6f836c884',
                    'label' => 'Category',
                    'name' => 'category',
                    'type' => 'taxonomy',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'taxonomy' => 'testimonial-categories',
                    'field_type' => 'select',
                    'allow_null' => 1,
                    'add_term' => 0,
                    'save_terms' => 0,
                    'load_terms' => 0,
                    'return_format' => 'object',
                    'multiple' => 0,
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'block',
                        'operator' => '==',
                        'value' => 'acf/testimonials',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
            'modified' => 1546604206,
        ));
    }
}
