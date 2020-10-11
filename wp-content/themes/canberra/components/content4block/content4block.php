<?php
global $fields;
?>

<section id="content4block">
  <div class="container">
    <div class="toprow">
      <div class="largecard">
        <?php foreach ($fields['largeimage'] as $largeimage) : ?>
          <div class="card">
            <div class="img" style="background-image: url('<?= $largeimage['image']['url'] ?>');"></div>
            <div class="gradient">
              <div class="data">
                <h6><?= $largeimage['title'] ?></h6>
                <h3><?= $largeimage['description'] ?></h3>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="smallcards">
        <?php foreach ($fields['smallerimages'] as $smallerimage) : ?>
          <div class="card">
            <div class="img" style="background-image: url('<?= $smallerimage['image']['url'] ?>');"></div>
            <div class="gradient">
              <div class="data">
                <h6><?= $smallerimage['title'] ?></h6>
                <h3><?= $smallerimage['description'] ?></h3>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="widecard">
      <?php foreach ($fields['wideimage'] as $wideimage) : ?>
        <div class="card">
          <div class="img" style="background-image: url('<?= $wideimage['image']['url'] ?>');"></div>
          <div class="gradient">
            <div class="data">
              <h6><?= $wideimage['title'] ?></h6>
              <h3><?= $wideimage['description'] ?></h3>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>