{{--
  Template Name: Profile Template
--}}

@extends('layouts.app')
@section('content')

@php 
  global $current_user;
  wp_get_current_user();
  $phone_author = get_field('phone_author', 'user_' . $current_user->ID );
  $banner_user = get_field('banner_user', 'user_' . $current_user->ID);
  $address_user = get_field('address_user', 'user_' . $current_user->ID);
  $paged    = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
  $title    = isset($_GET['title']) ? $_GET['title'] : '';
  $nid      = isset($_GET['nid']) ? $_GET['nid'] : '';
  $country  = isset($_GET['country']) ? $_GET['country'] : '0';
  $user     = isset($_GET['user']) ? $_GET['user'] : '0';
@endphp

  @while(have_posts()) @php the_post() @endphp
    <div class="page-header bg-sections section-slide">
      <div class="container">
        <h1 class="headline"><?= the_author_meta( 'display_name', $current_user->ID ); ?></h1>
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
                <div class="img-banner">
                  @if ($banner_user)
                    <img src="{{ $banner_user }}" alt="<?= the_author_meta( 'display_name', $current_user->ID ); ?>">
                  @else
                    <img src="{{ get_theme_file_uri().'/dist/images/user-lg.png' }}" alt="<?= the_author_meta( 'display_name', $current_user->ID ); ?>">
                  @endif
                </div>
                @if ($address_user)
                  <p><strong>{{ _e('location:', 'theme') }}</strong> {{ $address_user }}</p>
                @endif
                @if ($phone_author)
                  <p><strong>{{ _e('Phone:', 'theme') }}</strong> {{ $phone_author }}</p>
                @endif
              </div>
              <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">Profile</a><br/>
                <a class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="false">New Patient</a><br/>
                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">All Patients</a><br/>
                <a class="nav-link" id="v-pills-reports-tab" data-toggle="pill" href="#v-pills-reports" role="tab" aria-controls="v-pills-reports" aria-selected="false">All reports</a><br/>
                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Search</a><br/>
              </div>
            </div>

            <div class="col-md-8 col-12">
              <div class="tab-content" id="v-pills-tabContent">
                <!-- Edit Profile -->
                <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                  <section class="template-users">
                    <div class="container-fluid mt-5">
                      <div class="row">
                        <div class="col-12">
                          <h2 class="headline">{{ _e('Edit Profile', 'theme') }}</h2>
                        </div>
                        <div class="col-12">
                          <form method="post" id="AuthorProfile" action="<?php the_permalink(); ?>">
                            <div class="row">
                              <div class="col-md-12 col-sm-12 user-forms"> 
                                <p class="form-username">
                                  <label for="full-name">{{ _e('Full Name', 'profile') }}</label>
                                  <input class="text-input" name="full-name" type="text" id="full-name" value="<?php the_author_meta( 'display_name', $current_user->ID ); ?>" />
                                </p><!-- .form-username -->
                                <p class="form-email">
                                  <label for="email">{{ _e('E-mail', 'profile') }} <span class="require">*</span></label>
                                  <input class="text-input" name="email" type="text" id="email" value="<?php the_author_meta( 'user_email', $current_user->ID ); ?>" />
                                </p><!-- .form-email -->
                                <p class="form-password">
                                  <label for="pass1">{{ _e('Password', 'profile') }} <span class="require">*</span></label>
                                  <input class="text-input" name="pass1" type="password" id="pass1" placeholder="********"/>
                                </p><!-- .form-password -->
                                <p class="form-password">
                                  <label for="pass2">{{ _e('Repeat Password', 'profile') }} <span class="require">*</span></label>
                                  <input class="text-input" name="pass2" type="password" id="pass2" placeholder="********" />
                                </p><!-- .form-password -->
                                <?php do_action('edit_user_profile', $current_user); ?>
                                <p class="form-submit col-12 mt-5 pl-0">
                                  <input name="updateuser" type="submit" id="updateuser" class="submit button" value="<?php _e('Edit Profile', 'theme'); ?>" />
                                  <?php wp_nonce_field( 'update-user' ) ?>
                                  <input name="action" type="hidden" id="action" value="update-user" />
                                </p>
                              </div>
                            </div>
                          </form> 
                        </div>
                      </div>
                    </div>
                  </section>  
                </div>

                <!-- New Patient -->
                <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                  <div class="mt-5">
                    <div class="col-12">
                      <h2 class="headline">{{ _e('New Patient', 'theme') }}</h2>
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
                        <div class="form-group col-12">
                          <label>Full Name</label>
                          <input type="text" name="title" class="form-control" required>
                          <span class="is-required">(required)</span>
                        </div>
                        <div class="form-group col-12">
                          <label>National ID</label>
                          <input type="text" name="national_id" class="form-control" required>
                          <span class="is-required">(required)</span>
                        </div>
                        <div class="form-group col-12">
                          <label>{{ _e('Location', 'theme') }}</label>
                            <?php
                            $args = array(
                              'taxonomy' => 'country', 
                              'name'=>'country', 
                              'class' => 'form-control',
                              'hierarchical'=> 1, 
                              'show_option_all'=>'Select country'
                            );
                            wp_dropdown_categories( $args ); 
                            ?>
                            <span class="is-required">(required)</span>
                        </div>
                        <div class="form-group col-12">
                          <label>Date Of Birth</label>
                          <input type="text" id="datepicker" name="date_of_birth" class="form-control" required>
                          <span class="is-icon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                          <span class="is-required">(required)</span>
                        </div>
                        <div class="form-group col-12">
                          <label>Gender</label>
                          <select class="custom-select form-control" name="gender" required>
                            <option value="0" selected>Choose...</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                          </select>
                          <span class="is-required">(required)</span>
                        </div>
                        <div class="form-group col-12">
                          <label>Blood Type</label>
                          <select class="custom-select form-control" name="blood_type" required>
                              <option value="0" selected>Choose...</option>
                              <option value="o-">O−</option>
                              <option value="o+">O+</option>
                              <option value="a-">A−</option>
                              <option value="a+">A+</option>
                              <option value="b-">B−</option>
                              <option value="b+">B+</option>
                              <option value="ab-">AB−</option>
                              <option value="ab+">AB+</option>
                          </select>
                          <span class="is-required">(required)</span>
                        </div>
                        <div class="form-group col-12">
                          <label>Mobile</label>
                          <input type="number" name="mobile" class="form-control" required>
                          <span class="is-required">(required)</span>
                        </div>
                        <div class="form-group col-12">
                          <label>E-mail</label>
                          <input type="email" name="email" class="form-control">
                          <span class="is-required">(option)</span>
                        </div>
                        <div class="form-group col-12">
                          <label>NID Copy</label>
                          <input type="number" name="nid_copy" class="form-control process_custom_images" id="process_custom_images">
                          <button class="set_custom_images button">Upload File</button>
                          <span class="is-required">(option)</span>
                        </div>
                      </div>
                      <input type="hidden" name="author_id" value="{{ $current_user->ID }}">
                      <input type="hidden" name="action" value="new_post">
                      <button id="AddNew" class="btn-add" type="submit">Add New</button>
                    </form>
                  </div>
                </div>

                <!-- All Patients -->
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                  <?php 
                    $args = array(
                      'post_type' => 'patient',
                      'suppress_filters' => 0,
                      'posts_per_page' => 10,
                      'paged' => $paged,
                      'post_author' => $current_user->ID,
                    );

                    $query = new \WP_Query( $args );
                    $cards = get_posts($args);
                  ?>
                  <div class="container mt-5">
                    <div class="row">
                      <div class="col-12">
                        <h2 class="headline">{{ _e('All Patient', 'theme') }}</h2>
                      </div>
                      <div class="col-12">
                        <table id="YourCards" summary="Code page support in different versions of MS Windows." rules="groups" frame="hsides" border="2" class="table table-striped display">
                          <thead valign="top">
                            <tr>
                              <th>{{ _e('Patient ID', 'theme') }}</th>
                              <th>{{ _e('Name', 'theme') }}</th>
                              <th>{{ _e('DOB', 'theme') }}</th>
                              <th>{{ _e('Location', 'theme') }}</th>
                              <th>{{ _e('Author', 'theme') }}</th>
                              <th class="counter">#</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php 
                          $counter = 0;
                          foreach ($cards as $card): 
                            $counter++;
                            $national_id  = get_field('national_id', $card->ID);
                            $title        = get_the_title($card->ID);
                            $date_of_birth  = get_field('date_of_birth', $card->ID);
                            $location = wp_get_post_terms( $card->ID, 'country', array( 'fields' => 'names' ) );
                            $author  = get_field('author_id', $card->ID);
                            $link = get_permalink($card->ID);
                          ?>
                          <tr>
                            <td><?= $national_id; ?></td>
                            <td><?= $title; ?></td>
                            <td><?= $date_of_birth; ?></td>
                            <td><?= $location[0]; ?></td>
                            <td><?= the_author_meta( 'display_name', $author ); ?></td>
                            <td><?= $counter; ?></td>
                            <td class="td-view"><a href="<?= $link; ?>" class="btn-view">view Patient</a></td>
                          </tr>
                          <?php endforeach; ?>
                          </tbody>
                        </table>
                      </div>
                      <div class="col-12">
                        <?= base_pagination(array(), $query); ?>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- All reports -->
                <div class="tab-pane fade" id="v-pills-reports" role="tabpanel" aria-labelledby="v-pills-reports-tab">
                  <?php 
                    $today = current_time('Ymd');
                    $reports = array(
                      'post_type' => 'report',
                      'suppress_filters' => 0,
                      'posts_per_page' => 10,
                      'paged' => $paged,
                      'post_author' => $current_user->ID,
                    );
                    $the_query = new \WP_Query( $reports );
                    $all_reports = get_posts($reports);
                  ?>
                  <div class="container mt-5">
                    <div class="row">
                      <div class="col-12">
                        <h2 class="headline">{{ _e('All Reports', 'theme') }}</h2>
                      </div>

                      <div class="col-12">
                        <form action="<?= the_permalink(); ?>" id="filter">
                          <div class="row">
                            <div class="form-group col-md-6 col-12">
                              <label>{{ _e('Date', 'theme') }}</label>
                              <input id="dateFilter" type="text" name="filter_date" class="form-control" placeholder="<?= $today; ?>">
                            </div>
                          </div>
                          <button id="FilterBtn" type="submit" class="btn btn-primary">{{ _e('Filter', 'theme') }}</button>
                        </form>
                      </div>

                      <div id="Filterloader">
                        <div class="sk-chase">
                          <div class="sk-chase-dot"></div>
                          <div class="sk-chase-dot"></div>
                          <div class="sk-chase-dot"></div>
                          <div class="sk-chase-dot"></div>
                          <div class="sk-chase-dot"></div>
                          <div class="sk-chase-dot"></div>
                        </div>
                      </div>

                      <div class="col-12 mt-5">
                        <table id="YourCards" summary="Code page support in different versions of MS Windows." rules="groups" frame="hsides" border="2" class="table table-striped display">
                          <thead valign="top">
                            <tr>
                              <th>{{ _e('Report Date', 'theme') }}</th>
                              <th>{{ _e('View', 'theme') }}</th>
                              <th>{{ _e('Edit', 'theme') }}</th>
                              <th class="counter">#</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php 
                          $counter = 0;
                          foreach ($all_reports as $card): 
                            $counter++;
                            $date_report  = get_field('date_report', $card->ID);
                            $link = get_permalink($card->ID);
                          ?>
                          <tr>
                            <td><?= $date_report; ?></td>
                            <td><a href="<?= $link; ?>">view</a></td>
                            <td><a href="<?= $link; ?>edit=<?= $card->ID; ?>">Edit</a></td>
                            <td><?= $counter; ?></td>
                          </tr>
                          <?php endforeach; ?>
                          </tbody>
                        </table>
                      </div>
                      <div class="col-12">
                        <?= base_pagination(array(), $the_query); ?>
                      </div>
                    </div>
                  </div>
                </div>

                <script>
                  jQuery(function($) {
                    $('#FilterBtn').on('click', function(e) {
                      e.preventDefault();
                      var date = $('#dateFilter').val();
                      $.ajax({
                        type:"POST",
                        url:"<?php echo admin_url('admin-ajax.php'); ?>",
                        data: {
                          action: "get_reports",
                          date: date,
                        },
                        beforeSend: function(results) {
                          $('#Filterloader').show();
                        },
                        success: function(results){
                          $('#Filterloader').hide();
                          $('#YourCards tbody').html(results);
                        },
                        error: function(results) {
                          $('#Filterloader').hide();
                        }
                      });
                    });
                  });
                </script>

                <!-- Search -->
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                  <div class="container mt-5">
                    <div class="row">
                      <div class="col-12">
                        <h2 class="title-header">{{ _e('Search', 'theme') }}</h2>
                      </div>
                      <div class="col-12">
                        <form action="<?= the_permalink(); ?>" id="filter">
                          <div class="row">
                            <div class="form-group col-md-6 col-12">
                              <label>{{ _e('Name', 'theme') }}</label>
                              <input type="text" name="title" class="form-control" placeholder="<?= ($title)? $title:'typeing....'; ?>">
                            </div>
                            <div class="form-group col-md-6 col-12">
                              <label>{{ _e('National ID', 'theme') }}</label>
                              <input type="number" name="nid" class="form-control" placeholder="<?= ($nid)? $nid:'typeing....'; ?>">
                            </div>
                            <div class="form-group col-md-6 col-12">
                              <label>{{ _e('Location', 'theme') }}</label>
                                <?php
                                $args = array(
                                  'taxonomy' => 'country', 
                                  'name'=>'country', 
                                  'hide_empty'=>1,
                                  'depth'=>1,
                                  'class' => 'form-control',
                                  'hierarchical'=> 1, 
                                  'show_count' => 0,
                                  'show_option_all'=>'Select country'
                                );
                                wp_dropdown_categories( $args ); 
                                ?>
                            </div>
                            <div class="form-group col-md-6 col-12">
                              <label>{{ _e('Other Authors', 'theme') }}</label>
                                <?php
                                $users = array(
                                  'name'=>'user', 
                                  'class' => 'form-control',
                                  'show_option_all'=>'Select author'
                                );
                                wp_dropdown_users( $users ); 
                                ?>
                            </div>
                          </div>
                        
                          <button type="submit" class="btn btn-primary">{{ _e('Filter', 'theme') }}</button>
                        </form>
                      </div>
                    </div>
                  </div>

                  <?php 
                    $filter = array(
                      'post_type' => 'patient',
                      'suppress_filters' => 0,
                      'posts_per_page' => 10,
                      'paged' => $paged,
                      'post_author' => $current_user->ID,
                    );

                    $all_filter = get_posts($filter);
                  ?>
                  <div class="container mt-5">
                    <div class="row">
                      <div class="col-12">
                        <table id="YourCards" summary="Code page support in different versions of MS Windows." rules="groups" frame="hsides" border="2" class="table table-striped display">
                          <thead valign="top">
                            <tr>
                              <th>{{ _e('Patient ID', 'theme') }}</th>
                              <th>{{ _e('Name', 'theme') }}</th>
                              <th>{{ _e('DOB', 'theme') }}</th>
                              <th>{{ _e('Location', 'theme') }}</th>
                              <th>{{ _e('Author', 'theme') }}</th>
                              <th class="counter">#</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php 
                          $counter = 0;
                          foreach ($all_filter as $card): 
                            $counter++;
                            $national_id  = get_field('national_id', $card->ID);
                            $title        = get_the_title($card->ID);
                            $date_of_birth  = get_field('date_of_birth', $card->ID);
                            $location = wp_get_post_terms( $card->ID, 'country', array( 'fields' => 'names' ) );
                            $author  = get_field('author_id', $card->ID);
                            $link = get_permalink($card->ID);
                          ?>
                          <tr>
                            <td><?= $national_id; ?></td>
                            <td><?= $title; ?></td>
                            <td><?= $date_of_birth; ?></td>
                            <td><?= $location[0]; ?></td>
                            <td><?= the_author_meta( 'display_name', $author ); ?></td>
                            <td><?= $counter; ?></td>
                            <td class="td-view"><a href="<?= $link; ?>" class="btn-view">view Patient</a></td>
                          </tr>
                          <?php endforeach; ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <script>
        jQuery(function($) {
          $('#AddNew').on('click',function(e){
            e.preventDefault();
            var title           = $('input[name="title"]').val();
            var national_id     = $('input[name="national_id"]').val();
            var country         = $('select[name="country"]').children("option:selected").val();
            var date_of_birth   = $('input[name="date_of_birth"]').val();
            var gender          = $('select[name="gender"]').children("option:selected").val();
            var blood_type      = $('select[name="blood_type"]').children("option:selected").val();
            var mobile          = $('input[name="mobile"]').val();
            var email           = $('input[name="email"]').val();
            var nid_copy        = $('input[name="nid_copy"]').val();
                
            if(title == '' || national_id == '' ||  country == '' || date_of_birth == '' || gender == '' || blood_type == '' || mobile == '') {
              $("#errors").show();
            } else {
              $.ajax({
                type:"POST",
                url:"<?php echo admin_url('admin-ajax.php'); ?>",
                data: {
                  action: "get_add_patient",
                  title: title,
                  national_id: national_id,
                  country: country,
                  date_of_birth: date_of_birth,
                  gender: gender,
                  blood_type: blood_type,
                  mobile: mobile,
                  email: email,
                  nid_copy: nid_copy,
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
            }
          });

          if ($('#datepicker').length) {
            $('#datepicker').datepicker({
              changeMonth: true,
              changeYear: true,
              dateFormat: 'dd/mm/yy',
            });
          }

          if ($('#dateFilter').length) {
            $('#dateFilter').datepicker({
              changeMonth: true,
              changeYear: true,
              dateFormat: 'yymmdd',
            });
          }
        });
      </script>
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
        height: 200px;
        padding-top: 50px;
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

      form#NewPost .form-control {
        flex: 0 0 85%;
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

      button.set_custom_images.button {
        margin: 0 -105px;
        background: transparent;
        border: 1px solid #333;
        line-height: 1;
        padding: 7px 5px 3px;
        border-radius: 3px;
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
    </style>

  @endwhile
@endsection
