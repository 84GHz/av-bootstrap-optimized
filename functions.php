<?php
/**
 * WP Bootstrap Starter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AV_Bootstrap_Optimized
 */

if ( ! function_exists( 'av_bootstrap_optimized_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function av_bootstrap_optimized_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on WP Bootstrap Starter, use a find and replace
	 * to change 'av-bootstrap-optimized' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'av-bootstrap-optimized', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'av-bootstrap-optimized' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'caption',
	) );


	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );


}
endif;
add_action( 'after_setup_theme', 'av_bootstrap_optimized_setup' );



/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function av_bootstrap_optimized_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'av-bootstrap-optimized' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'av-bootstrap-optimized' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 1', 'av-bootstrap-optimized' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Add widgets here.', 'av-bootstrap-optimized' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 2', 'av-bootstrap-optimized' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Add widgets here.', 'av-bootstrap-optimized' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 3', 'av-bootstrap-optimized' ),
        'id'            => 'footer-3',
        'description'   => esc_html__( 'Add widgets here.', 'av-bootstrap-optimized' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'av_bootstrap_optimized_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function av_bootstrap_optimized_scripts() {
	// load bootstrap css
  
    wp_enqueue_style( 'av-bootstrap-optimized-bootstrap-css', get_template_directory_uri() . '/inc/assets/css/av-bootstrap.min.css' );

	// load WP Bootstrap Starter styles
	wp_enqueue_style( 'av-bootstrap-optimized-style', get_stylesheet_uri() );
   
//	wp_enqueue_script('jquery');

    // Internet Explorer HTML5 support
//    wp_enqueue_script( 'html5hiv',get_template_directory_uri().'/inc/assets/js/html5.js', array(), '3.7.0', false );
//    wp_script_add_data( 'html5hiv', 'conditional', 'lt IE 9' );


        wp_enqueue_script('av-bootstrap-optimized-bootstrapjs', get_template_directory_uri() . '/inc/assets/js/bootstrap-vanilla.min.js', array(), '', true );
    
//    wp_enqueue_script('av-bootstrap-optimized-themejs', get_template_directory_uri() . '/inc/assets/js/theme-script.min.js', array(), '', true );
//	wp_enqueue_script( 'av-bootstrap-optimized-skip-link-focus-fix', get_template_directory_uri() . '/inc/assets/js/skip-link-focus-fix.min.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'av_bootstrap_optimized_scripts' );





function av_bootstrap_optimized_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    <div class="d-block mb-3">' . __( "To view this protected post, enter the password below:", "av-bootstrap-optimized" ) . '</div>
    <div class="form-group form-inline"><label for="' . $label . '" class="mr-2">' . __( "Password:", "av-bootstrap-optimized" ) . ' </label><input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" class="form-control mr-2" /> <input type="submit" name="Submit" value="' . esc_attr__( "Submit", "av-bootstrap-optimized" ) . '" class="btn btn-primary"/></div>
    </form>';
    return $o;
}
add_filter( 'the_password_form', 'av_bootstrap_optimized_password_form' );



/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load plugin compatibility file.
 */
require get_template_directory() . '/inc/plugin-compatibility/plugin-compatibility.php';

/**
 * Load custom WordPress nav walker.
 */
if ( ! class_exists( 'wp_bootstrap_navwalker' )) {
    require_once(get_template_directory() . '/inc/wp_bootstrap_navwalker.php');
}


//update zeugs

//plugin update checker

if (!(class_exists("Puc_v4_Factory"))) {
    require 'plugin-update-checker/plugin-update-checker.php';
  }
  $myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
      'https://github.com/84GHz/av-bootstrap-optimized/',
      __FILE__,
      'style'
  );
  