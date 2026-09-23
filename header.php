<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <?php
      // ブログの説明文（キャッチフレーズ）を取得
      $description = get_bloginfo('description');

      // サイト名を取得
      $ogp_title   = get_bloginfo('name');

      // サイトのトップページURLを取得
      $ogp_url     = home_url('/');

      // ページのタイプを「Webサイト」に指定
      $ogp_type    = 'website';

      // デフォルトのOGP画像（共通の画像）のパスを指定
      $ogp_image   = get_template_directory_uri() . '/img/ogp.png';

      // もし「投稿詳細ページ（is_single）」または「固定ページ（is_page）」なら
      if (is_single() || is_page()) {

        // データベースから該当する記事データを準備する（メインクエリ）
        if (have_posts()) {
            while (have_posts()) {
                the_post(); // 記事データをセット

                $ogp_title = get_the_title(); // 記事の「タイトル」に上書き
                $ogp_url   = get_permalink(); // 記事の「個別URL」に上書き
                $ogp_type  = 'article';       // タイプを「記事」に変更

                // 説明文（description）の差し替え
                if (has_excerpt()) {
                    // 抜粋（概要）が入力されていればそれを使う
                    $description = get_the_excerpt();
                } else {
                    // 抜粋がなければ、本文から80文字を抜き出して末尾に「...」をつける
                    $description = wp_trim_words(get_the_content(), 80, '...');
                }

                // OGP画像（アイキャッチ）の差し替え
                if (has_post_thumbnail()) {
                    $image_id  = get_post_thumbnail_id(); // アイキャッチのIDを取得
                    $image_src = wp_get_attachment_image_src($image_id, 'full'); // 画像のURLを取得
                    if ($image_src) {
                        $ogp_image = $image_src[0]; // アイキャッチ画像のURLに上書き
                    }
                }
            }
        }
      }
    ?>
    <meta name="description" content="<?php echo esc_attr($description); ?>">
    <meta property="og:site_name" content="<?php echo esc_attr(get_bloginfo('name')); ?>">
    <meta property="og:title" content="<?php echo esc_attr($ogp_title); ?>">
    <meta property="og:description" content="<?php echo esc_attr($description); ?>">
    <meta property="og:type" content="<?php echo esc_attr($ogp_type); ?>">
    <meta property="og:url" content="<?php echo esc_url($ogp_url); ?>">
    <meta property="og:image" content="<?php echo esc_url($ogp_image); ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo esc_attr($ogp_title); ?>">
    <meta name="twitter:description" content="<?php echo esc_attr($description); ?>">
    <meta name="twitter:image" content="<?php echo esc_url($ogp_image); ?>">

    <?php if ( $_SERVER['HTTP_HOST'] !== 'localhost' && ! is_user_logged_in() ) : ?>
      <!-- Google Tag Manager -->
      <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-P664RVZP');</script>
      <!-- End Google Tag Manager -->
    <?php endif; ?>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <?php if ($_SERVER['HTTP_HOST'] !== 'localhost' && ! is_user_logged_in() ) : ?>
      <!-- Google Tag Manager (noscript) -->
      <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P664RVZP"
      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
      <!-- End Google Tag Manager (noscript) -->
    <?php endif; ?>
    <header class="header">
      <div class="container">
        <h1 class="logo">
          <a href="<?php echo esc_url( home_url() ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo.png" alt="ロゴ画像" /></a>
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