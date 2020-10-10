<?php
global $fields;
?>
<section id="image" class="container">
  <div class="container-small title">
    <h1><?= get_the_title(); ?></h1>
  </div>
  <div class="img" style="background-image: url('<?= $fields['image']['url'] ?>');"></div>
</section>