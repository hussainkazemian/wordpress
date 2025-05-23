<?php
/**
 * Classic Dog Breeder functions and definitions
 *
 * @package Classic Dog Breeder
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'classic_dog_breeder_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function classic_dog_breeder_setup() {
	global $content_width;
	if ( ! isset( $content_width ) )
		$content_width = 680;
	
	load_theme_textdomain( 'classic-dog-breeder', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( "responsive-embeds" );
	add_theme_support( 'align-wide' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'wp-block-styles');
	add_theme_support( 'custom-header', array(
		'default-text-color' => false,
		'header-text' => false,
	) );
	add_theme_support( 'custom-logo', array(
		'height'      => 50,
		'width'       => 100,
		'flex-height' => true,
	) );
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'classic-dog-breeder' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	add_editor_style( 'editor-style.css' );
}
endif; // classic_dog_breeder_setup
add_action( 'after_setup_theme', 'classic_dog_breeder_setup' );

function classic_dog_breeder_the_breadcrumb() {
    echo '<div class="breadcrumb my-3">';

    if (!is_home()) {
        echo '<a class="home-main align-self-center" href="' . esc_url(home_url()) . '">';
        bloginfo('name');
        echo "</a> >> ";

        if (is_category() || is_single()) {
            the_category(' >> ');
            if (is_single()) {
                echo ' >> <span class="current-breadcrumb">' . esc_html(get_the_title()) . '</span>';
            }
        } elseif (is_page()) {
            echo '<span class="current-breadcrumb">' . esc_html(get_the_title()) . '</span>';
        }
    }

    echo '</div>';
}

function classic_dog_breeder_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'classic-dog-breeder' ),
		'description'   => __( 'Appears on blog page sidebar', 'classic-dog-breeder' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'classic-dog-breeder' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'classic-dog-breeder' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'classic-dog-breeder' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'classic-dog-breeder' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar(array(
        'name'          => __('Shop Sidebar', 'classic-dog-breeder'),
        'description'   => __('Sidebar for WooCommerce shop pages', 'classic-dog-breeder'),
		'id'            => 'woocommerce-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
	register_sidebar(array(
        'name'          => __('Single Product Sidebar', 'classic-dog-breeder'),
        'description'   => __('Sidebar for single product pages', 'classic-dog-breeder'),
		'id'            => 'woocommerce-single-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));		
	
	$classic_dog_breeder_widget_areas = get_theme_mod('classic_dog_breeder_footer_widget_areas', '4');
	for ($classic_dog_breeder_i=1; $classic_dog_breeder_i<=$classic_dog_breeder_widget_areas; $classic_dog_breeder_i++) {
		register_sidebar( array(
			'name'          => __( 'Footer Widget ', 'classic-dog-breeder' ) . $classic_dog_breeder_i,
			'id'            => 'footer-' . $classic_dog_breeder_i,
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-4 %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}

}
add_action( 'widgets_init', 'classic_dog_breeder_widgets_init' );

// Change number of products per row to 3
add_filter('loop_shop_columns', 'classic_dog_breeder_loop_columns');
if (!function_exists('classic_dog_breeder_loop_columns')) {
    function classic_dog_breeder_loop_columns() {
        $colm = get_theme_mod('classic_dog_breeder_products_per_row', 4); // Default to 3 if not set
        return $colm;
    }
}

// Use the customizer setting to set the number of products per page
function classic_dog_breeder_products_per_page($cols) {
    $cols = get_theme_mod('classic_dog_breeder_products_per_page', 8); // Default to 8 if not set
    return $cols;
}
add_filter('loop_shop_per_page', 'classic_dog_breeder_products_per_page', 8);

function classic_dog_breeder_scripts() {
	
	wp_enqueue_style( 'bootstrap-css', esc_url(get_template_directory_uri())."/css/bootstrap.css" );
	wp_enqueue_style('classic-dog-breeder-style', get_stylesheet_uri(), array() );
		wp_style_add_data('classic-dog-breeder-style', 'rtl', 'replace');
	require get_parent_theme_file_path( '/inc/color-scheme/custom-color-control.php' );
	wp_add_inline_style( 'classic-dog-breeder-style',$classic_dog_breeder_color_scheme_css );
	wp_enqueue_style( 'classic-dog-breeder-default', esc_url(get_template_directory_uri())."/css/default.css" );
	wp_enqueue_style( 'classic-dog-breeder-style', get_stylesheet_uri() );
	wp_enqueue_script( 'bootstrap-js', esc_url(get_template_directory_uri()). '/js/bootstrap.js', array('jquery') );
	wp_enqueue_script( 'classic-dog-breeder-theme', esc_url(get_template_directory_uri()) . '/js/theme.js' );
	wp_enqueue_style( 'font-awesome-css', esc_url(get_template_directory_uri())."/css/fontawesome-all.css" );
	wp_enqueue_style( 'classic-dog-breeder-block-style', esc_url( get_template_directory_uri() ).'/css/blocks.css' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// font-family
    $classic_dog_breeder_body_font = esc_html(get_theme_mod('classic_dog_breeder_body_fonts'));

    if ($classic_dog_breeder_body_font) {
        wp_enqueue_style('classic-dog-breeder-body-fonts', 'https://fonts.googleapis.com/css?family=' . urlencode($classic_dog_breeder_body_font));
    } else {
        wp_enqueue_style('Poppins', 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900');
    }

    $classic_dog_breeder_headings_font = esc_html(get_theme_mod('classic_dog_breeder_headings_fonts'));

    if ($classic_dog_breeder_headings_font) {
        wp_enqueue_style('classic-dog-breeder-heading-fonts', 'https://fonts.googleapis.com/css?family=' . urlencode($classic_dog_breeder_headings_font));
    } else {
        wp_enqueue_style('Chelsea Market', 'https://fonts.googleapis.com/css2?family=Chelsea+Market');
    }

}
add_action( 'wp_enqueue_scripts', 'classic_dog_breeder_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Sanitization Callbacks.
 */
require get_template_directory() . '/inc/sanitization-callbacks.php';

/**
 * Webfont-Loader.
 */
require get_template_directory() . '/inc/wptt-webfont-loader.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/upgrade-to-pro.php';

/**
 * Google Fonts
 */
require get_template_directory() . '/inc/gfonts.php';

/**
 * select .
 */
require get_template_directory() . '/inc/select/category-dropdown-custom-control.php';

/**
 * Load TGM.
 */
require get_template_directory() . '/inc/tgm/tgm.php';


if ( ! defined( 'CLASSIC_DOG_BREEDER_PRO_NAME' ) ) {
	define( 'CLASSIC_DOG_BREEDER_PRO_NAME', __( 'About Classic Dog Breeder', 'classic-dog-breeder' ));
}
if ( ! defined( 'CLASSIC_DOG_BREEDER_PREMIUM_PAGE' ) ) {
define('CLASSIC_DOG_BREEDER_PREMIUM_PAGE',__('https://www.theclassictemplates.com/products/dog-breeder-wordpress-theme','classic-dog-breeder'));
}

/* Starter Content */
	add_theme_support( 'starter-content', array(
		'widgets' => array(
			'footer-1' => array(
				'categories',
			),
			'footer-2' => array(
				'archives',
			),
			'footer-3' => array(
				'meta',
			),
			'footer-4' => array(
				'search',
			),
		),
    ));
    
// logo
if ( ! function_exists( 'classic_dog_breeder_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function classic_dog_breeder_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;
