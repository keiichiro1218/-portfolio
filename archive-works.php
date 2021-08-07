<?php get_header(); ?>

<?php get_sidebar(); ?>

<div class="l-content">
    <div class="p-works">
        <div class="p-posttab">
            <h2>WORKS</h2>
        </div>
        <main class="l-main l-content__inner ">
            <div class="p-post">
                <div class="p-post__card">
                    <?php if (have_posts() ) : ?>
                    <?php
                        while ( have_posts() ) :
                        the_post();
                    ?>
                        <article class="p-post__article">
                            <a class="p-post__link" href="<?php the_permalink(); ?>">
                                <p class="p-post__img">
                                <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                                </p>
                                <div class="p-post__articleinfo">
                                    <time class="p-post__time c-modified-mark">
                                        <?php echo get_the_modified_date(); ?>
                                    </time>
                                    <h2><?php the_title(); ?></h2>
                                </div>
                            </a>
                        </article>
                        <?php endwhile;?>
                    <?php endif; ?>
                </div>
                <?php the_posts_pagination(
                    array(
                        'mid_size'      => 2, // 現在ページの左右に表示するページ番号の数
                        'prev_next'     => true, // 「前へ」「次へ」のリンクを表示する場合はtrue
                        'prev_text'     => __( '前へ'), // 「前へ」リンクのテキスト
                        'next_text'     => __( '次へ'), // 「次へ」リンクのテキスト
                        'type'          => 'list', // 戻り値の指定 (plain/list)
                    )
                ); ?>
            </div>
        </main>
    </div>
</div>


<?php get_footer(); ?>