<?php
/**
 * テーマのセットアップ
 * 参考：https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_theme_support#HTML5
 **/
function my_setup()
{
  add_theme_support('post-thumbnails'); // アイキャッチ画像を有効化
  add_theme_support('automatic-feed-links'); // 投稿とコメントのRSSフィードのリンクを有効化
  add_theme_support('title-tag'); // タイトルタグ自動生成
  add_theme_support(
    'html5',
    array( 
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    )
  );

  register_nav_menus([
    'works_menu' => 'worksメニュー',
    'side_nav' => 'サイドメニューナビゲーション',
    'infomation_nav' => '問い合わせナビゲーション',
    'footer_menu' => 'フッターメニュー',
    'header_menu' => 'ヘッダーメニュー'
  ]);
}

add_action('after_setup_theme', 'my_setup');


function my_script_init()
{
wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.6.1/css/all.css', array(), '5.8.2', 'all');
wp_enqueue_style('my', get_template_directory_uri() . '/css/style.css', array(), '1.0.0', 'all');
wp_enqueue_script('my', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'my_script_init');


// デフォルトの「投稿」メニュー非表示
add_action( 'admin_menu', 'remove_menus' );

function remove_menus(){
    // remove_menu_page( 'index.php' ); //ダッシュボード
    remove_menu_page( 'edit.php' ); //投稿メニュー
    // remove_menu_page( 'upload.php' ); //メディア
    // remove_menu_page( 'edit.php?post_type=page' ); //ページ追加
    // remove_menu_page( 'edit-comments.php' ); //コメントメニュー
    // remove_menu_page( 'themes.php' ); //外観メニュー
    // remove_menu_page( 'plugins.php' ); //プラグインメニュー
    // remove_menu_page( 'tools.php' ); //ツールメニュー
    // remove_menu_page( 'options-general.php' ); //設定メニュー
}

function create_posttype() {

  register_post_type( 'works',
      array(
              'labels'          => array(
              'all_items'          => 'Works一覧を表示',
              'name'               => 'Works',
              'singular_name'      => 'Works',
              'menu_name'          => 'Works',
              'add_new'            => 'Worksを新規追加',
              'add_new_item'       => '新しい投稿タイプを追加',
              'edit'               => '編集',
              'edit_item'          => '新しい投稿タイプの編集',
              'view'               => '表示',
              'view_item'          => '新しい投稿タイプを表示',
              'search_items'       => '新しい投稿タイプの検索',
              'not_found'          => '見つかりません',
              'not_found_in_trash' => 'ゴミ箱にはありません',
              'parent'             => '親',
              
          ),
          'description'     => '',
          'show_ui'         => true,
          'show_in_menu'    => true,
          'capadility_type' => 'post',
          'hierarchical'    => false,
          'rewrite'         => true,
          'query_var'       => true,
          'has_archive'     => true,
          'public'          => true,
          'supports'        => array( 'title','editor','thumbnail' ),
          'menu_position'   => 4,
          'show_in_rest' => true,

      )
  );
  register_post_type( 'skill',
      array(
              'labels'          => array(
              'all_items'          => 'スキル一覧を表示',
              'name'               => 'Skill',
              'singular_name'      => 'Skill',
              'menu_name'          => 'Skill',
              'add_new'            => 'スキルを新規追加',
              'add_new_item'       => '新しい投稿タイプを追加',
              'edit'               => '編集',
              'edit_item'          => '新しい投稿タイプの編集',
              'view'               => '表示',
              'view_item'          => '新しい投稿タイプを表示',
              'search_items'       => '新しい投稿タイプの検索',
              'not_found'          => '見つかりません',
              'not_found_in_trash' => 'ゴミ箱にはありません',
              'parent'             => '親'
              
          ),
          'description'     => '',
          'show_ui'         => true,
          'show_in_menu'    => true,
          'capadility_type' => 'post',
          'hierarchical'    => false,
          'rewrite'         => true,
          'query_var'       => true,
          'has_archive'     => true,
          'public'          => true,
          'supports'        => array( 'title','editor','thumbnail' ),
          'menu_position'   => 5,
          'show_in_rest' => true,
          'exclude_from_search' => true

      )
  );

  register_taxonomy(
      'new_category',
      'skill',
      array(
          'hierarchical'   => true,
          'label'          => 'カテゴリー',
          'show_ui'        => true,
          'query_var'      => true,
          'rewrite'        => true,
          'singular_label' => 'カテゴリー'
      )
  );
}

add_action( 'init', 'create_posttype' );

// 検索結果を限定
function SearchFilter($query) {
  if ( !is_admin() && $query->is_main_query() && $query->is_search() ) {
  $query->set( 'post_type', 'works' );
  }
  }
  add_action( 'pre_get_posts','SearchFilter' );


// アーカイブページを更新日の新しい順番でループ
  function twpp_change_sort_order( $query ) {
    if ( is_admin() || ! $query->is_main_query() ) {
      return;
    }
   
    if ( $query->is_home() ) {
      $query->set( 'orderby', 'modified' );
    } elseif ( $query->is_archive() ) {
      $query->set( 'orderby', 'modified' );
    } elseif ( $query->is_search() ) {
      $query->set( 'orderby', 'modified' );
    }
  }
   
  add_action( 'pre_get_posts', 'twpp_change_sort_order' );
  