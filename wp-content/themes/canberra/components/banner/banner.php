<?php
global $fields;
?>

<section id="banner">
  <div class="left">
    <h1 class="h1"><?= $fields['title'] ?></h1>
  </div>
  <div class="right">
    <img class="img" src="<?= $fields['image']['url'] ?>">
  </div>
  <div class="more">
    <?= get_svg('down') ?>
    <p>Scroll down</p>
  </div>

</section>