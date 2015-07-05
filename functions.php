<?php
/**
 * Coder Within functions and definitions
 *
 * @package Coder Within
 */

if ( ! function_exists( 'coderwithin_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function coderwithin_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Coder Within, use a find and replace
	 * to change 'coderwithin' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'coderwithin', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'coderwithin' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'coderwithin_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // coderwithin_setup
add_action( 'after_setup_theme', 'coderwithin_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function coderwithin_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'coderwithin_content_width', 640 );
}
add_action( 'after_setup_theme', 'coderwithin_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function coderwithin_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'coderwithin' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'coderwithin_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function coderwithin_scripts() {

	wp_enqueue_style('coderwithin-normalize', get_template_directory_uri().'/normalize.css');

	wp_enqueue_style( 'coderwithin-foundation', get_template_directory_uri().'/foundation.css');

	wp_enqueue_style( 'coderwithin-style', get_stylesheet_uri() );

	wp_enqueue_script( 'coderwithin-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'coderwithin-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	// Add Modernizr for better HTML5 and CSS3 support
	wp_enqueue_script('coderwithin-modernizr', get_template_directory_uri().'/js/vendor/modernizr.js');

	// Add Jquery
	wp_enqueue_script('coderwithin-modernizr', get_template_directory_uri().'/js/vendor/jquery.js');

	// Add fastclick
	wp_enqueue_script('coderwithin-fastclick', get_template_directory_uri().'/js/vendor/fastclick.js', array('jquery'));

	// Add placeholder
	wp_enqueue_script('coderwithin-placeholder', get_template_directory_uri().'/js/vendor/placeholder.js', array('jquery'));

  wp_enqueue_script('coderwithin-foundationjs', get_template_directory_uri().'/js/foundation.min.js', array('jquery'));

	wp_enqueue_script('coderwithin-foundationjs-equalizer', get_template_directory_uri().'/js/foundation/foundation.equalizer.js', array('jquery'));

	wp_enqueue_script('coderwithin-foundationjs-interchange', get_template_directory_uri().'/js/foundation/foundation.interchange.js',array( 'girard-perregaux-foundation' ));

	wp_enqueue_script('coderwithin-foundationjs-reveal', get_template_directory_uri().'/js/foundation/foundation.reveal.js', array( 'girard-perregaux-foundation' ));

	wp_enqueue_script( 'my-theme-js', get_template_directory_uri() . '/js/scripts.js', '', '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'coderwithin_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

// Register custom menus and menu walkers
require_once(get_template_directory().'/functions/menu-walkers.php');
