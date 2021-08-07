<?php get_header(); ?>

<?php get_sidebar(); ?>

<div class="l-content">

    <div class="p-works">
        <div class="p-page l-content__inner">
            <div class="p-title">
                <h2><?php the_title(); ?></h2>
                <time>
                    <div class="p-time__modified c-modified-mark">
                        <?php the_modified_date('Y/m/d') ?>
                    </div>
                </time>
            </div>
            <div class="p-post-content">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>