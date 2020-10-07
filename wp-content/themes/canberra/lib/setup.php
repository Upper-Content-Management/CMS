<?php

// Register menu locations
add_action('after_setup_theme', 'register_primary_menus');
function register_primary_menus() {
  register_nav_menus(array(
    'header' => 'Header',
    'footer_company' => 'Footer - Company',
    'footer_program' => 'Footer - Program',
    'footer_information' => 'Footer - Information',
  ));
}

// Add the "Site Config" & "Components" settings page in the wordpress admin dashboard
// https://www.advancedcustomfields.com/resources/acf_add_options_page/

add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_page') ) {

        // Register options page.
        $option_page = acf_add_options_page(array(
            'page_title'    => __('Theme General Settings'),
            'menu_title'    => __('Theme Settings'),
            'menu_slug'     => 'theme-general-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));
    }
}
