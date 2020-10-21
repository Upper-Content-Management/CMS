<?php
get_header();
?>

<section id="search">
  <div class="container-small">
    <h3>Search result for: <?php echo htmlentities($s, ENT_QUOTES, 'UTF-8'); ?> </h3>
    <div class="grid-col-4">
      <?php
      if (have_posts()) : while (have_posts()) : the_post();
          $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
      ?>
          <div class="frame">
            <a href="<?= get_permalink() ?>">
              <div class="card">
                <div class="img" style="background-image: url('<?= $image[0]; ?>');">
                  <div class="gradient">
                    <div class="data">
                      <h3><?php the_title(); ?></h3>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
</section>

<?php
get_footer();
