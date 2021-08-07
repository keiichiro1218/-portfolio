<div class="c-drawer">
    <?php get_search_form(); ?>
    <?php
        $menu_name = 'side_nav';
        $locations = get_nav_menu_locations();
        $menu = wp_get_nav_menu_object($locations[$menu_name]);

        $menu_items = wp_get_nav_menu_items($menu->term_id);
        
    ?>
    <div class="l-sidebar">
        <ul class="p-sidebar">
            <?php foreach ($menu_items as $item): ?>
                <li class="p-sidebar__list"><a class="p-sidebar__item" href="<?php echo $item->url;?>"><?php echo $item->title;?></a></li>
            <?php endforeach ?>

        </ul>
            <?php
                $defaults = array(
                    'menu'            => '問い合わせナビゲーション',
                    'menu_class'      => 'p-infomation',
                    // 'menu_id'         => '{メニューのスラッグ}-{連番}',
                    'container'       => 'div',
                    'container_class' => 'p-menu',
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
                    // 'items_wrap'      => '<ul id="%1$s" class="p-infomation">%3$s</ul>',
                );
                wp_nav_menu( $defaults );
            ?>
    </div>
</div>