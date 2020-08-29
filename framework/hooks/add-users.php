<?php 

add_action('wp_ajax_register_user_front_end', 'register_user_front_end', 0);
add_action('wp_ajax_nopriv_register_user_front_end', 'register_user_front_end');
function register_user_front_end() {
  
    $first_name = stripcslashes($_POST['first_name']);
	  $last_name  = stripcslashes($_POST['last_name']);
	  $email      = stripcslashes($_POST['email']);
    $password   = $_POST['password'];
    $mobile     = stripcslashes($_POST['mobile']);

    $explode    = explode("@", $email);
    $username   = $explode[0];

    $gender     = stripcslashes($_POST['gender']);
    $license    = stripcslashes($_POST['license']);
    $specialty  = stripcslashes($_POST['specialty']);
    $syndicate  = stripcslashes($_POST['syndicate']);
    $scientific = stripcslashes($_POST['scientific']);
    $role_user  = stripcslashes($_POST['role_user']);
    
	  $user_data = array(
      'first_name'    => $first_name,
      'last_name'     => $last_name,
      'user_login'    => $username,
      'user_email'    => $email,
      'user_pass'     => $password,
      'role'          => $role_user
    );

    $user_id = wp_insert_user($user_data);


	  	if (!is_wp_error($user_id)) {
        if($role_user = 'doctor') {
          update_user_meta( $user_id, 'phone_author',  $mobile);
          update_user_meta( $user_id, 'license',  $license);
          update_user_meta( $user_id, 'specialty',  $specialty);
          update_user_meta( $user_id, 'scientific', $scientific);
          update_user_meta( $user_id, 'syndicate',  $syndicate);
        }

        
        update_user_meta( $user_id, 'gender',  $gender);

        $output .= '<span class="user-created alert alert-success">we have Created an account for you. (will be reviewed and an email sent with approval or rejection)</span>';
        echo $output;
	  	} else {
	    	if (isset($user_id->errors['empty_user_login'])) {
	        $notice_key = '<span class="user-errors alert alert-danger">User Name and Email are mandatory</span>';
          echo $notice_key;
        } elseif (isset($user_id->errors['existing_user_login'])) {
          echo'<span class="user-errors alert alert-danger">User Email already exixts.</span>';
        } else {
          echo'<span class="user-errors alert alert-danger">Error Occured please fill up the sign up form carefully.</span>';
        }
	  	}
	die;
}
