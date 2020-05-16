<footer class="footer">
  <div class="container-fluid">
    <div class="row align-items-center">
      <div class="col-md-12 col-12 text-center">
        @if( have_rows('social_networks', 'option') )
          <ul class="list-inline text-center m-0 social-btns">
            @while ( have_rows('social_networks', 'option') ) @php the_row(); @endphp
              <li class="list-inline-item"><a class="network" href="{{ the_sub_field('icon_name', 'option') }}"><i class="fa fa-{{ the_sub_field('icon_image', 'option') }}"></i></a></li>
            @endwhile
          </ul>
        @endif
      </div>
      <div class="col-md-12 col-12 text-center copyright">
        {{ _e('© 2020 MIDCH. All rights reserved.', 'theme') }}
      </div>
      <div class="col-md-12 col-12 text-center">
        @if (has_nav_menu('footer_navigation'))
          {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'container' => false, 'menu_class' => 'footer', 'walker' => new NavWalker()]) !!}
        @endif
      </div>
    </div>
  </div>
</footer>


<style>
  footer.footer {
    background: #2A323F;
    text-align: center;
    padding: 20px 0 0 0;
  }

  .social-btns li a {
    width: 40px;
    height: 40px;
    background: #fff;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    border-radius: 100%;
    color: #757575;
    box-shadow: 0 0 1px 1px #ffff;
    font-size: 20px;
  }

  .social-btns {
    margin-bottom: 20px !important;
  }

  .copyright {
    color: #fff;
    font-weight: 600;
  }

  ul.footer li a {
    color: #fff;
    text-decoration: underline;
    text-transform: uppercase;
  }

  ul.footer li {
    margin: 0 !important;
  }

  ul.footer {
    padding: 0;
  }
</style>