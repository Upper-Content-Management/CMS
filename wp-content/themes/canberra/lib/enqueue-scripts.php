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
add_theme_support('post-thumbnails');

// custom post type function
add_action('init', 'create_custom_post_types');
function create_custom_post_types() {
  register_post_type('article', array(
    'labels' => array(
      'name' => 'News',
      'singular_name' => 'Article',
      'add_new_item' => 'Add New Article',
      'publicly_queryable' => true,
    ),
    'public' => true,
    'has_archive' => true,
    'menu_icon' => 'dashicons-welcome-widgets-menus',
    'rewrite' => array('slug' => 'article'),
    'supports' => array('title', 'editor', 'thumbnail', 'comments'),
    'taxonomies'  => array('category'),
  ));
  register_post_type('house', array(
    'labels' => array(
      'name' => 'Houses',
      'singular_name' => 'House',
      'add_new_item' => 'Add New House',
      'publicly_queryable' => true,
    ),
    'public' => true,
    'has_archive' => true,
    'menu_icon' => 'dashicons-admin-home',
    'rewrite' => array('slug' => 'house'),
    'supports' => array('title', 'editor', 'thumbnail', 'comments'),
    'taxonomies'  => array('category'),
  ));
  register_post_type('architect', array(
    'labels' => array(
      'name' => 'Architects',
      'singular_name' => 'Architect',
      'add_new_item' => 'Add New Architect',
      'publicly_queryable' => true,
    ),
    'public' => true,
    'has_archive' => true,
    'menu_icon' => 'dashicons-businessperson',
    'rewrite' => array('slug' => 'architect'),
    'supports' => array('title', 'editor', 'thumbnail', 'comments'),
    'taxonomies'  => array('category'),
  ));
}
function my_acf_init() {
  acf_update_setting('google_api_key', 'AIzaSyDsVySgEIT9FOgtB0nPYOLojZqHcAGSnzI');
}
add_action('acf/init', 'my_acf_init');

function tg_include_custom_post_types_in_search_results($query) {
  if ($query->is_main_query() && $query->is_search() && !is_admin()) {
    $query->set('post_type', array('article', 'architect', 'house'));
  }
}
add_action('pre_get_posts', 'tg_include_custom_post_types_in_search_results');

function remove_posts_menu() {
  remove_menu_page('edit.php');
}
add_action('admin_menu', 'remove_posts_menu');

function namespace_add_custom_types($query) {
  if ($query->is_search)
    $query->set('post_type', array('post', 'house', 'architect', 'article'));
  return $query;
}
add_filter('pre_get_posts', 'namespace_add_custom_types');

/** * Search Form */
function wp_search_form($form) {
  $form = '<section class="search search-form"><form role="search" method="get" action="' . home_url('/') . '" > <label class="screen-reader-text" for="s">' . __('', 'domain') . '</label> <input type="search" class="search-field" value="' . get_search_query() . '" name="s" id="s" placeholder="Search..." /> <input type="submit" id="searchsubmit" class="search-submit" value="' . esc_attr__('Go', 'domain') . '" /> </form></section>';
  return $form;
}
add_filter('get_search_form', 'wp_search_form');

function fb_move_admin_bar() {
  echo '
    <style type="text/css">
    body.admin-bar #wphead {
       padding-top: 0;
    }
    body.admin-bar #footer {
       padding-bottom: 28px;
    }
    #wpadminbar {
        top: auto !important;
        bottom: 0;
        position: fixed;
    }
    #wpadminbar .ab-sub-wrapper {
      bottom: 32px;
    }
    </style>';
}
// on backend area
add_action('admin_head', 'fb_move_admin_bar');
// on frontend area
add_action('wp_head', 'fb_move_admin_bar');

function custom_post_type_cat_filter($query) {
  if (!is_admin() && $query->is_main_query()) {
    if ($query->is_category()) {
      $query->set('post_type', array('post', 'house', 'architect', 'article'));
    }
  }
}

add_action('pre_get_posts', 'custom_post_type_cat_filter');
