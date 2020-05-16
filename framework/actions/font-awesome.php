<?php
add_action( 'admin_enqueue_scripts', function() {
  wp_enqueue_style('fontawesome', 'https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css');
}, 100);