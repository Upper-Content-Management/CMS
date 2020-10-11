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
  </div>
</section>