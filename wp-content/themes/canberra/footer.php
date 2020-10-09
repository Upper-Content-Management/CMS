<footer>
  <div class="container">
    <div class="grid-col-3">
      <div class="logo">
        <img src="<?= get_img_url('logo.png') ?>">
      </div>
      <div class="menu-col">
        <h6>Company</h6>
        <?php wp_nav_menu(array('echo' => true)); ?>
      </div>
      <div class="small-text">
        <p>By Morgan Wilde, Stef, Millie</p>
        <p>Site for Backend Web Development [11058]</p>
      </div>
    </div>
  </div>

</footer>


<?php wp_footer(); ?>

</body>

</html>