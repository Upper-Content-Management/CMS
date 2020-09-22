<?php

function get_svg($svg_name) {
  return file_get_contents(get_stylesheet_directory() . '/src/img/svgs/' . $svg_name . '.svg');
}

function get_img_url($img_name) {
  return get_template_directory_uri() . '/src/img/' . $img_name;
}
