<?php
global $fields;
?>
<section id="textarea">
  <div class="container-small">
      <p class="post_info">
          Posted by <?php the_author_posts_link(); ?>&nbsp; | &nbsp;
          <?php the_time('j F Y'); ?>&nbsp; | &nbsp;
          <?php the_category(', '); ?>
      </p>
    <div class="text"><?= $fields['text'] ?></div>
  </div>
</section>