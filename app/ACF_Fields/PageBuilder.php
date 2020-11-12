<?php

namespace App\ACF_Fields;

use App\Support\WordPress\FieldGroup;

/**
 * Page builder
 *
 * Registers ACFs settings for the Page Builder
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class PageBuilder extends FieldGroup
{
    protected $fields = array(
        'key' => 'group_56054cb459ca7',
        'title' => 'Page Builder',
        'fields' => array(
            array(
                'key' => 'field_56054cc38153b',
                'label' => 'Page builder',
                'name' => 'page_builder',
                'type' => 'flexible_content',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'button_label' => 'Add section',
                'min' => '',
                'max' => '',
                'layouts' => array(
                    array(
                        'key' => '56054cc7ca9b9',
                        'name' => 'one_column',
                        'label' => 'One column',
                        'display' => 'row',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_56054d048153c',
                                'label' => 'WYSIWYG editor',
                                'name' => 'wysiwyg_editor',
                                'type' => 'wysiwyg',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'tabs' => 'all',
                                'toolbar' => 'full',
                                'media_upload' => 1,
                                'delay' => 0,
                            ),
                        ),
                        'min' => '',
                        'max' => '',
                    ),
                    array(
                        'key' => '56054d118153d',
                        'name' => 'two_column',
                        'label' => 'Two columns',
                        'display' => 'row',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_582d81582f148',
                                'label' => 'Column Widths',
                                'name' => 'column_widths',
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
                                    '50 / 50' => '50 / 50',
                                    '25 / 75' => '25 / 75',
                                    '75 / 25' => '75 / 25',
                                    '33 / 66' => '33 / 66',
                                    '66 / 33' => '66 / 33',
                                ),
                                'default_value' => array(
                                ),
                                'allow_null' => 0,
                                'multiple' => 0,
                                'ui' => 0,
                                'ajax' => 0,
                                'return_format' => 'value',
                                'placeholder' => '',
                            ),
                            array(
                                'key' => 'field_56054d118153e',
                                'label' => 'WYSIWYG editor',
                                'name' => 'wysiwyg_editor',
                                'type' => 'wysiwyg',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'tabs' => 'all',
                                'toolbar' => 'full',
                                'media_upload' => 1,
                                'delay' => 0,
                            ),
                            array(
                                'key' => 'field_56054d198153f',
                                'label' => 'WYSIWYG editor',
                                'name' => 'wysiwyg_editor_two',
                                'type' => 'wysiwyg',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'tabs' => 'all',
                                'toolbar' => 'full',
                                'media_upload' => 1,
                                'delay' => 0,
                            ),
                        ),
                        'min' => '',
                        'max' => '',
                    ),
                    array(
                        'key' => '56054d4881540',
                        'name' => 'three_column',
                        'label' => 'Three columns',
                        'display' => 'row',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_56054d4881541',
                                'label' => 'WYSIWYG editor',
                                'name' => 'wysiwyg_editor',
                                'type' => 'wysiwyg',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'tabs' => 'all',
                                'toolbar' => 'full',
                                'media_upload' => 1,
                                'delay' => 0,
                            ),
                            array(
                                'key' => 'field_56054d4881542',
                                'label' => 'WYSIWYG editor',
                                'name' => 'wysiwyg_editor_two',
                                'type' => 'wysiwyg',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'tabs' => 'all',
                                'toolbar' => 'full',
                                'media_upload' => 1,
                                'delay' => 0,
                            ),
                            array(
                                'key' => 'field_56054d573cb82',
                                'label' => 'WYSIWYG editor',
                                'name' => 'wysiwyg_editor_three',
                                'type' => 'wysiwyg',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'tabs' => 'all',
                                'toolbar' => 'full',
                                'media_upload' => 1,
                                'delay' => 0,
                            ),
                        ),
                        'min' => '',
                        'max' => '',
                    ),
                    array(
                        'key' => '56054d68e251a',
                        'name' => 'four_column',
                        'label' => 'Four columns',
                        'display' => 'row',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_56054d68e251b',
                                'label' => 'WYSIWYG editor',
                                'name' => 'wysiwyg_editor',
                                'type' => 'wysiwyg',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'tabs' => 'all',
                                'toolbar' => 'full',
                                'media_upload' => 1,
                                'delay' => 0,
                            ),
                            array(
                                'key' => 'field_56054d68e251c',
                                'label' => 'WYSIWYG editor',
                                'name' => 'wysiwyg_editor_two',
                                'type' => 'wysiwyg',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'tabs' => 'all',
                                'toolbar' => 'full',
                                'media_upload' => 1,
                                'delay' => 0,
                            ),
                            array(
                                'key' => 'field_56054d68e251d',
                                'label' => 'WYSIWYG editor',
                                'name' => 'wysiwyg_editor_three',
                                'type' => 'wysiwyg',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'tabs' => 'all',
                                'toolbar' => 'full',
                                'media_upload' => 1,
                                'delay' => 0,
                            ),
                            array(
                                'key' => 'field_56054d74e251e',
                                'label' => 'WYSIWYG editor',
                                'name' => 'wysiwyg_editor_four',
                                'type' => 'wysiwyg',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'tabs' => 'all',
                                'toolbar' => 'full',
                                'media_upload' => 1,
                                'delay' => 0,
                            ),
                        ),
                        'min' => '',
                        'max' => '',
                    ),
                    array(
                        'key' => '56054e13b5a52',
                        'name' => 'accordion',
                        'label' => 'Accordion',
                        'display' => 'row',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_580f39f69f0ba',
                                'label' => 'Accordion Section Title',
                                'name' => 'accordion_section_title',
                                'type' => 'text',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'maxlength' => '',
                            ),
                            array(
                                'key' => 'field_5605603b0f68b',
                                'label' => 'Accordion item',
                                'name' => 'accordion_item',
                                'type' => 'repeater',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'min' => 0,
                                'max' => 0,
                                'layout' => 'block',
                                'button_label' => 'Add accordion item',
                                'collapsed' => '',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_56054e1bb5a53',
                                        'label' => 'Title',
                                        'name' => 'title',
                                        'type' => 'text',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'default_value' => '',
                                        'placeholder' => '',
                                        'prepend' => '',
                                        'append' => '',
                                        'maxlength' => '',
                                        'readonly' => 0,
                                        'disabled' => 0,
                                    ),
                                    array(
                                        'key' => 'field_56054e20b5a54',
                                        'label' => 'Content',
                                        'name' => 'content',
                                        'type' => 'wysiwyg',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'default_value' => '',
                                        'tabs' => 'all',
                                        'toolbar' => 'full',
                                        'media_upload' => 1,
                                        'delay' => 0,
                                    ),
                                ),
                            ),
                        ),
                        'min' => '',
                        'max' => '',
                    ),
                    array(
                        'key' => '568ce663e1e33',
                        'name' => 'slideshow',
                        'label' => 'Slideshow',
                        'display' => 'row',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_568ce663e1e34',
                                'label' => 'Images',
                                'name' => 'images',
                                'type' => 'gallery',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'min' => '',
                                'max' => '',
                                'insert' => 'append',
                                'library' => 'all',
                                'min_width' => '',
                                'min_height' => '',
                                'min_size' => '',
                                'max_width' => '',
                                'max_height' => '',
                                'max_size' => '',
                                'mime_types' => '',
                                'return_format' => 'array',
                                'preview_size' => 'medium',
                            ),
                        ),
                        'min' => '',
                        'max' => '',
                    ),
                    array(
                        'key' => '5626355d563c6',
                        'name' => 'call_to_action',
                        'label' => 'Call to Action',
                        'display' => 'row',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_56263581563c9',
                                'label' => 'Call to Action Text',
                                'name' => 'call_to_action_text',
                                'type' => 'text',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'maxlength' => '',
                                'readonly' => 0,
                                'disabled' => 0,
                            ),
                            array(
                                'key' => 'field_56263586563ca',
                                'label' => 'Call to Action URL',
                                'name' => 'call_to_action_url',
                                'type' => 'url',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '50',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'placeholder' => '',
                            ),
                            array(
                                'key' => 'field_580f70f6bfb0b',
                                'label' => 'Call to Action Button Text',
                                'name' => 'call_to_action_button_text',
                                'type' => 'text',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '50',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'maxlength' => '',
                            ),
                        ),
                        'min' => '',
                        'max' => '',
                    ),
                    array(
                        'key' => '562636aae89bf',
                        'name' => 'form_embed',
                        'label' => 'Form embed',
                        'display' => 'row',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_580f6eb114145',
                                'label' => 'Form title',
                                'name' => 'form_title',
                                'type' => 'text',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'maxlength' => '',
                            ),
                            array(
                                'key' => 'field_562636afe89c0',
                                'label' => 'Gravity Form Shortcode',
                                'name' => 'gravity_form_shortcode',
                                'type' => 'text',
                                'instructions' => 'Paste gravity form shortcode here.',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'maxlength' => '',
                            ),
                        ),
                        'min' => '',
                        'max' => '',
                    ),
                    array(
                        'key' => '580f42bd68536',
                        'name' => 'testimonial_slider',
                        'label' => 'Testimonial Slider',
                        'display' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_580f42cc68537',
                                'label' => 'Choose which category you would like to display',
                                'name' => 'choose_which_category_you_would_like_to_display',
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
                            array(
                                'key' => 'field_580f437b68538',
                                'label' => 'Max number of testimonials to show',
                                'name' => 'max_number_of_testimonials_to_show',
                                'type' => 'number',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'min' => '',
                                'max' => '',
                                'step' => '',
                            ),
                        ),
                        'min' => '',
                        'max' => '',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_template',
                    'operator' => '==',
                    'value' => 'page-templates/template-custom.php',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => array(
            0 => 'the_content',
        ),
        'active' => true,
        'description' => '',
        'modified' => 1546601477,
    );
}
