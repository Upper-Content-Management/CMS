<?php
global $fields;
?>
<section id="imageantext">
  <div class="container-small">
    <img class="image" src="<?= $fields['image']['url'] ?>">
  </div>
  <div class="container title">
    <h1><?= get_the_title(); ?></h1>
  </div>
  <div class="container-small">
    <div class="text"><?= $fields['text'] ?></div>
    <div class="categories">
      <p class="tag">Categories:</p>
        <p class="cat"><?php the_category(' &nbsp; '); ?></p>
    </div>
        <?php 
        $prev_post = get_previous_post();
        if (!empty( $prev_post )): ?>

            <div class="prev">
                <a href="<?php echo get_permalink( $prev_post->ID ); ?>">
                    <?= get_svg('prev'); ?>
                    <p>&nbsp; Previous architect</p>
                </a>
            </div>

        <?php endif; 

        $next_post = get_next_post();
        if ( is_a( $next_post , 'WP_Post' ) ) { ?>

            <div class="next">
                <a href="<?php echo get_permalink( $next_post->ID ); ?>">
                    <p>Next architect &nbsp;</p>
                    <?= get_svg('next'); ?>
                </a>
            </div>

        <?php } ?>
  </div>
</section>