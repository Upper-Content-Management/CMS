<footer>
  <div class="container">
    <div class="grid-col-3">
      <div class="logo">
        <?= get_svg('logo') ?>
      </div>
      <div class="menu-col">
        <h6>Company</h6>
        <?php wp_nav_menu(array('echo' => true)); ?>
      </div>
      <div class="small-text">
        <p>By Morgan Wilde, Stefanie Mamone and Millie Seserko</p>
        <p>Site for Backend Web Development [11058]</p>
        <p>This website was produced by students in the Faculty of Arts &amp; Design, University of Canberra. The text and images reproduced on this site were generously provided by <a href="http://www.canberrahouse.com.au/" target="_blank">Canberra House</a>.</p>
      </div>
    </div>
  </div>

</footer>


<?php wp_footer(); ?>

</body>

</html>