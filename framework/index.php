<?php
 /**
 * Load all custome fields folder
 * Load all page templates
 */

add_action('wp_enqueue_scripts', function () {
  wp_enqueue_style('custom/custom-classes', get_theme_file_uri() . '/framework/assets/custom-classes.css', false, null);
  wp_enqueue_style('custom/jquery-ui', get_theme_file_uri() . '/framework/assets/jquery-ui.css', false, null);
  wp_enqueue_script('custom/scripts.js', get_theme_file_uri() . '/framework/assets/scripts.js', null, true);
}, 100);


 $files = array_merge(
   glob(__DIR__.'/utilities/*.php'),
   glob(__DIR__.'/actions/*.php'),
   glob(__DIR__.'/hooks/*.php'),
   glob(__DIR__.'/filters/*.php'),
   glob(__DIR__.'/custom-fields/*.php'),
   glob(__DIR__.'/post-type/*.php'),
   glob(__DIR__.'/taxonomies/*.php'),
   glob(__DIR__.'/backend/*.php'),
   glob(__DIR__.'/admin-columns/*.php'),
   glob(__DIR__.'/builder/*.php')

 );
 foreach ($files as $filename)
 {
   include $filename;
 }
