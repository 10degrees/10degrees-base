<?php

namespace App\ACF_Fields;

use App\Support\WordPress\FieldGroup;

/**
 * Login Settings
 *
 * Registers ACFs settings for Login
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class LoginSettings extends FieldGroup
{
    protected $fields = array(
        'key' => 'group_568cd509e664c',
        'title' => 'Login Settings',
        'fields' => array(
            array(
                'key' => 'field_568cd56d1e4ef',
                'label' => 'Enable Frontend Login?',
                'name' => 'enable_frontend_login',
                'type' => 'true_false',
                'instructions' => '',
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
            array(
                'key' => 'field_568cd524f81ca',
                'label' => 'Select Login Page',
                'name' => 'select_login_page',
                'type' => 'page_link',
                'instructions' => 'Select the page that has the [loginform] shortcode in it.',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_568cd56d1e4ef',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => 'page',
                ),
                'taxonomy' => array(
                ),
                'allow_null' => 0,
                'multiple' => 0,
                'allow_archives' => 1,
            ),
            array(
                'key' => 'field_568cd539f81cb',
                'label' => 'Select Protected Page',
                'name' => 'select_protected_page',
                'type' => 'page_link',
                'instructions' => 'Select the page which a client would be redirected to upon successful login.',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_568cd56d1e4ef',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => 'page',
                ),
                'taxonomy' => array(
                ),
                'allow_null' => 0,
                'multiple' => 0,
                'allow_archives' => 1,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-login-settings',
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
        'modified' => 1452071032,
    );
}
