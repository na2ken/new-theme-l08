<?php
/**************************************************
  一般的な機能をONにする　v1.1
***************************************************/
// ウィジェットエリアを追加する
register_sidebar();

// RSSフィードを追加する
add_theme_support( 'automatic-feed-links' );

// 本文と概要（抜粋）の文字数を統一する
function my_length($length) {
	return 70;
}
add_filter('excerpt_mblength','my_length');

// 本文と概要（抜粋）の省略記号を設定する
function my_more($more) {
	return '・・・';
}
add_filter('excerpt_more', 'my_more');

// アイキャッチ画像を表示する
add_theme_support( 'post-thumbnails' );


/**************************************************
  カスタム投稿タイプを登録する　v2.0
***************************************************/
// 1つ目
add_action( 'init', 'create_post_type' );
function create_post_type() {
    register_post_type( 'content-a',  //変更箇所1：スラッグ名
        array(
        'labels' => array(
        'name' => __( 'サービス情報' ), //変更箇所2：管理画面に表示されるラベル名
        'singular_name' => __( 'content-a' ) //変更箇所3：このカスタム投稿の名前
        ),
        'public' => true,
        'has_archive' => true,
        'hierarchical' => true,
        'supports' => array(
        'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields', 'revisions', 'page-attributes'
        ),
        'menu_position' => 5,
        )
    );
// 2つ目
    register_post_type( 'content-b',  //変更箇所1：スラッグ名
        array(
        'labels' => array(
        'name' => __( '業界情報' ), //変更箇所2：管理画面に表示されるラベル名
        'singular_name' => __( 'content-b' ) //変更箇所3：このカスタム投稿の名前
        ),
        'public' => true,
        'has_archive' => true,
        'hierarchical' => true,
        'supports' => array(
        'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields', 'revisions', 'page-attributes'
        ),
        'menu_position' => 5,
        )
    );
// 一番最後の閉じ括弧1個(忘れずに)
}

/**************************************************
  カスタムタクソノミーを登録する v2.0
***************************************************/
// 1つ目
add_action( 'init', 'custom_register_taxonomy' );
function custom_register_taxonomy() {
    register_taxonomy(
        'content-a-cat',  //変更箇所1：カスタムタクソノミー名
        'content-a',  //変更箇所2：カスタム投稿タイプのスラッグ名
        array(
            'labels' => array(
            'name' => __( 'カテゴリー' ), //変更箇所3：管理画面に表示されるカスタムタクソノミー名
            'singular_name' => __( 'content-a-cat' ) //変更箇所4：このカスタムタクソノミー名
            ),
            'public' => true,
            'rewrite' => true,
        )
    );
// 2つ目
    register_taxonomy(
        'content-b-cat',  //変更箇所1：カスタムタクソノミー名
        'content-b',  //変更箇所2：カスタム投稿タイプのスラッグ名
        array(
            'labels' => array(
            'name' => __( 'カテゴリー' ), //変更箇所3：管理画面に表示されるカスタムタクソノミー名
            'singular_name' => __( 'content-b-cat' ) //変更箇所4：このカスタムタクソノミー名
            ),
            'public' => true,
            'rewrite' => true,
        )
    );
// 一番最後の閉じ括弧1個(忘れずに)
}

/**************************************************
  カスタムメニューを機能させる　v1.0
***************************************************/
// ナビゲーションメニューを登録する
register_nav_menu( 'navigation', 'ナビゲーション' );

add_theme_support( 'menus' );

// 「メニュー」の「テーマの場所」を定義する
register_nav_menu( 'header-navi', 'メインナビゲーション' );
register_nav_menu( 'header-sub-navi', 'サブナビゲーション' );
register_nav_menu( 'footer-navi', 'フッターナビゲーション' );
register_nav_menu( 'footer-left-column', 'フッター左カラム' );
register_nav_menu( 'footer-center-column', 'フッターセンターカラム' );
register_nav_menu( 'footer-right-column', 'フッター右カラム' );
