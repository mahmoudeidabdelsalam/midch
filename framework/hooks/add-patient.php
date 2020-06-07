<?php 
add_action('wp_ajax_nopriv_get_add_patient', 'add_patient');
add_action('wp_ajax_get_add_patient', 'add_patient');

function add_patient() {

    global $current_user;
    wp_get_current_user();

    $title = $_POST["title"];
    $national_id = $_POST["national_id"];
    $country = $_POST["country"];
    $date_of_birth = $_POST["date_of_birth"];
    $gender = $_POST["gender"];
    $blood_type = $_POST["blood_type"];
    $mobile = $_POST["mobile"];
    $email = $_POST["email"];
    $nid_copy = $_POST["nid_copy"];

    

    $args = array(
      'post_type' => 'patient',
      'posts_per_page' => -1,
    );

    $posts = get_posts($args);
    $check = [];
    foreach ($posts as $post) {
      $check[] = get_field('national_id', $post->ID);
    }

    if (in_array($national_id, $check)) {

      echo "National ID Already exists (Try searching for it)";

    } else {

      if($nid_copy) {
        $copy = wp_get_attachment_image_url($nid_copy);
      } else {
        $copy = flase;
      }

      $patient = wp_insert_post(array (
        'post_type' => 'patient',
        'post_title' => $title,
        'post_status' => 'publish',
        'post_author' => $current_user->ID,
        'tax_input' => array( 'country' => array($country)),
      ));
            
      if ($patient) {
        update_field( 'field_5ec071799ea97', $current_user->ID, $patient );
        update_field( 'field_5eb74a63b59e8', $national_id, $patient );
        update_field( 'field_5eb74aabb59e9', $date_of_birth, $patient );
        update_field( 'field_5eb74abfb59ea', $gender, $patient );
        update_field( 'field_5eb74b10b59eb', $blood_type, $patient );
        update_field( 'field_5eb74baab59ec', $mobile, $patient );
        update_field( 'field_5eb74bc3b59ed', $email, $patient );
        update_field( 'field_5eb74bd3b59ee', $copy, $patient );
      }

      echo "success Add New patient";
    }


    die(); 
}


add_action('wp_ajax_nopriv_get_reports', 'get_reports');
add_action('wp_ajax_get_reports', 'get_reports');

function get_reports() {

  $today = $_POST["date"];

  $args = array(
    'post_type' => 'report',
    'suppress_filters' => 0,
    'posts_per_page' => -1,
    'post_author' => $current_user->ID,
    'meta_query' => array(
      array(
        'key'     => 'date_report',
        'value'   => $today,
        'compare' => '>=',
      ),
    ),
  );

  $all_reports = get_posts($args);
    $counter = 0;
    foreach ($all_reports as $card): 
      $counter++;
      $date_report  = get_field('date_report', $card->ID);
    ?>
      <tr>
        <td><?= $date_report; ?></td>
        <td><a href="#">view</a></td>
        <td><a href="#">Edit</a></td>
        <td><?= $counter; ?></td>
      </tr>
    <?php 
    endforeach;
  die(); 
}




add_action('wp_ajax_nopriv_get_add_medication', 'get_add_medication');
add_action('wp_ajax_get_add_medication', 'get_add_medication');

function get_add_medication() {
  ?>
  <div class="col-12 border-top mt-3 pt-3">
    <?php 
      $args = array(
        'post_type' => 'medication',
        'suppress_filters' => 0,
        'posts_per_page' => -1,
      );

      $posts = get_posts($args);
    ?>
    <div class="form-group col-12 p-0">
      <select class="custom-select form-control w-100" name="medication[]" required>
        <option value="0" selected>Choose...</option>
        <?php foreach ($posts as $post): ?>
          <option value="<?= $post->ID; ?>"><?= $post->post_title; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="col-12"><h4>Description of Medicine</h4></div>
    
    <div class="row m-0">
      <div class="form-group col-md-4">
        <input type="text" name="type_medication[]"  class="form-control" placeholder="Type…">
      </div>
      <div class="form-group col-md-4">
        <input type="text" name="type_medication[]"  class="form-control" placeholder="Times…">
      </div>
      <div class="form-group col-md-4">
        <input type="text" name="type_medication[]"  class="form-control" placeholder="Condition…">
      </div> 
      <div class="form-group col-md-4">
        <input type="text" name="type_medication[]"  class="form-control" placeholder="From…">
      </div>
      <div class="form-group col-md-4">
        <input type="text" name="type_medication[]"  class="form-control" placeholder="To…">
      </div>
    </div>  
  </div>
  <?php
  die(); 
}