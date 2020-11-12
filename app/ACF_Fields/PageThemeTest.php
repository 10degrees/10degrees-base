<?php

namespace App\ACF_Fields;

use App\Support\WordPress\FieldGroup;

/**
 * Register an ACF Field Group
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class PageThemeTest extends FieldGroup
{
    protected $fields = array (
  'key' => 'group_5f10700209c19',
  'title' => 'Test',
  'fields' => 
  array (
    0 => 
    array (
      'key' => 'field_5f107007ca5ce',
      'label' => 'theme_colour_palette',
      'name' => 'theme_colour_palette',
      'type' => 'select',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => 
      array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'choices' => 
      array (
        'primary' => 'Primary',
        'secondary' => 'Secondary',
        'tertiary' => 'Tertiary',
        'white' => 'White',
        'body-text' => 'Body text',
      ),
      'default_value' => 'primary',
      'allow_null' => 0,
      'multiple' => 0,
      'ui' => 0,
      'return_format' => 'value',
      'ajax' => 0,
      'placeholder' => '',
    ),
  ),
  'location' => 
  array (
    0 => 
    array (
      0 => 
      array (
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'page',
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
