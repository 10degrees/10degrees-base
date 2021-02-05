<?php

namespace App\Acf\Fields;

use App\Acf\Fields\AbstractFieldRegistration;

/**
 * Testimonials
 *
 * Add ACF fields for testimonials
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class Testimonials extends AbstractFieldRegistration
{
    protected $fields = array(
        'key' => 'block-testimonials',
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
    );
}
