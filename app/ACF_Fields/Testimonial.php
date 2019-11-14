<?php

namespace App\ACF_Fields;

use App\ACF_Fields\AbstractFieldRegistration;

class Testimonial extends AbstractFieldRegistration
{
    /**
     * Register ACF fields for this group
     */
    public function register()
    {
        acf_add_local_field_group(array(
            'key' => 'group_5c2f476d08b99',
            'title' => 'Block: Testimonial',
            'fields' => array(
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'block',
                        'operator' => '==',
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
