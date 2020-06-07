<?php
if( function_exists('acf_add_options_page') ) {
	acf_add_options_sub_page(array(
		'page_title' 	=> 'General Settings',
		'menu_title'	=> 'General Settings',
		'menu_slug' 	=> 'general-settings',
		'parent_slug'	=> 'index.php',
		'icon_url' 		=> 'dashicons-welcome-widgets-menus',
		'position' => 1,
		'redirect'		=> false
	));
}

if( function_exists('acf_add_local_field_group') ):
	acf_add_local_field_group(array (
		'key' => 'group_584e713b4c10f',
		'title' => 'General Settings',
		'fields' => array (
			array (
				'return_format' => 'array',
				'preview_size' => 'thumbnail',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
				'key' => 'field_584e7155a3f1a',
				'label' => 'Main Website Logo',
				'name' => 'website_logo',
				'type' => 'image',
				'instructions' => 'this image we will used it in all website like (header, login screen, sharing, .... )',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '33.3333',
					'class' => '',
					'id' => '',
				),
			),
			array (
				'return_format' => 'array',
				'preview_size' => 'thumbnail',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
				'key' => 'field_584e716ca3f1b',
				'label' => 'white website Logo',
				'name' => 'white_website_logo',
				'type' => 'image',
				'instructions' => 'this image we will used it in anyplace have black background',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '33.3333',
					'class' => '',
					'id' => '',
				),
			),
			array (
				'return_format' => 'array',
				'preview_size' => 'thumbnail',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
				'key' => 'field_584fd68654956',
				'label' => 'Default Image',
				'name' => 'default_image',
				'type' => 'image',
				'instructions' => 'we can used this Default Image for the any pics didn\'t load or empty images',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '33.3333',
					'class' => '',
					'id' => '',
				),
      ),
      array(
        'key' => 'field_5ed57057b3eae',
        'label' => 'profile link',
        'name' => 'profile_link',
        'type' => 'page_link',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'post_type' => array(
          0 => 'page',
        ),
        'taxonomy' => '',
        'allow_null' => 0,
        'allow_archives' => 0,
        'multiple' => 0,
      ),
			array (
				'message' => 'You can from here mange you login screen options like background color or images',
				'esc_html' => 0,
				'new_lines' => '',
				'key' => 'field_584e73ad29048',
				'label' => 'Login Screen Settings',
				'name' => '',
				'type' => 'message',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
			),
			array (
				'layout' => 'horizontal',
				'choices' => array (
					'background-image' => 'Background Image',
					'background-color' => 'Background Color',
				),
				'default_value' => '',
				'other_choice' => 0,
				'save_other_choice' => 0,
				'allow_null' => 0,
				'return_format' => 'value',
				'key' => 'field_584e740496708',
				'label' => 'Select you design',
				'name' => 'select_you_design',
				'type' => 'radio',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '33.333',
					'class' => '',
					'id' => '',
				),
			),
			array (
				'default_value' => '#999999',
				'key' => 'field_584e7481838ad',
				'label' => 'Select you Color',
				'name' => 'select_you_color',
				'type' => 'color_picker',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array (
					array (
						array (
							'field' => 'field_584e740496708',
							'operator' => '==',
							'value' => 'background-color',
						),
					),
				),
				'wrapper' => array (
					'width' => '33.333',
					'class' => '',
					'id' => '',
				),
			),
			array (
				'return_format' => 'array',
				'preview_size' => 'thumbnail',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
				'key' => 'field_584e74b7838ae',
				'label' => 'Upload you Image',
				'name' => 'upload_you_image',
				'type' => 'image',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array (
					array (
						array (
							'field' => 'field_584e740496708',
							'operator' => '==',
							'value' => 'background-image',
						),
					),
				),
				'wrapper' => array (
					'width' => '33.333',
					'class' => '',
					'id' => '',
				),
			),
			array (
				'default_value' => 900,
				'min' => '',
				'max' => '',
				'step' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'key' => 'field_584eb5590f2c8',
				'label' => 'Time For Publish Scheduled Interval',
				'name' => 'count_scheduled',
				'type' => 'number',
				'instructions' => 'Add transient for schedule post intervals by Second',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '33.333',
					'class' => '',
					'id' => '',
				),
			),
			array (
				'message' => 'You can from here mange you Social network icons options like facebook, twitter, linkedin',
				'esc_html' => 0,
				'new_lines' => 'wpautop',
				'key' => 'field_584fc377c232e',
				'label' => 'Social Network icons',
				'name' => '',
				'type' => 'message',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
			),
			array (
				'key' => 'field_5a818d5a8a2da',
				'label' => 'Select The icon',
				'name' => 'social_networks',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => '',
				'min' => 0,
				'max' => 0,
				'layout' => 'table',
				'button_label' => 'Add Network',
				'sub_fields' => array(
					array(
						'key' => 'field_5a81933281626',
						'label' => 'Name',
						'name' => 'icon_name',
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
					array(
						'key' => 'field_5a81934881627',
						'label' => 'Image',
						'name' => 'icon_image',
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
							'facebook' => '<i class="fa fa-facebook fa-fw"></i>',
							'twitter' => '<i class="fa fa-twitter fa-fw"></i>',
							'linkedin' => '<i class="fa fa-linkedin fa-fw"></i>',
							'youtube' => '<i class="fa fa-youtube fa-fw"></i>',
							'instgram' => '<i class="fa fa-instagram fa-fw"></i>',
						),
						'allow_null' => 0,
						'other_choice' => 0,
						'save_other_choice' => 0,
						'default_value' => '',
						'layout' => 'horizontal',
						'return_format' => 'value',
					),
				),
			),
			array (
				'message' => 'You can from here manage the Contact Settings',
				'esc_html' => 0,
				'new_lines' => 'wpautop',
				'key' => 'field_5843fd7cce09d4',
				'label' => 'Contact Settings',
				'name' => '',
				'type' => 'message',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
			),

			array (
				'default_value' => '',
				'new_lines' => '',
				'maxlength' => '',
				'placeholder' => '',
				'rows' => '',
				'key' => 'field_584fd7sff8e09d5',
				'label' => 'Phone',
				'name' => 'website_phone',
				'type' => 'text',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '33.333',
					'class' => '',
					'id' => '',
				),
			),
			array (
				'default_value' => '',
				'new_lines' => '',
				'maxlength' => '',
				'placeholder' => '',
				'rows' => '',
				'key' => 'field_584fd7sffwe8e09d5',
				'label' => 'Email',
				'name' => 'website_email',
				'type' => 'text',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '33.333',
					'class' => '',
					'id' => '',
				),
			),
			array (
				'default_value' => '',
				'new_lines' => '',
				'maxlength' => '',
				'placeholder' => '',
				'rows' => '',
				'key' => 'field_584fd7sff8re09d5',
				'label' => 'Address',
				'name' => 'website_address',
				'type' => 'text',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '33.333',
					'class' => '',
					'id' => '',
				),
			),
			array (
				'message' => 'You can from here manage the header and footer scripts',
				'esc_html' => 0,
				'new_lines' => 'wpautop',
				'key' => 'field_584fd7cce09d4',
				'label' => 'Scripts Settings',
				'name' => '',
				'type' => 'message',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
			),
			array (
				'default_value' => '',
				'new_lines' => '',
				'maxlength' => '',
				'placeholder' => '',
				'rows' => '',
				'key' => 'field_584fd7f8e09d5',
				'label' => 'Header Scripts',
				'name' => 'header_scripts',
				'type' => 'textarea',
				'instructions' => 'Add any script you need show it in website header',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '50',
					'class' => '',
					'id' => '',
				),
			),
			array (
				'default_value' => '',
				'new_lines' => '',
				'maxlength' => '',
				'placeholder' => '',
				'rows' => '',
				'key' => 'field_584fd80de09d6',
				'label' => 'Footer Scripts',
				'name' => 'footer_scripts',
				'type' => 'textarea',
				'instructions' => 'Add any script you need show it in website footer',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '50',
					'class' => '',
					'id' => '',
				),
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'general-settings',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	));

endif;
