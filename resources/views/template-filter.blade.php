{{--
  Template Name: Filter Template
--}}

@extends('layouts.app')

<?php 
  $paged    = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
  $title    = isset($_GET['title']) ? $_GET['title'] : '';
  $nid      = isset($_GET['nid']) ? $_GET['nid'] : '';
  $country  = isset($_GET['country']) ? $_GET['country'] : '0';
  $user     = isset($_GET['user']) ? $_GET['user'] : '0';
?>
@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="title-header">{{ _e('Patients', 'theme') }}</h2>
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
      $args = array(
        'post_type' => 'patient',
        'suppress_filters' => 0,
        'posts_per_page' => 10,
        'paged' => $paged,
      );

      if($title != '') {
        $args['s'] = $title;
      }

      if($user) {
        $args['meta_query'] = array(
          'relation' => 'OR',
          array(
            'key' => 'author_id',
            'value' => $user,
            'compare' => 'LIKE',
          ),
          array(
            'key' => 'author_id',
            'value' => $user,
            'compare' => '='
          )
        );
      }

      if($nid) {
        $args['meta_query'] = array(
          'relation' => 'OR',
          array(
            'key' => 'national_id',
            'value' => $nid,
            'compare' => 'LIKE',
          ),
          array(
            'key' => 'national_id',
            'value' => $nid,
            'compare' => '='
          )
        );
      }

      if( $country != '0') {
        $args['tax_query'] = array(
          array(
            'taxonomy' => 'country',
            'field'    => 'term_id',
            'terms'    => $country,
          ),
        );
      }

      $query = new \WP_Query( $args );
      $cards = get_posts($args);
    ?>
    <div class="container">
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
  @endwhile
@endsection


<style>
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