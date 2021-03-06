<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_5decbbe610cf8',
        'title' => 'Title',
        'fields' => array(
            array(
                'key' => 'field_5decbde3b7de5',
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
            ),
            array(
                'key' => 'field_5df6740b45101',
                'label' => 'Heading',
                'name' => 'heading',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '33.333',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                    'h5' => 'H5',
                    'h6' => 'H6',
                ),
                'default_value' => array(
                ),
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),
            array(
                'key' => 'field_5decbdeeb7de6',
                'label' => 'Width',
                'name' => 'width',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '33.333',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'full' => 'Full Width',
                    'half' => 'Half Width',
                    'quarter' => 'Quarter Width',
                ),
                'default_value' => array(
                ),
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),
            array(
                'key' => 'field_5df6745045102',
                'label' => 'Color',
                'name' => 'color',
                'type' => 'color_picker',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '33.3333',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '#ffffff',
            ),
            array(
                'key' => 'field_5decbe82b7de8',
                'label' => 'Position',
                'name' => 'position',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '50',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'left' => 'Left',
                    'right' => 'Right',
                    'center' => 'Center',
                ),
                'default_value' => array(
                ),
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),
            array(
                'key' => 'field_5df6747545103',
                'label' => 'Rotate',
                'name' => 'rotate',
                'type' => 'number',
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
                'min' => '',
                'max' => '',
                'step' => '',
            ),
            array(
                'key' => 'field_5decbe48b7de7',
                'label' => 'Border',
                'name' => 'border',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '50',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'top' => 'Top',
                    'left' => 'Left',
                    'right' => 'Right',
                    'bottom' => 'Bottom',
                ),
                'default_value' => array(
                ),
                'allow_null' => 1,
                'multiple' => 1,
                'ui' => 1,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),
            array(
                'key' => 'field_5df674a545104',
                'label' => 'Border Style',
                'name' => 'border_style',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '50',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'dashed' => 'Dashed',
                    'solid' => 'Solid',
                    'dotted' => 'Dotted',
                    'double' => 'Double',
                ),
                'default_value' => array(
                ),
                'allow_null' => 1,
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
                    'value' => 'acf/title',
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
    ));
    
endif;
?>