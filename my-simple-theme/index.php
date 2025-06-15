<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package My_Simple_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				// For simplicity, we'll do a basic post display here.
				// In a more complex theme, you'd use get_template_part( 'template-parts/content', get_post_type() );
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php
						if ( is_singular() ) :
							the_title( '<h1 class="entry-title">', '</h1>' );
						else :
							the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						endif;

						if ( 'post' === get_post_type() ) :
							?>
							<div class="entry-meta">
								<?php
								//my_simple_theme_posted_on();
								//my_simple_theme_posted_by();
                                // We'll add these functions later in functions.php or keep it simple
                                printf( '<span class="posted-on">%s</span>', esc_html( get_the_date() ) );
                                echo ' '; // Separator
                                printf( '<span class="byline"> by %s</span>', esc_html( get_the_author() ) );
								?>
							</div><!-- .entry-meta -->
						<?php endif; ?>
					</header><!-- .entry-header -->

					<?php //the_post_thumbnail(); // We'll enable this via functions.php ?>

					<div class="entry-content">
						<?php
						the_content( sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'my-simple-theme' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							get_the_title()
						) );

						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'my-simple-theme' ),
							'after'  => '</div>',
						) );
						?>
					</div><!-- .entry-content -->

					<footer class="entry-footer">
						<?php //my_simple_theme_entry_footer(); // For categories, tags etc. ?>
					</footer><!-- .entry-footer -->
				</article><!-- #post-<?php the_ID(); ?> -->
				<?php

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile;

			//the_posts_navigation(); // Basic next/previous page navigation

		else :
            // If no content, include the "No posts found" template.
            // In a more complex theme, you'd use get_template_part( 'template-parts/content', 'none' );
            ?>
            <section class="no-results not-found">
                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'my-simple-theme' ); ?></h1>
                </header><!-- .page-header -->

                <div class="page-content">
                    <?php
                    if ( is_home() && current_user_can( 'publish_posts' ) ) :

                        printf(
                            '<p>' . wp_kses(
                                /* translators: 1: link to WP admin new post page. */
                                __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'my-simple-theme' ),
                                array(
                                    'a' => array(
                                        'href' => array(),
                                    ),
                                )
                            ) . '</p>',
                            esc_url( admin_url( 'post-new.php' ) )
                        );

                    elseif ( is_search() ) :
                        ?>

                        <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'my-simple-theme' ); ?></p>
                        <?php
                        get_search_form();

                    else :
                        ?>

                        <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'my-simple-theme' ); ?></p>
                        <?php
                        get_search_form();

                    endif;
                    ?>
                </div><!-- .page-content -->
            </section><!-- .no-results -->
            <?php
		endif;
		?>

	</main><!-- #primary -->

<?php
//get_sidebar(); // If you want a sidebar
get_footer();
EOF
