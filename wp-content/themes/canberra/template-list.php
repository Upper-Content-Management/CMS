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
?>
<section id="list">
  <div class="container">
    <div class="grid-col-4">
      <?php
      while ($loop->have_posts()) : $loop->the_post();
        $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail'); ?>
        <div class="frame">
          <div class="card">
            <div class="img" style="background-image: url('<?= $image[0]; ?>');"></div>
            <div class="gradient">
              <div class="data">
                <?php
                the_title('<h3 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute('echo=0') . '" rel="bookmark">', '</a></h3>');
                ?>
              </div>
            </div>
          </div>
          <div class="entry-content">
            <?php the_content(); ?>
          </div>
        </div>

      <?php endwhile; ?>
    </div>
  </div>
</section>
<?php
get_footer();
