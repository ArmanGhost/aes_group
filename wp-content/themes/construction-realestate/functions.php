<?php
/**
 * Construction Realestate functions and definitions
 * @package Construction Realestate
 */


/* Theme Setup */
if ( ! function_exists( 'construction_realestate_setup' ) ) :

function construction_realestate_setup() {

	$GLOBALS['content_width'] = apply_filters( 'construction_realestate_content_width', 640 );
	
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 150,
		'flex-height' => true,
	) );
	add_image_size('construction-realestate-homepage-thumb',240,145,true);
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'construction-realestate' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );

	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', construction_realestate_font_url() ) );

}
endif; // construction_realestate_setup
add_action( 'after_setup_theme', 'construction_realestate_setup' );

/*radio button sanitization*/
 function construction_realestate_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

/* Theme Widgets Setup */
function construction_realestate_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'construction-realestate' ),
		'description'   => __( 'Appears on posts and pages', 'construction-realestate' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Posts and Pages Sidebar', 'construction-realestate' ),
		'description'   => __( 'Appears on posts and pages', 'construction-realestate' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Third Column Sidebar', 'construction-realestate' ),
		'description'   => __( 'Appears on posts and pages', 'construction-realestate' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'construction-realestate' ),
		'description'   => __( 'Appears on posts and pages', 'construction-realestate' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'construction-realestate' ),
		'description'   => __( 'Appears on posts and pages', 'construction-realestate' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'construction-realestate' ),
		'description'   => __( 'Appears on posts and pages', 'construction-realestate' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'construction-realestate' ),
		'description'   => __( 'Appears on posts and pages', 'construction-realestate' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'construction_realestate_widgets_init' );


/* Theme Font URL */
function construction_realestate_font_url(){
	$font_url = '';
	$font_family = array();
	$font_family[] = 'PT Sans:300,400,600,700,800,900';
	$font_family[] = 'Roboto:400,700';
	$font_family[] = 'Roboto Condensed:400,700';
	$font_family[] = 'Dancing Script';
	$font_family[] = 'Alex Brush';
	$font_family[] = 'Overpass';
	$font_family[] = 'Lato';

	$query_args = array(
		'family'	=> urlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}
	
/* Theme enqueue scripts */
function construction_realestate_scripts() {
	wp_enqueue_style( 'construction-realestate-font', construction_realestate_font_url(), array() );
	wp_enqueue_style( 'construction-realestate-basic-style', get_stylesheet_uri() );
	wp_style_add_data( 'construction-realestate-style', 'rtl', 'replace' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/fontawesome-all.css' );
	wp_enqueue_style( 'construction-realestate-customcss', get_template_directory_uri() . '/css/custom.css' );
	wp_enqueue_style( 'nivo-style', get_template_directory_uri().'/css/nivo-slider.css' );
	wp_enqueue_script( 'nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'tether', get_template_directory_uri() . '/js/tether.js', array('jquery') ,'',true);
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery') ,'',true);	
	wp_enqueue_script( 'construction-realestate-customscripts', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'construction_realestate_scripts' );

function construction_realestate_ie_stylesheet(){

	wp_enqueue_style('construction-realestate-ie', get_template_directory_uri().'/css/ie.css', array('construction-realestate-style'));
	wp_style_add_data( 'construction-realestate-ie', 'conditional', 'IE' );
}
add_action('wp_enqueue_scripts','construction_realestate_ie_stylesheet');

define('CONSTRUCTION_REALESTATE_LIVE_DEMO','https://buywptemplates.com/construction-realestate-wordpress-theme/','construction-realestate');
define('CONSTRUCTION_REALESTATE_BUY_PRO','https://www.buywptemplates.com/themes/premium-construction-real-estate-wordpress-theme/','construction-realestate');
define('CONSTRUCTION_REALESTATE_PRO_DOC','https://buywptemplates.com/docs/construction-realestate-pro/','construction-realestate');
define('CONSTRUCTION_REALESTATE_FREE_DOC','https://buywptemplates.com/docs/free-construction-realestate/','construction-realestate');
define('CONSTRUCTION_REALESTATE_PRO_SUPPORT','https://www.buywptemplates.com/topic/construction-real-estate-pro/','construction-realestate');
define('CONSTRUCTION_REALESTATE_FREE_SUPPORT','https://wordpress.org/support/theme/construction-realestate/','construction-realestate');
define('CONSTRUCTION_REALESTATE_CREDIT','https://www.buywptemplates.com/','construction-realestate');

if ( ! function_exists( 'construction_realestate_credit' ) ) {
	function construction_realestate_credit(){
		echo "<a href=".esc_url(CONSTRUCTION_REALESTATE_CREDIT)." target='_blank'>BuywpTemplate.com</a>";
	}
}

/* Implement the Custom Header feature. */
require get_template_directory() . '/inc/custom-header.php';

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Load Jetpack compatibility file. */
require get_template_directory() . '/inc/customizer.php';

/** Load welcome message.*/
require get_template_directory() . '/inc/dashboard/get_started_info.php';