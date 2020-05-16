{{--
  Template Name: Home Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp

  <section class="bg-sections section-slide">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 col-12">
          <img src="{{ the_field('image_slide') }}" alt="{{ the_field('headlien_slide') }}">
        </div>
        <div class="col-md-6 col-12">
          <h2 class="headline">{{ the_field('headlien_slide') }}</h2>
          <p>{{ the_field('instructions_slide') }}</p>
          <a href="#" class="button-green">login</a>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-white section-work">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-12 col-12 text-center">
          <h3 class="sub-headline">{{ the_field('sub_headline_work') }}</h3>
          <h2 class="headline">{{ the_field('headline_work') }}</h2>
        </div>
        <div class="col-md-12 col-12 text-center">
          <img class="img-fluid" src="{{ the_field('image_work') }}" alt="{{ the_field('headline_work') }}">
        </div>
      </div>
    </div>
  </section>

  <section class="bg-gray section-about">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-12 col-12 text-center">
          <h3 class="sub-headline">{{ the_field('sub_headline_about') }}</h3>
          <h2 class="headline">{{ the_field('headline_about') }}</h2>
        </div>
        <div class="col-md-6 col-12">
          <img src="{{ the_field('image_about') }}" alt="{{ the_field('headline_about') }}">
        </div>
        <div class="col-md-6 col-12">
          <h2 class="headline">{{ the_field('headline_about') }}</h2>
          <p>{{ the_field('instructions_about') }}</p>

          <?php 
          $link = get_field('link_about');
          if( $link ): 
              $link_url = $link['url'];
              $link_title = $link['title'];
              $link_target = $link['target'] ? $link['target'] : '_self';
              ?>
              <a class="button-green" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

  <section class="section-contact-us">
    <div id="map">
      {{ the_field('link_map') }}
    </div>
    <div class="container contact-us">
      <div class="row align-items-center">
        <div class="col-md-7 col-12">
          <div class="form-contact">
            <h4>{{ _e('get in touch', 'theme') }}</h4>
            @php
              $form = get_field('id_form_contact_us');
            @endphp
            @if ($form)
              <?= do_shortcode( '[gravityform id="'.$form.'" name="" title="false" description="false" ajax="true" ]' ); ?>
            @endif
          </div>
        </div>
        <div class="col-md-5 col-12 bg-light-blue">
          <h2 class="text-white text-left">{{ the_field('headline_information') }}</h2>
          <p class="text-white">{{ the_field('content_information') }}</p>
          <div class="list-contact">
            <?php
            if( have_rows('list_information') ):
              while ( have_rows('list_information') ) : the_row();
            ?>
              <p><?php the_sub_field('icon_list'); ?> <span><?php the_sub_field('content_list'); ?></span></p>
            <?php
              endwhile;
            endif;
            ?>
          </div>
        </div>
      </div>
    </div>
  </section>



  @endwhile
@endsection

<style>
  section.section-slide {
    min-height: 550px;
  }

  section.section-slide h2 {
    color: #fff;
  }

  h2.headline {
    font-size: 50px;
    font-weight: 100;
    text-transform: uppercase;
  }

  h2.headline .first-word {
    font-weight: 600;
  }

  section.section-slide img {
    max-width: 100%;
    max-height: 380px;
    margin-top: 65px;
  }

  section.section-slide p {
    color: #fff;
  }

  h3.sub-headline {
    text-transform: uppercase;
    font-size: 20px;
    font-weight: 900;
  }

  section.section-work {
    padding: 100px 0;
  }

  section.bg-gray {
    background: #F5F5F5;
    padding: 100px 0;
  }

  .section-about img {
    max-width: 400px;
  }

  .section-contact-us {
    background: #2A323F;
    position: relative;
    padding-bottom: 100px;
  }

  div#map {
    height: 300px;
  }

  div#map iframe {
    position: absolute;
    width: 100%;
    height: 300px;
  }

  .contact-us {
    margin-top: -200px;
    position: relative;
    z-index: 9;
    background: #fff;
  }

  .form-contact {
    padding: 100px;
  }

  .gform_wrapper .top_label .gfield_label {
    display: none !important;
  }

  .gform_wrapper form li .form-control {
    border-top: none !important;
    border-left: none !important;
    border-right: none !important;
  }

  .form-contact h4 {
    font-size: 40px;
    text-transform: uppercase;
    font-weight: bold;
  }

  .gform_wrapper .gform_footer .btn {
    background-color: #18dfc3;
    border: none;
    padding-bottom: 2px;
    border-radius: 40px;
  }
  .bg-light-blue {
    background: #00C9FD;
    height: 570px;
    padding: 100px !important;
  }  
  .list-contact p {
    color: #fff;
}

.list-contact p i {
    border: 1px solid #fff;
    padding: 10px;
    border-radius: 100%;
    height: 30px;
    width: 30px;
    display: inline-flex;
    justify-content: center;
    align-items: center;
}
  </style>
