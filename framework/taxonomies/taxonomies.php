<?php 
// Register Custom Taxonomy
function country_categories() {

    $labels = array(
        'name' => 'Countries',
        'singular_name' => 'Countries',
        'menu_name' => 'Countries',
        'all_items' => 'All countries',
        'parent_item' => 'Parent Country',
        'parent_item_colon' => 'Parent Country:',
        'new_item_name' => 'New Item Country',
        'add_new_item' => 'Add New Country',
        'edit_item' => 'Edit Country',
        'update_item' => 'Update Country',
        'separate_items_with_commas' => 'Separate items with commas',
        'search_items' => 'Search Countries',
        'add_or_remove_items' => 'Add or remove Country',
        'choose_from_most_used' => 'Choose from the most used Countries',
        'not_found' => 'Not Found',
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'show_in_rest'=>true,

    );
    register_taxonomy('country', array('post','patient'), $args);
}

// Hook into the 'init' action
add_action('init', 'country_categories', 0);

// Register medication Taxonomy
function medication_categories() {

    $labels = array(
        'name' => 'categories',
        'singular_name' => 'categories',
        'menu_name' => 'categories',
        'all_items' => 'All categories',
        'parent_item' => 'Parent category',
        'parent_item_colon' => 'Parent category:',
        'new_item_name' => 'New Item category',
        'add_new_item' => 'Add New category',
        'edit_item' => 'Edit category',
        'update_item' => 'Update category',
        'separate_items_with_commas' => 'Separate items with commas',
        'search_items' => 'Search category',
        'add_or_remove_items' => 'Add or remove category',
        'choose_from_most_used' => 'Choose from the most used category',
        'not_found' => 'Not Found',
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'show_in_rest'=>true,

    );
    register_taxonomy('category-medication', array('medication'), $args);
}

// Hook into the 'init' action
add_action('init', 'medication_categories', 0);