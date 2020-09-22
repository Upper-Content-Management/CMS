<?php
// Enqueue js and css files from manifest produced by webpack
function enqueue_from_manifest() {
  $path = get_stylesheet_directory() . '/dist/manifest.json';
  if (file_exists($path)) {
    $str = file_get_contents($path);
    $json = json_decode($str, true);
    wp_enqueue_style('main.css', get_template_directory_uri() . '/dist/' . $json['main.css']);
    wp_enqueue_script('main.js', get_template_directory_uri() . '/dist/' . $json['main.js']);
  }
}
add_action('wp_enqueue_scripts', 'enqueue_from_manifest');

// Increase width of sidebar from 160px -> 180px
function admin_style() {
  wp_enqueue_style('admin-styles', get_template_directory_uri() . '/admin.css');
}
add_action('admin_enqueue_scripts', 'admin_style');
