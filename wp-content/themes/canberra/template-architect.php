<?php

/**
 *  Template Name: Architect
 * Template Post Type: architect
 */

get_header();

$page_components = get_field('architect_components');
if ($page_components) {
  foreach ($page_components as $page_component) {
    $component_name = str_replace('_', '-', $page_component['acf_fc_layout']);
    global $fields;
    $fields = $page_component;
    get_template_part("components/architect/$component_name/$component_name");
  }
}

if (is_single()) comments_template();
get_footer();
