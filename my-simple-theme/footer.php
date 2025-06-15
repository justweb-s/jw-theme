</div><!-- #content .site-content .container -->

    <footer id="colophon" class="site-footer">
        <div class="container">
            <div class="site-info">
                <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'my-simple-theme' ) ); ?>">
                    <?php
                    /* translators: %s: CMS name, i.e. WordPress. */
                    printf( esc_html__( 'Proudly powered by %s', 'my-simple-theme' ), 'WordPress' );
                    ?>
                </a>
                <span class="sep"> | </span>
                <?php
                /* translators: 1: Theme name, 2: Theme author. */
                printf( esc_html__( 'Theme: %1$s by %2$s.', 'my-simple-theme' ), 'My Simple Theme', '<a href="https://example.com">Jules AI</a>' );
                ?>
                <br>
                &copy; <?php echo esc_html( date_i18n( __( 'Y', 'my-simple-theme' ) ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'my-simple-theme' ); ?>
            </div><!-- .site-info -->
        </div><!-- .container -->
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
