<?php
/**
 * My Simple Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package My_Simple_Theme
 */

if ( ! defined( 'MY_SIMPLE_THEME_VERSION' ) ) {
	// Replace with the actual version of your theme
	define( 'MY_SIMPLE_THEME_VERSION', '1.0.0' );
}

if ( ! function_exists( 'my_simple_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function my_simple_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on My Simple Theme, use a find and replace
		 * to change 'my-simple-theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'my-simple-theme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
        // set_post_thumbnail_size( 1568, 9999 ); // Example size

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary Menu', 'my-simple-theme' ),
                // You can add more menu locations here if needed
                // 'footer'  => esc_html__( 'Footer Menu', 'my-simple-theme' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		// add_theme_support( 'custom-background', apply_filters( 'my_simple_theme_custom_background_args', array(
		// 	'default-color' => 'ffffff',
		// 	'default-image' => '',
		// ) ) );

		// Add theme support for selective refresh for widgets.
		// add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250, // Example
				'width'       => 250, // Example
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

        // Editor styles
        // add_editor_style( 'style-editor.css' ); // If you have specific editor styles

        // Gutenberg support
        add_theme_support( 'responsive-embeds' );
        add_theme_support( 'wp-block-styles' ); // Support for default block styles
        // add_theme_support( 'align-wide' ); // Support for wide and full alignments

	}
endif;
add_action( 'after_setup_theme', 'my_simple_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
// function my_simple_theme_content_width() {
//  // This variable is intended to be overruled from themes.
//  // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
//  // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
//  $GLOBALS['content_width'] = apply_filters( 'my_simple_theme_content_width', 640 ); // Example width
// }
// add_action( 'after_setup_theme', 'my_simple_theme_content_width', 0 );


/**
 * Enqueue scripts and styles.
 */
function my_simple_theme_scripts() {
	wp_enqueue_style( 'my-simple-theme-style', get_stylesheet_uri(), array(), MY_SIMPLE_THEME_VERSION );
	// wp_style_add_data( 'my-simple-theme-style', 'rtl', 'replace' ); // For RTL support

	// Example of enqueuing a JS file
	// wp_enqueue_script( 'my-simple-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), MY_SIMPLE_THEME_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'my_simple_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
// require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
// require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
// require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
// if ( defined( 'JETPACK__VERSION' ) ) {
// 	require get_template_directory() . '/inc/jetpack.php';
// }

?>
