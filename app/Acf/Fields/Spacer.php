<?php

namespace App\Acf\Fields;

use App\Support\Acf\Field;

/**
 * Spacer
 *
 * Add ACF fields
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class Spacer extends Field
{
    /**
     * The field group exported from ACF
     *
     * @var array
     */
    protected $fields = array(
        'key' => 'group_60ba3d7c64880',
        'title' => 'Block: Spacer',
        'fields' => array(
            array(
                'key' => 'field_60ba3d80aaed4',
                'label' => 'Size',
                'name' => 'size',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'small' => 'Small',
                    'medium' => 'Medium',
                    'large' => 'Large',
                ),
                'default_value' => false,
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/spacer',
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
    );
}
