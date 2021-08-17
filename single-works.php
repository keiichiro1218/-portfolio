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
                <div class="p-custom-field">
                    <table>
                        <tbody class="aaaa">
                            <?php if ( get_field( 'works' ) ) : ?> 
                            <tr>
                                <th>Works</th>
                                <td class="works"><?php the_field( 'works' ); ?></td>
                            </tr>
                            <?php endif; ?>

                            <?php if ( get_field( 'url' ) ) : ?>
                            <tr>
                                <th>サイトURL</th>
                                <td class="url">
                                    <a href="<?php the_field( 'url' ); ?>">
                                        <?php the_field( 'url' ); ?>
                                    </a>
                                </td>
                            </tr>
                            <?php endif; ?>
                            <?php if ( get_field( 'cord' ) ) : ?>
                                <tr>
                                <th>ソースコード</th>
                                <td class="cord"><?php the_field( 'cord' ); ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if ( get_field( 'overview' ) ) : ?>
                            <tr>
                            <th>制作概要</th>
                            <td><?php the_field( 'overview' ); ?></td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                       
                </table>

                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>