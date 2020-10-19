<?php
global $fields;
$i = 0;
?>

<section id="gallery">
  <div class="slider">
    <div class="slides">
      <?php foreach ($fields['gallery'] as $gallery) : ?>
        <div id="slide-<?= $i; ?>">
          <img class="img" src="<?= $gallery['url'] ?>" alt="<?= $gallery['title'] ?>">
          <div class="desc"><?= $gallery['caption'] ?></div>
          <?php $i++; ?>
        </div>
      <?php endforeach; ?>
    </div>
    <?php
    $i = 0;
    foreach ($fields['gallery'] as $gallery) :
    ?>
      <a href="#slide-<?= $i; ?>"></a>
      <?php $i++; ?>
    <?php endforeach; ?>
  </div>
</section>