<?php 

namespace App\ACF_Fields;

class Testimonial
{
    public function __construct()
    {
        $this->addFields();
    }

    public function addFields()
    {
        if (function_exists('acf_add_local_field_group')) {
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
}
