<header class="banner">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light p-0">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="{{ home_url('/') }}" title="{{ get_bloginfo('name') }}">
          <img class="img-fluid" src="@if(get_field('website_logo', 'option')) {{ the_field('website_logo','option') }} @else {{ get_theme_file_uri().'/dist/images/logo.png' }} @endif" alt="{{ get_bloginfo('name', 'display') }}" title="{{ get_bloginfo('name') }}"/>
          <span class="sr-only"> {{ get_bloginfo('name') }} </span>
        </a>
        @if (has_nav_menu('primary_navigation'))
          {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'container' => false, 'menu_class' => 'navbar-nav mr-auto mt-2 mt-lg-0', 'walker' => new NavWalker()]) !!}
        @endif
        @if ( is_user_logged_in() )
        @php 
          global $current_user;
          wp_get_current_user();
        @endphp
          <ul class="list-unstyled" id="listUser">
            <li><a href="{{ the_field('profile_link', 'option') }}"> <img src="{{ get_theme_file_uri().'/dist/images/user-sm.png' }}" alt="<?= the_author_meta( 'display_name', $current_user->ID ); ?>"> <?= the_author_meta( 'display_name', $current_user->ID ); ?> </a></li>
            <li><a href="<?php echo wp_logout_url( home_url() ); ?>">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
          </ul>
        @else 
          <a class="button-green" href="#" data-toggle="modal" data-target="#LoginModal">login</a>
        @endif
      </div>
    </nav>
  </div>
</header>

@php 
  $args = array(
    'echo'           => true,
    'redirect'       => get_field('profile_link', 'option'),
    'form_id'        => 'loginform',
    'label_username' => __( 'User or E-mail' ),
    'label_password' => __( 'Password' ),
    'label_remember' => __( 'Remember Me' ),
    'label_log_in'   => __( 'Log In' ),
    'id_username'    => 'user_login',
    'id_password'    => 'user_pass',
    'id_remember'    => 'rememberme',
    'id_submit'      => 'wp-submit',
    'remember'       => true,
    'value_username' => '',
    'value_remember' => false,
  );
@endphp


<!-- Modal -->
<div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ _e('Login', 'theme') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php wp_login_form($args); ?>
      </div>
    </div>
  </div>
</div>

<style>
  header.banner {
    background: #303135;
  }

  header.banner .navbar-brand {
    max-width: 58px;
  }

  header.banner ul li .nav-link {
    color: #FFFFFF !important;
    font-size: 22px;
    text-transform: uppercase;
    font-weight: 500 !important;
    padding-top: 20px;
  }
  .button-green {
    background: linear-gradient(169.78deg, #1ADB72 -0.5%, #10B151 100%), linear-gradient(187.36deg, #3F6AFF 13.67%, #00ABF4 116.7%);
    color: #fff;
    padding: 10px 20px 5px;
    border-radius: 4px;
  }

  .button-green:hover {
      background: linear-gradient(160.38deg, #10b151 -0.5%, #1adb72 100%);
      transition: all 1s;
      color: #fff;
  }  
  a:hover {
    text-decoration: none;
  }
  form#loginform input#user_login, form#loginform input#user_pass, form#loginform input#wp-submit {
      display: block;
      width: 100%;
      height: 40px;
      border: none;
      font-family: sans-serif !important;
      padding: 10px;
      background-color: #f3f3f3;
      border-radius: 4px;
      border: 1px solid #333;
      line-height: initial;
  }
  form#loginform input#wp-submit {
      background-color: #333;
      color: #fff;
  }
  ul#listUser li a {
    font-family: sans-serif;
    color: #fff;
    font-size: 22px;
    font-weight: 500 !important;
    padding-top: 20px;
  }
  ul#listUser {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0;
  }
  ul#listUser li {
    margin: 0 10px;
  }
  ul#listUser li a img {
    width: 30px;
    position: relative;
    top: -3px;
  }
  ul#listUser li:nth-child(1) {
    border-right: 3px solid #fff;
    padding-right: 20px;
  }
</style>