<?php global $fields; ?>

<section id="about">

  <!-- Top of page: image/text -->

  <div class="img-container">
    <div class="img">
      <img src=<?= $fields['image']['url'] ?>>
    </div>

    <div class="text-block">
      <div class="heading">
        <h1><?= $fields['title'] ?></h1>
      </div>
      <div class="body">
        <?= $fields['textarea'] ?>
      </div>
    </div>
  </div>

  <!-- Down arrow navigating to contact section-->

  <div class="down-arrow">
    <a href="#contact">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
        <path d="M3.375,15.375a12,12,0,1,0,12-12A12,12,0,0,0,3.375,15.375Zm16.679-2.5a1.118,1.118,0,0,1,1.575,0,1.1,1.1,0,0,1,.323.785,1.119,1.119,0,0,1-.329.79l-5.44,5.423a1.112,1.112,0,0,1-1.535-.035l-5.521-5.5A1.114,1.114,0,0,1,10.7,12.756l4.679,4.725Z" transform="translate(-3.375 -3.375)" fill="#DAA520 " /></svg>
    </a>
    <ins>
      <p>contact us</p>
    </ins>
  </div>
  <div id="contact" class="container-small">
    <?= $fields['contact'] ?>
  </div>
</section>