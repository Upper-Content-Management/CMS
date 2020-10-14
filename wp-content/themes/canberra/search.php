<?php
get_header();
?>

<section id="search">
  <div class="container-small">
    <h3>Search Result for : <?php echo htmlentities($s, ENT_QUOTES, 'UTF-8'); ?> </h3>
    <div class="grid-col-4">
      <?php if (have_posts()) : while (have_posts()) : the_post();
          $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
      ?>
          <div class="frame">
            <div class="card">
              <div class="img" style="background-image: url('<?= $image[0]; ?>');">
                <div class="gradient">
                  <div class="data">
                    <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
</section>

<?php
get_footer();
