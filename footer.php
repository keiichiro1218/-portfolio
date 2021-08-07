<footer class="l-footer">
        <div class="p-footer-content">
            <a class="p-footer-content__btn" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <i class="fas fa-home"></i>
                HOME
            </a>
            <p>
            <?php
                $defaults = array(
                    'menu'            => 'フッターメニュー',
                    'menu_class'      => 'p-footer-menu__list',
                    'container'       => 'div',
                    'container_class' => 'p-footer-menu',
                    'fallback_cb'     => 'wp_page_menu',
                );
                wp_nav_menu( $defaults );
            ?>
            </p>
            <p>© Keiichiro Chiba 2021</p>
        </div>

    </footer>
<?php wp_footer(); ?>
</body>
</html>