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

// Contact Form 7 の自動 p / br タグ挿入を確実に無効化
add_filter('wpcf7_autop_or_not', '__return_false');

/**
 * カスタム投稿タイプ「お知らせ（news）」およびタクソノミーの登録
 */
function create_custom_post_type() {
    // カスタム投稿タイプ「お知らせ」
    register_post_type('news',
        array(
            'labels' => array(
                'name'          => 'お知らせ',
                'singular_name' => 'お知らせ',
            ),
            'public'        => true,
            'has_archive'   => true, // アーカイブ（一覧）ページを有効化
            'menu_position' => 5,    // 管理画面メニューの位置（投稿の下）
            'menu_icon'     => 'dashicons-megaphone', // メニューのアイコン
            'supports'      => array('title', 'editor', 'thumbnail', 'revisions'),
            'show_in_rest'  => true, // ブロックエディター（Gutenberg）を有効化
        )
    );

    // カスタムタクソノミー「お知らせカテゴリー」
    register_taxonomy(
        'news_category',
        'news',
        array(
            'label'             => 'お知らせカテゴリー',
            'hierarchical'      => true, // カテゴリー形式（階層あり）
            'public'            => true,
            'show_in_rest'      => true, // ブロックエディター対応
        )
    );
}
add_action('init', 'create_custom_post_type');