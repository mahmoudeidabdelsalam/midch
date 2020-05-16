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