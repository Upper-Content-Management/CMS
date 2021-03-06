<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php wp_title('-', true, 'right'); ?> <?php bloginfo('name'); ?></title>
  <link rel="profile" href="https://gmpg.org/xfn/11" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
  <link rel="stylesheet" href="https://use.typekit.net/txd1pvb.css">

  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <header>
    <div id="nav-desktop">
      <div class="left">
        <a href="<?= home_url() ?> " class="logo">
          <?= get_svg('logo') ?>
        </a>
        <a href="<?= get_page_link(get_page_by_title('search')->ID); ?>">
          <?= get_svg('search') ?>
        </a>
        <a href="<?= wp_login_url(); ?>">
          <?= get_svg('user') ?>
        </a>
      </div>
      <div class="right">
        <?php wp_nav_menu(array('echo' => true)); ?>
      </div>
    </div>
    <div id="nav-mobile-placeholder"></div>
    <div id="nav-mobile">
      <div class="left">
        <a href="<?= home_url() ?> " class="logo">
          <?= get_svg('logo') ?>
        </a>
        <a href="<?= get_page_link(get_page_by_title('search')->ID); ?>">
          <?= get_svg('search') ?>
        </a>
        <a href="<?= wp_login_url(); ?>">
          <?= get_svg('user') ?>
        </a>
      </div>
      <div class="right">
        <div id="nav-mobile-bg-overlay" class="hidden visually-hidden"></div>
        <div id="nav-mobile-offcanvas">
          <?php wp_nav_menu(array('echo' => true)); ?>
        </div>
        <div id="toggle-nav-mobile-offcanvas" class="hamburger hamburger--spin">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
        </div>
      </div>
    </div>
  </header>