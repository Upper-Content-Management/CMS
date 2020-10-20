<?php
global $fields;
?>
<section id="textarea">
  <div class="container-small">
      <p class="post_date"><?php the_time('j F Y'); ?></p>
      &nbsp; | &nbsp;
      <p class="cat"><?php the_category(' &nbsp; '); ?></p>
    <div class="text"><?= $fields['text'] ?></div>
        <?php 
        $prev_post = get_previous_post();
        if (!empty( $prev_post )): ?>

            <div class="prev">
                <a href="<?php echo get_permalink( $prev_post->ID ); ?>">
                    <?= get_svg('prev'); ?>
                    <p>Previous news item &nbsp;</p>
                </a>
            </div>

        <?php endif; 

        $next_post = get_next_post();
        if ( is_a( $next_post , 'WP_Post' ) ) { ?>

            <div class="next">
                <a href="<?php echo get_permalink( $next_post->ID ); ?>">
                    <p>Next news item  </p>
                    <?= get_svg('next'); ?>
                </a>
            </div>

        <?php } ?>
  </div>
</section>