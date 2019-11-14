<?php 

namespace App\ACF_Fields;

use App\ACF_Fields\AbstractFieldRegistration;

class ProtectContent extends AbstractFieldRegistration
{
    /**
     * Register ACF fields for this group
     */
    public function register()
    {
        acf_add_local_field_group(array(
            'key' => 'group_568cd68d55ba9',
            'title' => 'Protect Content (Require Login)',
            'fields' => array(
                array(
                    'key' => 'field_568cd69d9da31',
                    'label' => 'Protect this content?',
                    'name' => 'protect_this_page',
                    'type' => 'true_false',
                    'instructions' => 'If client login is enabled then this will protect this content, requiring frontend login before viewing.',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'message' => '',
                    'default_value' => 0,
                    'ui' => 0,
                    'ui_on_text' => '',
                    'ui_off_text' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'post',
                    ),
                ),
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'page',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'side',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
            'modified' => 1452074528,
        ));
    }
}
