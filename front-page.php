<?php get_header(); ?>
<?php get_sidebar(); ?>


<div class="l-content">
    <div class="p-profile">
        <div class="l-content__inner">
            <div class="p-posttab">
                <h2>PROFILE</h2>
            </div>
            <div class="">
                <img src="" alt="">
                <p>当サイトにアクセスしていただきありがとうございます！</p>
                <p></p>
            </div>
        </div>
    </div>

    <div class="p-skills l-content__inner inner-pc ">
        <div class="p-posttab">
            <h2>SKILLS</h2>
        </div>
        <ul class="p-skills_icon">
        <?php
            $args = array (
                'post_type'      => 'skill', // 投稿タイプ
                'posts_per_page' => 10, // 取得する投稿数
            );
            $myposts = get_posts( $args );
            foreach( $myposts as $post ):
            setup_postdata($post); //グローバル変数$postを書き換え
        ?>
            <li class="sass">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                <p><?php the_title(); ?></p>
            </li>
        <?php
            endforeach;
            wp_reset_postdata(); // $postをグローバル変数に戻す
        ?>
        </ul>
    </div>
    <div class="p-works">
        <div class="p-posttab">
            <h2>WORKS</h2>
        </div>
        <main class="l-main l-content__inner">
            <div class="p-post">
                <div class="p-post__card">
                <?php
                $menu_name = 'works_menu';
                $locations = get_nav_menu_locations();
                $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
                $menu_items = wp_get_nav_menu_items($menu->term_id);
                if($menu_items):
                ?>
                
                <?php 
                foreach ($menu_items as $menu): 
                $page_id = $menu->object_id;
                $thumbnail_id = get_post_thumbnail_id($page_id);
                $image_attributes = wp_get_attachment_image_src($thumbnail_id, 'medium'); 
                $content = get_page($page_id);
                $date = get_the_modified_date($page_id);
                ?>
                    <article class="p-post__article">
                        <a class="p-post__link" href="<?php echo $menu->url; ?>">
                            <p class="p-post__img"><img src="<?php echo $image_attributes[0]; ?>"></p>
                            <div class="p-post__articleinfo">
                                <?php  if( empty($content)):?>
                                    <time class="p-post__time-none">
                                        <?php echo ""; ?>
                                    </time>
                                <?php else: ?>
                                    <time class="p-post__time c-modified-mark">  
                                        <?php echo get_the_modified_date('',$page_id); ?>
                                    </time>
                                <?php endif;?>
                                <h2><?php echo $menu->title;?></h2>
                            </div>
                        </a>
                    </article>
                <?php endforeach; ?>
                <?php endif; ?>
                </div>
            </div>
        </main>
    </div>
</div>
<?php get_footer(); ?>