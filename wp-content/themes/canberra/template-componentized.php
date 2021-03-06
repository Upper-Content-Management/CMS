<?php

/**
 *  Template Name: Componentized
 */

get_header();

$page_components = get_field('page_components');
if ($page_components) {
  foreach ($page_components as $page_component) {
    $component_name = str_replace('_', '-', $page_component['acf_fc_layout']);
    global $fields;
    $fields = $page_component;
    get_template_part("components/$component_name/$component_name");
  }
}

get_footer();
