<?php

/**
 *  Template Name: List
 */

get_header();

if ($pagename == 'houses') {
  $loop = new WP_Query(array('post_type' => 'house', 'posts_per_page' => 10));
}
if ($pagename == 'architects') {
  $loop = new WP_Query(array('post_type' => 'architect', 'posts_per_page' => 10));
}
if ($pagename == 'news') {
  $loop = new WP_Query(array('post_type' => 'article', 'posts_per_page' => 10));
}


while ($loop->have_posts()) : $loop->the_post();

  the_title('<h2 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute('echo=0') . '" rel="bookmark">', '</a></h2>');
?>

  <div class="entry-content">
    <?php the_content(); ?>
  </div>

<?php endwhile;

get_footer();
