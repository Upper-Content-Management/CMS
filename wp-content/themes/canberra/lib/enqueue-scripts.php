<?php
// Enqueue js and css files from manifest produced by webpack
function enqueue_from_manifest() {
  $path = get_stylesheet_directory() . '/dist/manifest.json';
  if (file_exists($path)) {
    $str = file_get_contents($path);
    $json = json_decode($str, true);
    wp_enqueue_style('main.css', get_template_directory_uri() . '/dist/' . $json['main.css']);
    wp_enqueue_script('main.js', get_template_directory_uri() . '/dist/' . $json['main.js'], array('jquery'));
  }
}
add_action('wp_enqueue_scripts', 'enqueue_from_manifest');

// Increase width of sidebar from 160px -> 180px
function admin_style() {
  wp_enqueue_style('admin-styles', get_template_directory_uri() . '/admin.css');
}
add_action('admin_enqueue_scripts', 'admin_style');

// custom post type function
add_action('init', 'create_custom_post_types');
function create_custom_post_types() {
  register_post_type('article', array(
    'labels' => array(
      'name' => 'News',
      'singular_name' => 'Article',
      'add_new_item' => 'Add New Article'
    ),
    'public' => true,
    'has_archive' => true,
    'menu_icon' => 'dashicons-welcome-widgets-menus',
    'rewrite' => array('slug' => 'article'),
    'supports' => array('title', 'editor', 'thumbnail')
  ));
  register_post_type('house', array(
    'labels' => array(
      'name' => 'Houses',
      'singular_name' => 'House',
      'add_new_item' => 'Add New House'
    ),
    'public' => true,
    'has_archive' => true,
    'menu_icon' => 'dashicons-admin-home',
    'rewrite' => array('slug' => 'house'),
  ));
  register_post_type('architect', array(
    'labels' => array(
      'name' => 'Architects',
      'singular_name' => 'Architect',
      'add_new_item' => 'Add New Architect'
    ),
    'public' => true,
    'has_archive' => true,
    'menu_icon' => 'dashicons-businessperson',
    'rewrite' => array('slug' => 'architect'),
  ));
}
