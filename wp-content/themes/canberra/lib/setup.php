<?php

// Register menu locations
add_action('after_setup_theme', 'register_primary_menus');
function register_primary_menus() {
  register_nav_menus(array(
    'header' => 'Header',
    'footer' => 'Footer',
  ));
}

// Add the "Site Config" & "Components" settings page in the wordpress admin dashboard
acf_add_options_page(array(
  'page_title' => __('Site Configuration'),
  'menu_title' => __('Site Configuration'),
  'redirect' => false,
));

acf_add_options_page(array(
  'page_title' => __('Global Components'),
  'menu_title' => __('Global Components'),
  'redirect' => false,
  'icon_url' => 'dashicons-screenoptions'
));
