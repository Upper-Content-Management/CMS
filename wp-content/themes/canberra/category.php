<?php
get_header();
?>
<section id="list">
  <div class="container">
    <h1><?= single_cat_title(); ?></h1>
    <div class="grid-col-4">
      <?php if (have_posts()) : while (have_posts()) : the_post();
          $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail'); ?>
          <div class="frame">
            <a href="<?= get_permalink() ?>">
              <div class="card">
                <div class="img" style="background-image: url('<?= $image[0]; ?>');"></div>
                <div class="gradient">
                  <div class="data">
                    <?php
                    the_title('<h3 class="entry-title">', '</h3>');
                    ?>
                  </div>
                </div>
              </div>
            </a>
          </div>

        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php
get_footer();
