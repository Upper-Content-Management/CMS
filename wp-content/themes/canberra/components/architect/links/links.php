<?php
global $fields;
?>
<section id="links">
  <div class="container-small">
    <div class="grid-col-4">
      <?php foreach ($fields['links'] as $links) : ?>
        <div class="frame">
          <a href="<?= get_permalink($links['link']) ?>">
            <div class="card">
              <div class="img" style="background-image: url('<?= $links['image']['url'] ?>');"></div>
              <div class="gradient">
                <div class="data">
                  <h3><?= $links['link']->post_title; ?></h3>
                </div>
              </div>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>