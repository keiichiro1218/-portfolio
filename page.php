<?php get_header(); ?>

<?php get_sidebar(); ?>

<div class="l-content">

    <div class="p-works">
        <div class="p-page l-content__inner">
            <div class="p-posttab">
                <h2><?php the_title(); ?></h2>
            </div>
            <?php the_content(); ?>
        </div>
    </div>
</div>


<?php get_footer(); ?>