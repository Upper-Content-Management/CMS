<?php
get_header();
?>
<section id="post">
  <?php
  if (have_posts()) {
    while (have_posts()) {
      the_post();
      the_content();
      the_comment();
      the_comments_navigation();
    }
  }
  ?>
</section>
<?php
get_footer();
