<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <?php wp_head(); ?>
    <title>Document</title>
</head>
<body>
    <header class="l-header">
        <div class="l-header__wrap inner-pc ">
            <h1 class="l-header__title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a> </h1>
            <div class="p-humburger-btn">
                <p class="c-humburger">
                    <span class="c-humburger__top"></span>
                    <span class="c-humburger__center"></span>
                    <span class="c-humburger__bottom"></span>
                </p>
            </div>
            <?php
                    $defaults = array(
                        'menu'            => 'ヘッダーメニュー',
                        'menu_class'      => 'p-header-menu',
                        'container'       => 'div',
                        'container_class' => 'p-header-menu',
                        'container_id'    => '',
                        'fallback_cb'     => 'wp_page_menu',
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link_after'      => '',
                        'echo'            => true,
                        'depth'           => 0,
                        'walker'          => '',
                        'theme_location'  => '',
                        'items_wrap'      => '<ul id="%1$s" class="2$s">%3$s</ul>',
                        'items_wrap'      => '<ul id="%1$s" class="p-header-menu__list">%3$s</ul>',
                    );
                    wp_nav_menu( $defaults );
            ?>
        </div>
    </header>