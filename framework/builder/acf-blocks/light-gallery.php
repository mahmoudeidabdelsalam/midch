<?php 
if( function_exists('acf_add_local_field_group') ):

  acf_add_local_field_group(array(
    'key' => 'group_5df681e8f0607',
    'title' => 'Light Gallery',
    'fields' => array(
      array(
        'key' => 'field_5df6823550d36',
        'label' => 'Type',
        'name' => 'type',
        'type' => 'radio',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'choices' => array(
          'slider' => 'Slider',
          'grid' => 'Grid',
        ),
        'allow_null' => 0,
        'other_choice' => 0,
        'default_value' => '',
        'layout' => 'horizontal',
        'return_format' => 'value',
        'save_other_choice' => 0,
      ),
      array(
        'key' => 'field_5df6820c50d35',
        'label' => 'Gallery',
        'name' => 'gallery',
        'type' => 'gallery',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'return_format' => 'array',
        'preview_size' => 'medium',
        'insert' => 'append',
        'library' => 'all',
        'min' => '',
        'max' => '',
        'min_width' => '',
        'min_height' => '',
        'min_size' => '',
        'max_width' => '',
        'max_height' => '',
        'max_size' => '',
        'mime_types' => '',
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'block',
          'operator' => '==',
          'value' => 'acf/light-gallery',
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