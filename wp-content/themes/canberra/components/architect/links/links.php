<?php
global $fields;
?>
<section id="links">
  <div class="container-small">
    <div class="grid-col-4">
      <?php foreach ($fields['links'] as $links) : ?>
        <div class="frame">
          <div class="card">
            <div class="img" style="background-image: url('<?= $links['image']['url'] ?>');"></div>
            <div class="gradient">
              <div class="data">
                <a href="<?= get_permalink($links['link']) ?>">
                  <h3><?= $links['link']->post_title; ?></h3>
                </a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>