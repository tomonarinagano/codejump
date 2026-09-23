<?php
/**
 * テーマの基本設定
 */
function my_theme_setup() {
  // <title>タグを自動生成
  add_theme_support('title-tag');

  // アイキャッチ画像を有効化
  add_theme_support('post-thumbnails');

  // カスタムメニューを有効化
  register_nav_menus(array(
    'main-menu' => 'メインナビゲーション',
  ));
}
add_action('after_setup_theme', 'my_theme_setup');

function my_theme_enqueue_assets() {
  wp_enqueue_style(
    'my-theme-reset',
    get_template_directory_uri() . '/assets/css/reset.css',
    array(),
    filemtime(get_template_directory() . '/assets/css/reset.css')
  );
  wp_enqueue_style(
    'my-theme-style',
    get_template_directory_uri() . '/assets/css/style.css',
    array(),
    filemtime(get_template_directory() . '/assets/css/style.css')
  );
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_assets');