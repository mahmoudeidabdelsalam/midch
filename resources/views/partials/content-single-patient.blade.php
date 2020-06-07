@php 
  global $current_user;
  wp_get_current_user();

  $birthDate = get_field('date_of_birth');
  $birthDate = explode("/", $birthDate);
  $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y") - $birthDate[2]) - 1) : (date("Y") - $birthDate[2]));

  $blood_type = get_field('blood_type');
  $author = get_the_author();

  $blood_type = get_field('blood_type');

  $national_id = get_field('national_id');
  $gender = get_field('gender');
  $mobile = get_field('mobile');
  $email = get_field('email');

  $paged    = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
@endphp
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.min.css">



    <div class="page-header bg-sections section-slide">
      <div class="container">
        <h1 class="headline">{!! App::title() !!}</h1>
        <ul>
          <li><?= $blood_type; ?></li>
          <li><?= $age; ?> age</li>
          <li>by: <?= $author; ?></li>
          <li>NID: <?= $national_id; ?></li>
          <li><?= $gender; ?></li>
          <li><?= $mobile; ?></li>
          <li><?= $email; ?></li>
        </ul>
      </div>
    </div>

    @if(!is_user_logged_in())
      <section id="SectionLogin">
        <a class="button-green" href="#" data-toggle="modal" data-target="#LoginModal">login</a>
      </section>
    @else
      <section id="SectionAuthor">
        <div class="container-fluid">
          <div class="row">
            
            <div class="col-md-4 col-12 sidebar-menu">
              <div class="informations">
                <img src="{{ get_theme_file_uri().'/dist/images/avatar.png' }}" alt="{!! App::title() !!}">
                @if ($address_user)
                  <p><strong>{{ _e('location:', 'theme') }}</strong> {{ $address_user }}</p>
                @endif
                @if ($phone_author)
                  <p><strong>{{ _e('Phone:', 'theme') }}</strong> {{ $phone_author }}</p>
                @endif
              </div>
              <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">Reports</a><br/>
                <a class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="false">Add report</a><br/>
                <a class="nav-link" id="v-pills-reports-tab" data-toggle="pill" href="#v-pills-reports" role="tab" aria-controls="v-pills-reports" aria-selected="false">Add Analysis</a><br/>
              </div>
            </div>



            <div class="col-md-8 col-12">
              <div class="tab-content" id="v-pills-tabContent">
                <!-- Reports -->
                <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                  <?php 
                  $reports = array(
                    'post_type' => 'report',
                    'suppress_filters' => 0,
                    'posts_per_page' => -1,
                    'meta_query' => array(
                      'relation' => 'OR',
                      array(
                          'key' => 'patient_id',
                          'value' => '"' . get_the_ID() . '"',
                          'compare' => 'LIKE'
                      ),
                      array(
                          'key' => 'patient_id',
                          'value' => get_the_ID(),
                          'compare' => '='
                      )
                    )
                  );
                  $all_reports = get_posts($reports);
                  if($all_reports):
                    $counter = 0;
                    foreach ($all_reports as $report): 
                      $counter++;
                      $date_report  = get_field('date_report', $report->ID);
                      $author_name = get_field('author_name', $report->ID);
                      $type_important = get_field('type_important', $report->ID);
                      $medication_list = get_field('medication_list', $report->ID);
                      $link = get_permalink($report->ID);
                      $comment = get_field('comment', $report->ID);
                      $analysis = get_field('analysis', $report->ID);
                    ?>
                    <div class="report">
                      <ul>
                        <li><strong>Name:</strong> <?= $report->post_title; ?></li>
                        <li><strong>Date:</strong> <?= $date_report; ?></li>
                        <li><strong>Author Name:</strong> <?= $author_name['display_name']; ?></li>
                        <li><strong>Type Important:</strong> <?= $type_important; ?></li>
                      </ul>
                      <div class="col-12">
                        <h3>Medication</h3>
                        <table>
                          <thead valign="top">
                            <tr>
                              <th>{{ _e('Medication', 'theme') }}</th>
                              <th>{{ _e('Description', 'theme') }}</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            if( $medication_list ):
                            foreach ($medication_list as $list):
                            ?>
                            <tr>
                              <td><?= $list['medication_name']->post_title; ?></td>
                              <td>
                                <ul class="list-condition">
                                  <li>Type: <?= $list['type_medicine']; ?></li>
                                  <li>Condition: <?= $list['condition_medicine']; ?></li>
                                  <li>Time: <?= $list['times_medicine']; ?></li>                                
                                  <li>From: <?= $list['time_from']; ?> To: <?= $list['time_to']; ?></li>
                                </ul>
                              </td>
                            </tr>
                            <?php
                              endforeach;
                            endif;
                            ?>
                          </tbody>
                        </table>
                      </div>
                      <div class="col-12 mt-3">
                        <h3>Notes</h3>
                        "<?= $comment; ?>"
                      </div>
                      <div class="col-12 mt-3">
                        <h3>Analysis</h3>
                        @foreach ($analysis as $item)
                          <i class="fa fa-file"></i> <a href="<?= $item['file_analysis']; ?>" download>Download</a>
                        @endforeach
                      </div>
                    </div>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <div class="alert alert-danger mt-5" role="alert">
                      NoT Found Reports !
                    </div>
                  <?php endif; ?>
                </div>



                <!-- Add Report -->
                <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                  <div class="mt-5">
                    <div class="col-12">
                      <h2 class="headline">{{ _e('Add report', 'theme') }}</h2>
                    </div>


                    <div id="add-loader">
                      <div class="sk-chase">
                        <div class="sk-chase-dot"></div>
                        <div class="sk-chase-dot"></div>
                        <div class="sk-chase-dot"></div>
                        <div class="sk-chase-dot"></div>
                        <div class="sk-chase-dot"></div>
                        <div class="sk-chase-dot"></div>
                      </div>
                    </div>

                    <div id="errors" style="display: none">
                      <div class="alert alert-danger" role="alert">
                        Please complete all fields <strong class="text-danger">(required)</strong>.
                      </div>
                    </div>


                    <div id="success" style="display: none">
                      <div class="alert alert-success" role="alert"></div>
                    </div>


                    <form class="col-12" id="NewPost" name="new_post" method="post" action="" enctype="multipart/form-data">
                      <div class="row">
                        <div class="form-group col-md-6 col-12">
                          <label>Report Name <span class="text-red">*</span></label>
                          <input type="text" name="title" class="form-control" required>
                        </div>

                      
                        <div class="form-group col-md-6 col-12">
                          <div class="input-group date" data-date-format="mm/dd/yyyy">
                            <label>Date report</label>
                            <input type="text" id="datepicker" name="date_report" class="form-control" required>
                            <div class="input-group-addon">
                              <i class="fa fa-calendar" aria-hidden="true"></i>
                            </div>
                          </div>
                        </div>

                        <div class="form-group col-md-6 col-12">
                          <label>Author Name <span class="text-red">*</span></label>
                          <input type="text" name="author_name" value="<?= the_author_meta( 'display_name', $current_user->ID ); ?>" class="form-control" readonly>
                        </div>

                        <div class="form-group col-md-6 col-12">
                          <label>Type Important</label>
                          <select class="custom-select form-control" name="type_important" required>
                            <option value="0" selected>Choose...</option>
                            <option value="urgent">urgent</option>
                            <option value="normal">normal</option>
                          </select>
                        </div>


                        <div class="col-12">
                          <?php 
                            $args = array(
                              'post_type' => 'medication',
                              'suppress_filters' => 0,
                              'posts_per_page' => -1,
                            );

                            $posts = get_posts($args);
                          ?>
                          <div class="form-group col-12 p-0">
                            <label>Medication</label>
                            <select class="custom-select form-control w-100" name="medication[]" required>
                              <option value="0" selected>Choose...</option>
                              @foreach ($posts as $post)
                                <option value="<?= $post->ID; ?>"><?= $post->post_title; ?></option>
                              @endforeach
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


                        <div id="ListMedication" class="col-12 p-0"></div>

                        <div class="col-12 mt-3 mb-5">
                          <a href="javascript:void(0)" class="btn btn-primary" id="addMedication"> Add </a> 
                          <a href="javascript:void(0)" class="btn btn-danger" id="removeMedication"> remove </a>
                        </div>

                        <div class="form-group col-md-12 col-12">
                          <label>Comment</label>
                          <textarea class="form-control" name="comments" id="Comment" cols="30" rows="4"></textarea>
                        </div>

                      </div>
                      <input type="hidden" name="author_id" value="{{ $current_user->ID }}">
                      <input type="hidden" name="action" value="new_post">
                      <button id="AddNew" class="btn-add" type="submit">Add New</button>
                    </form>
                  </div>
                </div>

                <script>
                  jQuery(function($) {
                    if ($('#datepicker').length) {
                      $('#datepicker').datepicker({
                        format: 'dd/mm/yyyy',
                      });
                    }


                    $("#addMedication").on("click", function() { 
                      $.ajax({
                        type:"POST",
                        url:"<?php echo admin_url('admin-ajax.php'); ?>",
                        data: {
                          action: "get_add_medication",
                        },
                        beforeSend: function(results) {
                        },
                        success: function(results){
                          $('#ListMedication').append(results);
                        },
                        error: function(results) {
                        }
                      });
                    });  


                    $("#removeMedication").on("click", function() {  
                      $("#ListMedication").children().last().remove();  
                    }); 

                    $('#AddNew').on('click',function(e){
                      e.preventDefault();
                      var title           = $('input[name="title"]').val();
                      $.ajax({
                        type:"POST",
                        url:"<?php echo admin_url('admin-ajax.php'); ?>",
                        data: {
                          action: "get_add_reports",
                        },
                        beforeSend: function(results) {
                          $('#add-loader').show();
                        },
                        success: function(results){
                          $('#success').show();
                          $('#add-loader').hide();
                          $('#NewPost').hide();
                          $('#success .alert').html(results);
                        },
                        error: function(results) {
                          $('.register-message').html('plz try again later').show();
                          $('#add-loader').hide();
                        }
                      });

                    });
                  });
                </script>





                <!-- All reports -->
                <div class="tab-pane fade" id="v-pills-reports" role="tabpanel" aria-labelledby="v-pills-reports-tab">
                  <div class="mt-5">
                    <div class="col-12">
                      <h2 class="headline">{{ _e('Add Analysis', 'theme') }}</h2>
                    </div>


                    <div id="AnalysisLoader" style="display: none">
                      <div class="sk-chase">
                        <div class="sk-chase-dot"></div>
                        <div class="sk-chase-dot"></div>
                        <div class="sk-chase-dot"></div>
                        <div class="sk-chase-dot"></div>
                        <div class="sk-chase-dot"></div>
                        <div class="sk-chase-dot"></div>
                      </div>
                    </div>

                    <div id="Analysiserrors" style="display: none">
                      <div class="alert alert-danger" role="alert">
                        Please complete all fields <strong class="text-danger">(required)</strong>.
                      </div>
                    </div>


                    <div id="Analysissuccess" style="display: none">
                      <div class="alert alert-success" role="alert"></div>
                    </div>


                    <form class="col-12" id="AnalysisNewPost" name="new_post" method="post" action="" enctype="multipart/form-data">
                      <div class="row">
                        <div class="form-group col-md-6 col-12">
                          <label>Select report <span class="text-red">*</span></label>
                          <?php 
                            $args = array(
                              'post_type' => 'report',
                              'suppress_filters' => 0,
                              'posts_per_page' => -1,
                            );

                            $posts = get_posts($args);
                          ?>
                          <select class="custom-select form-control w-100" name="medication[]" required>
                            <option value="0" selected>Choose...</option>
                            @foreach ($posts as $post)
                              <option value="<?= $post->ID; ?>"><?= $post->post_title; ?></option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group col-12">
                          <label>Analysis</label>
                          <input type="number" name="nid_copy" class="form-control process_custom_images" id="process_custom_images">
                          <button class="set_custom_images button">Upload File</button>
                        </div>
                        <div class="form-group col-md-12 col-12">
                          <label>Comment</label>
                          <textarea class="form-control" name="comments" id="Comment" cols="30" rows="4"></textarea>
                        </div>
                      </div>
                      <input type="hidden" name="author_id" value="{{ $current_user->ID }}">
                      <input type="hidden" name="action" value="new_post">
                      <button id="AddNew" class="btn-add" type="submit">Add New</button>
                    </form>
                  </div>
                </div>

                


              </div>
            </div>
          </div>
        </div>
      </section>



    @endif

    <style>
      h1.headline {
        font-size: 50px;
        font-weight: 100;
        text-transform: uppercase;
        color: white;
      }

      h1.headline .first-word {
        font-weight: 600;
      }

      h2.headline {
        font-size: 50px;
        font-weight: 100;
        text-transform: uppercase;
      }

      h2.headline .first-word {
        font-weight: 600;
      }

      .page-header {
        height: 320px;
        padding-top: 20px;
      }

      .page-header ul li {
        color: #F5B883;
        text-transform: capitalize;
        font-size: 16px;
      }

      .page-header ul {
        list-style: none;
        padding: 0;
      }

      section#SectionAuthor {
        min-height: 800px;
      }

      .sidebar-menu {
        background-color: #313236;
        min-height: 900px;
        top: -100px;
        position: relative;
        padding-top: 100px;
        margin-bottom: -100px;
        padding-left: 30px;
        padding-right: 30px;
      }

      .page-header {
        position: relative;
        z-index: 99;
      }

      .report {
        padding: 15px;
        border: 1px solid #979797;
        margin: 20px 0;
        border-radius: 4px;
        box-shadow: 0 2px 4px #979797;
      }

      .report ul {
        list-style: none;
        padding: 0;
      }

      .report table {
        border: 1px solid #979797;
        padding: 10px !important;
      }

      section#SectionAuthor .flex-column {
        display: inline-block !important;
      }

      section#SectionAuthor .sidebar-menu a {
        font-size: 30px;
        font-weight: 600;
        color: #fff;
        margin-top: 30px;
        padding: 0;
        font-family: sans-serif;
        line-height: 1;
        float: left;
      }

      section#SectionAuthor .sidebar-menu a.active {
        background: transparent;
        color: #F5B883;
        border-bottom: 1px solid #F5B883;
        border-radius: 0;
      }

      section#SectionLogin {
        min-height: 400px;
        display: flex;
        justify-content: center;
        align-items: center;
      }

      form#AuthorProfile h2 {
        display: none;
      }

      form#AuthorProfile input {
        display: block;
        width: 100%;
        height: 40px;
        font-family: sans-serif;
        padding: 10px;
      }

      td.acf-input {
        display: block;
        width: 100%;
        padding: 10px 0 !important;
      }

      td.acf-field,
      tr.acf-field {
        display: flex;
        flex-flow: column;
      }

      table.form-table {
        width: 100%;
      }

      .acf-field .acf-label {
        padding: 0 !important;
        margin: 0 !important;
      }

      form#AuthorProfile label {
        font-size: 20px;
        font-weight: bold;
        font-family: sans-serif;
        margin-top: 15px;
      }

      form#NewPost label {
        font-size: 20px;
        font-weight: bold;
        font-family: sans-serif;
        margin-top: 15px;
      }

      input#updateuser {
        background: #2A323F;
        color: #fff;
        width: 250px !important;
        line-height: 19px;
      }

      button#AddNew {
        background: #2A323F;
        color: #fff;
        width: 250px !important;
        line-height: 19px;
        height: 40px;
        padding: 13px;
      }

      section.template-users {
        padding: 50px 0;
      }

      .informations {
        display: flex;
        flex-flow: column;
        justify-content: center;
        align-items: center;
      }

      .informations p {
        font-size: 20px;
        color: #fff;
        text-align: left;
        width: 100%;
        margin: 5px 0;
      }

      .informations img {
        margin-bottom: 20px;
        max-width: 100%;
      }


      form#NewPost label {
        flex: 0 0 100%;
      }

      form#NewPost .form-group {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
      }

      .is-required {
        margin-left: auto;
      }

      span.is-icon {
        margin: -31px;
        display: inline-block;
        line-height: .8;
        font-size: 25px;
        color: #8a7f7f;
      }

      form#NewPost {
        padding-bottom: 100px;
        padding-top: 50px;
      }

      .sk-chase {
        width: 40px;
        height: 40px;
        position: relative;
        animation: sk-chase 2.5s infinite linear both;
        margin: 200px auto;
      }

      .sk-chase-dot {
        width: 100%;
        height: 100%;
        position: absolute;
        left: 0;
        top: 0;
        animation: sk-chase-dot 2.0s infinite ease-in-out both;
      }

      div#add-loader,
      #Filterloader {
        position: absolute;
        top: -200px;
        width: 100%;
        bottom: 0;
        display: none;
        text-align: center;
        background-color: rgba(7, 83, 255, 0.2);
        z-index: 9;
        padding-top: 200px;
        left: 0;
      }

      .sk-chase-dot:before {
        content: '';
        display: block;
        width: 25%;
        height: 25%;
        background-color: #2a323f;
        border-radius: 100%;
        animation: sk-chase-dot-before 2.0s infinite ease-in-out both;
      }

      .sk-chase-dot:nth-child(1) {
        animation-delay: -1.1s;
      }

      .sk-chase-dot:nth-child(2) {
        animation-delay: -1.0s;
      }

      .sk-chase-dot:nth-child(3) {
        animation-delay: -0.9s;
      }

      .sk-chase-dot:nth-child(4) {
        animation-delay: -0.8s;
      }

      .sk-chase-dot:nth-child(5) {
        animation-delay: -0.7s;
      }

      .sk-chase-dot:nth-child(6) {
        animation-delay: -0.6s;
      }

      .sk-chase-dot:nth-child(1):before {
        animation-delay: -1.1s;
      }

      .sk-chase-dot:nth-child(2):before {
        animation-delay: -1.0s;
      }

      .sk-chase-dot:nth-child(3):before {
        animation-delay: -0.9s;
      }

      .sk-chase-dot:nth-child(4):before {
        animation-delay: -0.8s;
      }

      .sk-chase-dot:nth-child(5):before {
        animation-delay: -0.7s;
      }

      .sk-chase-dot:nth-child(6):before {
        animation-delay: -0.6s;
      }

      @keyframes sk-chase {
        100% {
          transform: rotate(360deg);
        }
      }

      @keyframes sk-chase-dot {

        80%,
        100% {
          transform: rotate(360deg);
        }
      }

      @keyframes sk-chase-dot-before {
        50% {
          transform: scale(0.4);
        }

        100%,
        0% {
          transform: scale(1.0);
        }
      }


      .img-banner {
        border-radius: 100%;
        border: 2px solid #fff;
        height: 300px;
        width: 300px;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .page-numbers {
        position: relative;
        display: block;
        padding: .5rem .75rem;
        margin-left: -1px;
        line-height: 1.25;
        color: #007bff;
        background-color: #fff;
        border: 1px solid #dee2e6;
      }

      ul.pagination {
        justify-content: center;
        align-items: center;
      }

      .page-numbers {
        height: 40px;
        width: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: sans-serif;
        border-radius: 4px;
        margin: 0 2px;
      }

      .next.page-numbers,
      .prev.page-numbers {
        width: auto;
      }

      form#filter {
        border: 1px solid #979797;
        padding: 15px;
        border-radius: 4px;
        display: inline-block;
        width: 100%;
      }

      button.btn-primary {
        background: #2A323F;
        border: 1px solid #2A323F;
        min-width: 264px;
        float: right;
        display: inline-block;
      }

      h2.title-header {
        font-size: 50px;
        text-transform: uppercase;
        font-weight: 100;
      }

      .form-control {
        height: 40px !important;
        display: inline-block !important;
        font-size: 20px !important;
        font-family: sans-serif;
        font-weight: 100 !important;
        color: #A6A6A6 !important;
      }

      td.td-view {
        position: absolute;
        left: 0;
        width: 100%;
        text-align: right;
        border: none !important;
        opacity: 0;
        background-color: rgba(51, 51, 51, 0.3) !important;
      }

      td.td-view a {
        background: #333;
        color: #fff;
        padding: 10px;
        border-radius: 4px;
        font-size: 13px;
      }

      tr:hover td.td-view {
        opacity: 1;
      }

      .report td ul {
        margin: 0;
      }

      .report td,
      .report th {
        padding: 10px;
        border: 1px solid;
      }

      ul.list-condition {
        display: flex;
        flex-wrap: wrap;
      }

      ul.list-condition li {
        flex: 0 0 50%;
      }
      .date i.fa {
        font-size: 25px;
        color: #ccc;
        margin-left: -35px;
        position: relative;
        top: 8px;
      }
      textarea.form-control, .comment-form textarea, .search-form textarea.search-field {
        height: auto !important;
      }
      button.set_custom_images {
        position: absolute;
        right: 20px;
        top: 37px;
        border-radius: 4px;
      }
    </style>
