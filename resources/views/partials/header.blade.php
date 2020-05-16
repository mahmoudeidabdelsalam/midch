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
        
        <a class="button-green" href="#">login</a>
      </div>
    </nav>
  </div>
</header>


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
</style>