<?php

add_action( 'init', 'process_user_roles' );

function process_user_roles(){
  global $wp_roles;

  if( is_admin() && !empty( $_GET['page'] ) && $_GET['page'] == 'activate_roles') {
    $current_user = wp_get_current_user();
    $roles = $current_user->roles;
    if(!in_array('administrator', $roles)) return;

    $roles = ['administrator'];
    foreach ($roles as $role) {
        $role = get_role($role);
    }

    /************************* products **************************/
    remove_role('syndicate');
    remove_role('doctor');
    remove_role('patient');

    add_role('doctor', __('doctor','theme'), []);
    add_role('syndicate', __('syndicate','theme'), []);
    add_role('patient', __('patient','theme'), []);

    $capabilities = get_role( 'editor' )->capabilities;

    
   
    $roles = ['doctor', 'syndicate', 'patient', 'administrator'];
    foreach ($roles as $role) {
      $role = get_role($role);
      $role->add_cap('read');
      foreach ($capabilities as $key => $cap) {
        $role->add_cap($key);
      }
 
    }

    echo "Roles Proceed Succesfully";
    die();
    return;
  }
}





$user = wp_get_current_user();
$allowed_roles = array('doctor', 'syndicate', 'patient');
if( array_intersect($allowed_roles, $user->roles ) ) {  
  function remove_menus() {
    remove_menu_page( 'index.php' );                  //Dashboard                 //Jetpack* 
    remove_menu_page( 'edit.php' );                   //Posts
    remove_menu_page( 'upload.php' );                 //Media
    remove_menu_page( 'edit.php?post_type=page' );    //Pages
    remove_menu_page( 'edit-comments.php' );          //Comments
    remove_menu_page( 'themes.php' );                 //Appearance
    remove_menu_page( 'plugins.php' );                //Plugins
    remove_menu_page( 'users.php' );                  //Users
    remove_menu_page( 'tools.php' );                  //Tools
    remove_menu_page( 'options-general.php' );        //Settings
    remove_menu_page( 'edit-tags.php?taxonomy=category' );        //Settings
    remove_menu_page( 'edit-tags.php?taxonomy=post_tag' );        //Settings
    remove_menu_page('woocommerce');  
  }
  add_action( 'admin_menu', 'remove_menus' );
 }
