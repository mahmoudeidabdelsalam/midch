<?php

// Register patients custom Post Type
function patients_post_type() {

    $labels = array(
        'name' => _x('Patients', 'Post Type General Name', 'builder-post-type'),
        'singular_name' => _x('Patients', 'Post Type Singular Name', 'builder-post-type'),
        'menu_name' => __('Patients', 'builder-post-type'),
        'parent_item_colon' => __('Parent Item:', 'builder-post-type'),
        'all_items' => __('All Patients', 'builder-post-type'),
        'view_item' => __('View Patient', 'builder-post-type'),
        'add_new_item' => __('Add New Patient', 'builder-post-type'),
        'add_new' => __('Add Patient', 'builder-post-type'),
        'edit_item' => __('Edit patient', 'builder-post-type'),
        'update_item' => __('Update patient', 'builder-post-type'),
        'search_items' => __('Search patient', 'builder-post-type'),
        'not_found' => __('Not found', 'builder-post-type'),
        'not_found_in_trash' => __('Not found in Trash', 'builder-post-type'),
    );
    
    $args = array(
        'labels' => $labels,
        'supports' => array('title','editor','revisions','thumbnail', 'custom-fields', 'author'),
        // 'taxonomies' => array(''),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-users',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
        'show_in_rest' => true,

    );
    register_post_type('patient', $args);
}

// Hook into the 'init' action
add_action('init', 'patients_post_type', 0);


// Register reports custom Post Type
function reports_post_type() {

    $labels = array(
        'name' => _x('reports', 'Post Type General Name', 'builder-post-type'),
        'singular_name' => _x('reports', 'Post Type Singular Name', 'builder-post-type'),
        'menu_name' => __('reports', 'builder-post-type'),
        'parent_item_colon' => __('Parent Item:', 'builder-post-type'),
        'all_items' => __('All reports', 'builder-post-type'),
        'view_item' => __('View report', 'builder-post-type'),
        'add_new_item' => __('Add New report', 'builder-post-type'),
        'add_new' => __('Add report', 'builder-post-type'),
        'edit_item' => __('Edit report', 'builder-post-type'),
        'update_item' => __('Update report', 'builder-post-type'),
        'search_items' => __('Search report', 'builder-post-type'),
        'not_found' => __('Not found', 'builder-post-type'),
        'not_found_in_trash' => __('Not found in Trash', 'builder-post-type'),
    );
    $args = array(
        'labels' => $labels,
        'supports' => array('title','editor','revisions','thumbnail', 'custom-fields'),
        // 'taxonomies' => array(''),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-format-aside',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
        'show_in_rest' => true,

    );
    register_post_type('report', $args);
}

// Hook into the 'init' action
add_action('init', 'reports_post_type', 0);


// Register medication custom Post Type
function medication_post_type() {

    $labels = array(
        'name' => _x('medication', 'Post Type General Name', 'builder-post-type'),
        'singular_name' => _x('medication', 'Post Type Singular Name', 'builder-post-type'),
        'menu_name' => __('medication', 'builder-post-type'),
        'parent_item_colon' => __('Parent Item:', 'builder-post-type'),
        'all_items' => __('All medication', 'builder-post-type'),
        'view_item' => __('View medication', 'builder-post-type'),
        'add_new_item' => __('Add New medication', 'builder-post-type'),
        'add_new' => __('Add medication', 'builder-post-type'),
        'edit_item' => __('Edit medication', 'builder-post-type'),
        'update_item' => __('Update medication', 'builder-post-type'),
        'search_items' => __('Search medication', 'builder-post-type'),
        'not_found' => __('Not found', 'builder-post-type'),
        'not_found_in_trash' => __('Not found in Trash', 'builder-post-type'),
    );
    $args = array(
        'labels' => $labels,
        'supports' => array('title','editor','revisions','thumbnail',),
        // 'taxonomies' => array(''),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-format-aside',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
        'show_in_rest' => true,

    );
    register_post_type('medication', $args);
}

// Hook into the 'init' action
add_action('init', 'medication_post_type', 0);

