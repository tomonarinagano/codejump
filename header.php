<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php wp_head(); ?>
  </head>
  <body>
    <header>
      <div class="container">
        <h1 class="logo">
          <a href="/"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="ロゴ画像" /></a>
        </h1>
        <nav>
          <?php
            wp_nav_menu(array(
              'theme_location' => 'main-menu',
              'container' => false,
              'menu_class' => '',

            ));
          ?>
        </nav>
      </div>
    </header>