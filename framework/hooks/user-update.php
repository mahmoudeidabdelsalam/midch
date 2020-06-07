<?php
global $current_user, $wp_roles;

$current_user = wp_get_current_user();

if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {

  $error = array();

  if ( !empty($_POST['pass1'] ) && !empty( $_POST['pass2'] ) ) {
    if ( $_POST['pass1'] == $_POST['pass2'] ) {
      wp_update_user( array( 'ID' => $current_user->ID, 'user_pass' => esc_attr( $_POST['pass1'] ) ) );
    } else {
      $error[] = __('The passwords you entered do not match.  Your password was not updated.', 'profile');
    } 
  }

  if ( !empty( $_POST['email'] ) )
  update_user_meta( $current_user->ID, 'user_email', esc_attr( $_POST['email'] ) );
  if ( !empty( $_POST['full-name'] ) )
  wp_update_user( array ('ID' => $current_user->ID, 'display_name' => esc_attr( $_POST['full-name'] )));  

  // ACF updates
  if ( !empty( $_POST['acf']['field_5ed58ab07b46f'] ) )
  update_user_meta( $current_user->ID, 'banner_user', esc_attr( $_POST['acf']['field_5ed58ab07b46f'] ) );
  if ( !empty( $_POST['acf']['field_5ed58ad47b470'] ) )
  update_user_meta( $current_user->ID, 'address_user', esc_attr( $_POST['acf']['field_5ed58ad47b470'] ) );
  if ( !empty( $_POST['acf']['field_5412442142224421412412b7516c940c2'] ) )
  update_user_meta( $current_user->ID, 'phone_author', esc_attr( $_POST['acf']['field_5412442142224421412412b7516c940c2'] ) );

  if ( count($error) == 0 ) {
    //action hook for plugins and extra fields saving
    do_action('edit_user_profile_update', $current_user->ID);
    //do_action('edit_user_profile', $current_user->ID);
    wp_redirect( get_permalink() );
    //exit;
  }
}


add_action ( 'admin_enqueue_scripts', function () {
  wp_enqueue_media();
});