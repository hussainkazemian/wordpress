<?php
/**
 * @package Classic Dog Breeder
 * Setup the WordPress core custom header feature.
 *
 * @uses classic_dog_breeder_header_style()
 */
function classic_dog_breeder_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'classic_dog_breeder_custom_header_args', array(
		'default-text-color'     => 'fff',
		'width'                  => 2500,
		'height'                 => 400,
		'wp-head-callback'       => 'classic_dog_breeder_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'classic_dog_breeder_custom_header_setup' );

if ( ! function_exists( 'classic_dog_breeder_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see classic_dog_breeder_custom_header_setup().
 */
function classic_dog_breeder_header_style() {
	$classic_dog_breeder_header_text_color = get_header_textcolor();

	?>
	<style type="text/css">
	<?php
		$classic_dog_breeder_header_image = get_header_image() ? get_header_image() : get_template_directory_uri() . '/images/headerimg.png';
	?>
		.box-image .single-page-img{
			background-image: url('<?php echo esc_url( $classic_dog_breeder_header_image ); ?>');
	        background-repeat: no-repeat;
	        background-position: center bottom;
	        background-size: cover !important;
	        height: 400px;
		}


	h1.site-title a, p.site-title a{
		color: <?php echo esc_attr(get_theme_mod('classic_dog_breeder_sitetitle_color')); ?> !important;
	}

	.site-description{
		color: <?php echo esc_attr(get_theme_mod('classic_dog_breeder_sitetagline_color')); ?> !important;
	}

	.main-nav ul li a {
		color: <?php echo esc_attr(get_theme_mod('classic_dog_breeder_menu_color')); ?> !important;
	}

	.main-nav a:hover{
		color: <?php echo esc_attr(get_theme_mod('classic_dog_breeder_menuhrv_color')); ?> !important;
	}

	.main-nav ul ul a{
		color: <?php echo esc_attr(get_theme_mod('classic_dog_breeder_submenu_color')); ?> !important;
	}

	.main-nav ul ul a:hover {
		color: <?php echo esc_attr(get_theme_mod('classic_dog_breeder_submenuhrv_color')); ?> !important;
	}

	.copywrap, .copywrap a{
		color: <?php echo esc_attr(get_theme_mod('classic_dog_breeder_footercoypright_color')); ?> !important;
	}
	#footer h3 {
		color: <?php echo esc_attr(get_theme_mod('classic_dog_breeder_footertitle_color')); ?> !important;

	}
	#footer p {
		color: <?php echo esc_attr(get_theme_mod('classic_dog_breeder_footerdescription_color')); ?>;
	}
	#footer ul li a {
		color: <?php echo esc_attr(get_theme_mod('classic_dog_breeder_footerlist_color')); ?>;

	}
	#footer {
		background-color: <?php echo esc_attr(get_theme_mod('classic_dog_breeder_footerbg_color')); ?>;
	}
	</style>
	<?php 
}
endif;