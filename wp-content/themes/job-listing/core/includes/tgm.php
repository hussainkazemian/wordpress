<?php
	
require get_template_directory() . '/core/includes/class-tgm-plugin-activation.php';

/**
 * Recommended plugins.
 */
function job_listing_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Kirki Customizer Framework', 'job-listing' ),
			'slug'             => 'kirki',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'Contact Form 7', 'job-listing' ),
			'slug'             => 'contact-form-7',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'WooCommerce', 'job-listing' ),
			'slug'             => 'woocommerce',
			'required'         => false,
			'force_activation' => false,
		),
		
	);
	$config = array();
	job_listing_tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'job_listing_register_recommended_plugins' );