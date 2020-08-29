{{--
  Template Name: Sign up Template
--}}

@extends('layouts.app')
@section('content')

@php 
  $status    = isset($_GET['status']) ? $_GET['status'] : '';
@endphp

  @while(have_posts()) @php the_post() @endphp
    <div class="page-header bg-sections section-slide">
      <div class="container">
        <h1 class="headline">Sign Up</h1>
      </div>
    </div>

    @if(!is_user_logged_in())
      <div class="container mt-5 mb-5">
        <h3>Create New Account</h3>
        <small>Please enter valid data and the data will be reviewed and an email sent with approval or rejection.</small>


        <ul class="nav nav-tabs justify-content-center mt-5">
          <li class="nav-item">
            <a class="nav-link {{ ($status != 'customer')? 'active':'' }}" href="<?= the_field('sign_up_page', 'option'); ?>">Register as a doctor <i class="fa fa-registered" aria-hidden="true"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($status == 'customer')? 'active':'' }}" href="<?= the_field('sign_up_page', 'option'); ?>?status=customer">Register as a User <i class="fa fa-registered" aria-hidden="true"></i></a>
          </li>
        </ul>



        <div class="tab-content">
          @if($status != 'customer')
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="container mt-3">

              <div class="register-message" style="display:none;"></div>
              <div class="sl-loader">
                <div class="spinner">
                  <div class="rect1"></div>
                  <div class="rect2"></div>
                  <div class="rect3"></div>
                  <div class="rect4"></div>
                  <div class="rect5"></div>
                </div>
              </div>

              <form action="" method="get">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6 inputGroupContainer">
                      <label class="control-label">First Name</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input name="first_name" placeholder="First Name..." class="form-control" type="text">
                      </div>
                    </div>

                    <div class="col-md-6 inputGroupContainer">
                      <label class="control-label">Last Name</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input name="last_name" placeholder="Last Name..." class="form-control" type="text">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6 inputGroupContainer">
                      <label class="control-label">Email</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                        <input name="email" placeholder="user@email.com" class="form-control" type="email">
                      </div>
                    </div>
                    <div class="col-md-6 inputGroupContainer">
                      <label class="control-label">Phone</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                        <input name="mobile" placeholder="(+20)0123456789" class="form-control" type="number">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6 inputGroupContainer">
                      <label class="control-label">Password</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></i></span>
                        <input id="password-field" placeholder="********" type="password" class="form-control" name="password">
                      </div>
                    </div>
                    <div class="col-md-6 inputGroupContainer">
                      <label class="control-label">Gender</label>
                      <div class="input-group">
                        <select name="gender" class="form-control">
                          <option value="0" selected>choose..</option>
                          <option value="male">male</option>
                          <option value="male">female</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6 inputGroupContainer">
                      <label class="control-label">license number</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>
                        <input name="license" placeholder="..." class="form-control" type="text">
                      </div>
                    </div>
                    <div class="col-md-6 inputGroupContainer">
                      <label class="control-label">Specialty</label>
                      <div class="input-group">
                        <select name="specialty" class="form-control">
                          <option value="0" selected>choose..</option>
                          <option value='Anaesthesia'>Anaesthesia</option>
                          <option value='Anatomy and Physiology'>Anatomy and Physiology</option>
                          <option value='Cardiology'>Cardiology</option>
                          <option value='Clinical Skills'>Clinical Skills</option>
                          <option value='Critical Care'>Critical Care</option>
                          <option value='Dermatology'>Dermatology</option>
                          <option value='Ear, Nose and Throat'>Ear, Nose and Throat</option>
                          <option value='Emergency Medicine'>Emergency Medicine</option>
                          <option value='Emergency Nursing'>Emergency Nursing</option>
                          <option value='Endocrinology and Diabetes'>Endocrinology and Diabetes</option>
                          <option value='Gastroenterology'>Gastroenterology</option>
                          <option value='General Dentistry'>General Dentistry</option>
                          <option value='General Medicine'>General Medicine</option>
                          <option value='General Practice'>General Practice</option>
                          <option value='Geriatrics'>Geriatrics</option>
                          <option value='Haematology'>Haematology</option>
                          <option value='Immunology'>Immunology</option>
                          <option value='Internal Medicine'>Internal Medicine</option>
                          <option value='Maxillofacial and Plastic Surgery'>Maxillofacial and Plastic Surgery</option>
                          <option value='Microbiology'>Microbiology</option>
                          <option value='Midwifery'>Midwifery</option>
                          <option value='Nephrology'>Nephrology</option>
                          <option value='Neurology'>Neurology</option>
                          <option value='Nursing'>Nursing</option>
                          <option value='Obstetrics and Gynaecology'>Obstetrics and Gynaecology</option>
                          <option value='Occupational Health'>Occupational Health</option>
                          <option value='Oncology'>Oncology</option>
                          <option value='Ophthalmology'>Ophthalmology</option>
                          <option value='Oral Medicine'>Oral Medicine</option>
                          <option value='Orthopaedics'>Orthopaedics</option>
                          <option value='Paediatric Nursing'>Paediatric Nursing</option>
                          <option value='Paediatrics'>Paediatrics</option>
                          <option value='Pain Medicine'>Pain Medicine</option>
                          <option value='Palliative Care'>Palliative Care</option>
                          <option value='Pathology and Laboratory Medicine'>Pathology and Laboratory Medicine</option>
                          <option value='Pharmacology'>Pharmacology</option>
                          <option value='Psychiatry'>Psychiatry</option>
                          <option value='Public Health'>Public Health</option>
                          <option value='Radiology'>Radiology</option>
                          <option value='Respiratory'>Respiratory</option>
                          <option value='Restorative Dentistry'>Restorative Dentistry</option>
                          <option value='Rheumatology'>Rheumatology</option>
                          <option value='Surgery'>Surgery</option>
                          <option value='Urology'>Urology</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6 inputGroupContainer">
                      <label class="control-label">No. Syndicate</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>
                        <input name="syndicate" placeholder="..." class="form-control" type="text">
                      </div>
                    </div>

                    <div class="col-md-6 inputGroupContainer">
                      <label class="control-label">the scientific degree</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>
                        <input name="scientific" placeholder="..." class="form-control" type="text">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-6 inputGroupContainer conditions">
                    <input type="checkbox" id="conditions">
                    <label class="control-label"><a href="<?= the_field('term_conditions_page', 'option'); ?>"> {{ _e('Accept our Terms & Conditions', 'theme') }} </a></label>                    
                  </div>
                </div>
                <div class="form-group">
                  <div class="row justify-content-center">
                    <div class="col-md-3 col-12 inputGroupContainer">
                      <button class="form-control btn-primary register-doctor" type="submit">Create</button>
                    </div>
                  </div>
                </div>
                <input type="hidden" name="role_user" value="doctor">
              </form>
            </div>
          </div>
          @endif

          @if($status == 'customer')
          <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="container mt-3">

              <div class="register-message" style="display:none;"></div>
              <div class="sl-loader">
                <div class="spinner">
                  <div class="rect1"></div>
                  <div class="rect2"></div>
                  <div class="rect3"></div>
                  <div class="rect4"></div>
                  <div class="rect5"></div>
                </div>
              </div>

              <form action="" method="get">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6 inputGroupContainer">
                      <label class="control-label">First Name</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input name="first_name" placeholder="First Name..." class="form-control" type="text">
                      </div>
                    </div>
                    <div class="col-md-6 inputGroupContainer">
                      <label class="control-label">Last Name</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input name="last_name" placeholder="Last Name..." class="form-control" type="text">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6 inputGroupContainer">
                      <label class="control-label">Email</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                        <input name="email" placeholder="user@email.com" class="form-control" type="email">
                      </div>
                    </div>
                    <div class="col-md-6 inputGroupContainer">
                      <label class="control-label">Phone</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                        <input name="mobile" placeholder="(+20)0123456789" class="form-control" type="number">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6 inputGroupContainer">
                      <label class="control-label">Password</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i toggle="#password-field-2" class="fa fa-fw fa-eye field-icon toggle-password"></i></span>
                        <input id="password-field-2" placeholder="********" type="password" class="form-control" name="password">
                      </div>
                    </div>
                    <div class="col-md-6 inputGroupContainer">
                      <label class="control-label">Gender</label>
                      <div class="input-group">
                        <select name="gender" class="form-control">
                          <option value="0" selected>choose..</option>
                          <option value="male">male</option>
                          <option value="male">female</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-6 inputGroupContainer conditions">
                    <input type="checkbox" id="conditions">
                    <label class="control-label"><a href="<?= the_field('term_conditions_page', 'option'); ?>"> {{ _e('Accept our Terms & Conditions', 'theme') }} </a></label>                    
                  </div>
                </div>
                <div class="form-group">
                  <div class="row justify-content-center">
                    <div class="col-md-3 col-12 inputGroupContainer">
                      <button class="form-control btn-primary register-doctor" type="submit">Create</button>
                    </div>
                  </div>
                </div>
                <input type="hidden" name="role_user" value="patient">
              </form>

            </div>
          </div>
          @endif

        </div>


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

          .inputGroupContainer span.input-group-addon {
            position: absolute;
            right: 0;
            z-index: 9;
            height: 100%;
            padding: 5px 10px;
            font-size: 20px;
            color: #ccc;
          }

          .inputGroupContainer {
            position: relative;
            margin: 15px 0 0;
          }

          .toggle-password {
            cursor: pointer;
          }

          .tab-content .tab-pane {
            background-color: #fbfbfb;
            border-radius: 4px;
            box-shadow: 0 0 2px 0 rgba(70, 114, 122, 0.42);
            padding: 15px;
            margin-top: 20px;
          }

          .nav-tabs a {
            color: #a19999;
          }

          .conditions {
            padding: 0;
          }

          .conditions label.control-label {
            margin: 10px;
          }

          .conditions input {
            position: relative;
            top: -2px;
          }

          .conditions label.control-label a {
            color: #525ddd;
          }

          .spinner {
            margin: 100px auto;
            width: 50px;
            height: 40px;
            text-align: center;
            font-size: 10px;
          }

          .spinner>div {
            background-color: #333;
            height: 100%;
            width: 6px;
            display: inline-block;

            -webkit-animation: sk-stretchdelay 1.2s infinite ease-in-out;
            animation: sk-stretchdelay 1.2s infinite ease-in-out;
          }

          .spinner .rect2 {
            -webkit-animation-delay: -1.1s;
            animation-delay: -1.1s;
          }

          .spinner .rect3 {
            -webkit-animation-delay: -1.0s;
            animation-delay: -1.0s;
          }

          .spinner .rect4 {
            -webkit-animation-delay: -0.9s;
            animation-delay: -0.9s;
          }

          .spinner .rect5 {
            -webkit-animation-delay: -0.8s;
            animation-delay: -0.8s;
          }

          @-webkit-keyframes sk-stretchdelay {

            0%,
            40%,
            100% {
              -webkit-transform: scaleY(0.4)
            }

            20% {
              -webkit-transform: scaleY(1.0)
            }
          }

          @keyframes sk-stretchdelay {

            0%,
            40%,
            100% {
              transform: scaleY(0.4);
              -webkit-transform: scaleY(0.4);
            }

            20% {
              transform: scaleY(1.0);
              -webkit-transform: scaleY(1.0);
            }
          }

          .sl-loader {
            position: absolute;
            width: 100%;
            left: 0;
            background-color: hsla(187, 31%, 43%, 0.15);
            z-index: 99;
            height: 100%;
            top: 0;
            border-radius: 4px;
            display: none;
          }

          .tab-content .tab-pane {
            position: relative;
          }

          .register-message {
            position: absolute;
            width: 100%;
            z-index: 99;
            height: 100%;
            left: 0;
            top: 0;
            padding: 10%;
            background-color: rgba(19, 6, 6, 0.3);
            border-radius: 4px;
          }

          .register-message span {
            width: 100%;
            display: inline-block;
            text-align: center;
            text-transform: capitalize;
          }
      </style>


      <script>
        jQuery(function($) {
          $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
              input.attr("type", "text");
            } else {
              input.attr("type", "password");
            }
          });


          $('.register-doctor').on('click',function(e){
            e.preventDefault();

            var first_name      = $('input[name="first_name"]').val();
            var last_name       = $('input[name="last_name"]').val();
            var email           = $('input[name="email"]').val();
            var mobile          = $('input[name="mobile"]').val();
            var password        = $('input[name="password"]').val();
            var gender          = $('select[name="gender"]').children("option:selected").val();
            var license         = $('input[name="license"]').val();
            var specialty       = $('select[name="specialty"]').children("option:selected").val();
            var syndicate       = $('input[name="syndicate"]').val();
            var scientific      = $('input[name="scientific"]').val();
            var role_user       = $('input[name="role_user"]').val();
          
            $.ajax({
              type:"POST",
              url:"<?php echo admin_url('admin-ajax.php'); ?>",
              data: {
                action      : "register_user_front_end",
                first_name  : first_name,
                last_name   : last_name,
                email       : email,
                mobile      : mobile,
                password    : password,
                gender      : gender,
                license     : license,
                specialty   : specialty,
                syndicate   : syndicate,
                scientific  : scientific,
                role_user   : role_user,
              },
              beforeSend: function(results) {
                $('#sl-loader').show();
              },
              success: function(results){
                $('.register-message').html(results).show();
                $('.sl-loader').hide();
              },
              error: function(results) {
                $('.register-message').html('plz try again later').show();
                $('.sl-loader').hide();
              }
            });
          });
        });
      </script>
    @else 
      @php 
        wp_redirect( get_field('profile_link', 'option') );
        exit;
      @endphp
    @endif
                
  @endwhile
@endsection