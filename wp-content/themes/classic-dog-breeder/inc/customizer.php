<?php
/**
 * Classic Dog Breeder Theme Customizer
 *
 * @package Classic Dog Breeder
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function classic_dog_breeder_customize_register( $wp_customize ) {

	function classic_dog_breeder_sanitize_dropdown_pages( $page_id, $setting ) {
  		$page_id = absint( $page_id );
  		return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	wp_enqueue_style('classic-dog-breeder-customize-controls', trailingslashit(esc_url(get_template_directory_uri())).'/css/customize-controls.css');

	//Logo
    $wp_customize->add_setting('classic_dog_breeder_logo_width', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'classic_dog_breeder_sanitize_integer'
    ));
    $wp_customize->add_control(new Classic_Dog_Breeder_Slider_Custom_Control($wp_customize, 'classic_dog_breeder_logo_width', array(
    	'label'          => __( 'Logo Width', 'classic-dog-breeder'),
        'section' => 'title_tagline',
        'settings' => 'classic_dog_breeder_logo_width',
        'input_attrs' => array(
            'step' => 1,
            'min' => 0,
            'max' => 150,
        ),
    )));

	// color site title
	$wp_customize->add_setting('classic_dog_breeder_sitetitle_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_dog_breeder_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'classic_dog_breeder_sitetitle_color', array(
	   'settings' => 'classic_dog_breeder_sitetitle_color',
	   'section'   => 'title_tagline',
	   'label' => __('Site Title Color', 'classic-dog-breeder'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('classic_dog_breeder_title_enable',array(
		'default' => true,
		'sanitize_callback' => 'classic_dog_breeder_sanitize_checkbox',
	));
	$wp_customize->add_control( 'classic_dog_breeder_title_enable', array(
	   'settings' => 'classic_dog_breeder_title_enable',
	   'section'   => 'title_tagline',
	   'label'     => __('Enable Site Title','classic-dog-breeder'),
	   'type'      => 'checkbox'
	));

	// color site tagline
	$wp_customize->add_setting('classic_dog_breeder_sitetagline_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_dog_breeder_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_dog_breeder_sitetagline_color', array(
	   'settings' => 'classic_dog_breeder_sitetagline_color',
	   'section'   => 'title_tagline',
	   'label' => __('Site Tagline Color', 'classic-dog-breeder'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('classic_dog_breeder_tagline_enable',array(
		'default' => false,
		'sanitize_callback' => 'classic_dog_breeder_sanitize_checkbox',
	));
	$wp_customize->add_control( 'classic_dog_breeder_tagline_enable', array(
	   'settings' => 'classic_dog_breeder_tagline_enable',
	   'section'   => 'title_tagline',
	   'label'     => __('Enable Site Tagline','classic-dog-breeder'),
	   'type'      => 'checkbox'
	));

	// woocommerce section
	$wp_customize->add_section('classic_dog_breeder_woocommerce_page_settings', array(
		'title'    => __('WooCommerce Page Settings', 'classic-dog-breeder'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	$wp_customize->add_setting('classic_dog_breeder_shop_page_sidebar',array(
		'default' => false,
		'sanitize_callback'	=> 'classic_dog_breeder_sanitize_checkbox'
	 ));
	 $wp_customize->add_control('classic_dog_breeder_shop_page_sidebar',array(
		'type' => 'checkbox',
		'label' => __(' Check To Enable Shop page sidebar','classic-dog-breeder'),
		'section' => 'classic_dog_breeder_woocommerce_page_settings',
	 ));

    // shop page sidebar alignment
    $wp_customize->add_setting('classic_dog_breeder_shop_page_sidebar_position', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'classic_dog_breeder_sanitize_choices',
	));
	$wp_customize->add_control('classic_dog_breeder_shop_page_sidebar_position',array(
		'type'           => 'radio',
		'label'          => __('Shop Page Sidebar', 'classic-dog-breeder'),
		'section'        => 'classic_dog_breeder_woocommerce_page_settings',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'classic-dog-breeder'),
			'Right Sidebar' => __('Right Sidebar', 'classic-dog-breeder'),
		),
	));	 

	$wp_customize->add_setting('classic_dog_breeder_wooproducts_nav',array(
		'default' => 'Yes',
		'sanitize_callback'	=> 'classic_dog_breeder_sanitize_choices'
	 ));
	 $wp_customize->add_control('classic_dog_breeder_wooproducts_nav',array(
		'type' => 'select',
		'label' => __('Shop Page Products Navigation','classic-dog-breeder'),
		'choices' => array(
			 'Yes' => __('Yes','classic-dog-breeder'),
			 'No' => __('No','classic-dog-breeder'),
		 ),
		'section' => 'classic_dog_breeder_woocommerce_page_settings',
	 ));

	 $wp_customize->add_setting( 'classic_dog_breeder_single_page_sidebar',array(
		'default' => false,
		'sanitize_callback'	=> 'classic_dog_breeder_sanitize_checkbox'
    ) );
    $wp_customize->add_control('classic_dog_breeder_single_page_sidebar',array(
    	'type' => 'checkbox',
       	'label' => __('Check To Enable Single Product Page Sidebar','classic-dog-breeder'),
		'section' => 'classic_dog_breeder_woocommerce_page_settings'
    ));

	// single product page sidebar alignment
    $wp_customize->add_setting('classic_dog_breeder_single_product_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'classic_dog_breeder_sanitize_choices',
	));
	$wp_customize->add_control('classic_dog_breeder_single_product_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Single product Page Sidebar', 'classic-dog-breeder'),
		'section'        => 'classic_dog_breeder_woocommerce_page_settings',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'classic-dog-breeder'),
			'Right Sidebar' => __('Right Sidebar', 'classic-dog-breeder'),
		),
	));

	$wp_customize->add_setting('classic_dog_breeder_related_product_enable',array(
		'default' => true,
		'sanitize_callback'	=> 'classic_dog_breeder_sanitize_checkbox'
	));
	$wp_customize->add_control('classic_dog_breeder_related_product_enable',array(
		'type' => 'checkbox',
		'label' => __('Check To Enable Related product','classic-dog-breeder'),
		'section' => 'classic_dog_breeder_woocommerce_page_settings',
	));

	$wp_customize->add_setting( 'classic_dog_breeder_woo_product_img_border_radius', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'classic_dog_breeder_sanitize_integer'
    ) );
    $wp_customize->add_control(new Classic_Dog_Breeder_Slider_Custom_Control( $wp_customize, 'classic_dog_breeder_woo_product_img_border_radius',array(
		'label'	=> esc_html__('Woo Product Img Border Radius','classic-dog-breeder'),
		'section'=> 'classic_dog_breeder_woocommerce_page_settings',
		'settings'=>'classic_dog_breeder_woo_product_img_border_radius',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 100,
        ),
	)));

	// Add a setting for number of products per row
    $wp_customize->add_setting('classic_dog_breeder_products_per_row', array(
	    'default'   => '4',
	    'transport' => 'refresh',
	    'sanitize_callback' => 'classic_dog_breeder_sanitize_integer'  
    ));

   	$wp_customize->add_control('classic_dog_breeder_products_per_row', array(
	   'label'    => __('Products Per Row', 'classic-dog-breeder'),
	   'section'  => 'classic_dog_breeder_woocommerce_page_settings',
	   'settings' => 'classic_dog_breeder_products_per_row',
	   'type'     => 'select',
	   'choices'  => array(
			'2' => '2',
			'3' => '3',
			'4' => '4',
	  ),
   	) );
   
   	// Add a setting for the number of products per page
	$wp_customize->add_setting('classic_dog_breeder_products_per_page', array(
		'default'   => '8',
		'transport' => 'refresh',
		'sanitize_callback' => 'classic_dog_breeder_sanitize_integer'
	));

	$wp_customize->add_control('classic_dog_breeder_products_per_page', array(
		'label'    => __('Products Per Page', 'classic-dog-breeder'),
		'section'  => 'classic_dog_breeder_woocommerce_page_settings',
		'settings' => 'classic_dog_breeder_products_per_page',
		'type'     => 'number',
		'input_attrs' => array(
			'min'  => 1,
			'step' => 1,
		),
	));

	//Theme Options
	$wp_customize->add_panel( 'classic_dog_breeder_panel_area', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'title' => __( 'Theme Options Panel', 'classic-dog-breeder' ),
	) );

	//Site Layout Section
	$wp_customize->add_section('classic_dog_breeder_site_layoutsec',array(
		'title'	=> __('Manage Site Layout Section ','classic-dog-breeder'),
		'description' => __('<p class="sec-title">Manage Site Layout Section</p>','classic-dog-breeder'),
		'priority'	=> 1,
		'panel' => 'classic_dog_breeder_panel_area',
	));

	$wp_customize->add_setting('classic_dog_breeder_preloader',array(
		'default' => false,
		'sanitize_callback' => 'classic_dog_breeder_sanitize_checkbox',
	));
	$wp_customize->add_control( 'classic_dog_breeder_preloader', array(
	   'section'   => 'classic_dog_breeder_site_layoutsec',
	   'label'	=> __('Check to Show preloader','classic-dog-breeder'),
	   'type'      => 'checkbox'
 	));	

	$wp_customize->add_setting('classic_dog_breeder_preloader_bg_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'classic_dog_breeder_preloader_bg_image',array(
        'section' => 'classic_dog_breeder_site_layoutsec',
		'label' => __('Preloader Background Image','classic-dog-breeder'),
	)));

	$wp_customize->add_setting( 'classic_dog_breeder_theme_page_breadcrumb',array(
		'default' => false,
        'sanitize_callback'	=> 'classic_dog_breeder_sanitize_checkbox',
	) );
	$wp_customize->add_control('classic_dog_breeder_theme_page_breadcrumb',array(
       'section' => 'classic_dog_breeder_site_layoutsec',
	   'label' => __( 'Check To Enable Theme Page Breadcrumb','classic-dog-breeder' ),
	   'type' => 'checkbox'
    ));		

	$wp_customize->add_setting('classic_dog_breeder_box_layout',array(
		'default' => false,
		'sanitize_callback' => 'classic_dog_breeder_sanitize_checkbox',
	));
	$wp_customize->add_control( 'classic_dog_breeder_box_layout', array(
	   'section'   => 'classic_dog_breeder_site_layoutsec',
	   'label'	=> __('Check to Show Box Layout','classic-dog-breeder'),
	   'type'      => 'checkbox'
 	));

	// Add Settings and Controls for Page Layout
    $wp_customize->add_setting('classic_dog_breeder_sidebar_page_layout',array(
		'default' => 'full',
	 	'sanitize_callback' => 'classic_dog_breeder_sanitize_choices'
	));
	$wp_customize->add_control('classic_dog_breeder_sidebar_page_layout',array(
		'type' => 'radio',
		'label'     => __('Theme Page Sidebar Position', 'classic-dog-breeder'),
		'section' => 'classic_dog_breeder_site_layoutsec',
		'choices' => array(
			'full' => __('Full','classic-dog-breeder'),
			'left' => __('Left','classic-dog-breeder'),
			'right' => __('Right','classic-dog-breeder'),
		),
	));		

	// Header Section
	$wp_customize->add_section('classic_dog_breeder_topbar_section',array(
	    'title' => __('Manage Header Sidebar Section','classic-dog-breeder'),
	    'priority'  => null,
	    'panel' => 'classic_dog_breeder_panel_area',
	));

	$wp_customize->add_setting('classic_dog_breeder_topbar_text_title', array(
	    'default'           => '',
	    'sanitize_callback' => 'sanitize_text_field',
	    'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control('classic_dog_breeder_topbar_text_title', array(
	    'settings' => 'classic_dog_breeder_topbar_text_title',
	    'section'  => 'classic_dog_breeder_topbar_section',
	    'label'    => __('Add Text', 'classic-dog-breeder'),
	    'type'     => 'text',
	));	

	$wp_customize->add_setting('classic_dog_breeder_topbar_mail_title', array(
	    'default'           => '',
	    'sanitize_callback' => 'sanitize_text_field',
	    'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control('classic_dog_breeder_topbar_mail_title', array(
	    'settings' => 'classic_dog_breeder_topbar_mail_title',
	    'section'  => 'classic_dog_breeder_topbar_section',
	    'label'    => __('Add Mail Title', 'classic-dog-breeder'),
	    'type'     => 'text',
	));	

	$wp_customize->add_setting('classic_dog_breeder_email_address',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_email',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_dog_breeder_email_address', array(
	   'settings' => 'classic_dog_breeder_email_address',
	   'section'   => 'classic_dog_breeder_topbar_section',
	   'label' => __('Add Email Address', 'classic-dog-breeder'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('classic_dog_breeder_topbar_phone_title', array(
	    'default'           => '',
	    'sanitize_callback' => 'sanitize_text_field',
	    'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control('classic_dog_breeder_topbar_phone_title', array(
	    'settings' => 'classic_dog_breeder_topbar_phone_title',
	    'section'  => 'classic_dog_breeder_topbar_section',
	    'label'    => __('Add Phone Title', 'classic-dog-breeder'),
	    'type'     => 'text',
	));	

	$wp_customize->add_setting('classic_dog_breeder_phone_number',array(
		'default' => '',
		'sanitize_callback' => 'classic_dog_breeder_sanitize_phone_number',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_dog_breeder_phone_number', array(
	   'settings' => 'classic_dog_breeder_phone_number',
	   'section'   => 'classic_dog_breeder_topbar_section',
	   'label' => __('Add Phone Number', 'classic-dog-breeder'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('classic_dog_breeder_facebook_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_dog_breeder_facebook_link', array(
	   'settings' => 'classic_dog_breeder_facebook_link',
	   'section'   => 'classic_dog_breeder_topbar_section',
	   'label' => __('Facebook Link', 'classic-dog-breeder'),
	   'type'      => 'url'
	));

	$wp_customize->add_setting('classic_dog_breeder_twitter_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_dog_breeder_twitter_link', array(
	   'settings' => 'classic_dog_breeder_twitter_link',
	   'section'   => 'classic_dog_breeder_topbar_section',
	   'label' => __('Twitter Link', 'classic-dog-breeder'),
	   'type'      => 'url'
	));

	$wp_customize->add_setting('classic_dog_breeder_instagram_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_dog_breeder_instagram_link', array(
	   'settings' => 'classic_dog_breeder_instagram_link',
	   'section'   => 'classic_dog_breeder_topbar_section',
	   'label' => __('Instagram Link', 'classic-dog-breeder'),
	   'type'      => 'url'
	));

	$wp_customize->add_setting('classic_dog_breeder_youtube_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_dog_breeder_youtube_link', array(
	   'settings' => 'classic_dog_breeder_youtube_link',
	   'section'   => 'classic_dog_breeder_topbar_section',
	   'label' => __('Youtube Link', 'classic-dog-breeder'),
	   'type'      => 'url'
	));

    // Slider Section
	$wp_customize->add_section('classic_dog_breeder_banner_section',array(
	    'title' => __('Manage Banner Section','classic-dog-breeder'),
	    'priority'  => null,
	    'description'	=> __('<p class="sec-title">Manage Banner Section</p> Select Page from the Dropdowns for banner.','classic-dog-breeder'),
	    'panel' => 'classic_dog_breeder_panel_area',
	));	

	$wp_customize->add_setting('classic_dog_breeder_banner',array(
		'default' => false,
		'sanitize_callback' => 'classic_dog_breeder_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_dog_breeder_banner', array(
	   'settings' => 'classic_dog_breeder_banner',
	   'section'   => 'classic_dog_breeder_banner_section',
	   'label'     => __('Check To Enable This Section','classic-dog-breeder'),
	   'type'      => 'checkbox'
	));

	$wp_customize->add_setting('classic_dog_breeder_banner_top_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'classic_dog_breeder_banner_top_img',array(
	    'label' => __('Select Banner Top Image','classic-dog-breeder'),
	    'description'	=> __('Use the given image dimension (440px x 300px).','classic-dog-breeder'),
	    'section' => 'classic_dog_breeder_banner_section'
	)));

	$wp_customize->add_setting('classic_dog_breeder_banner_title', array(
	    'default'           => '',
	    'sanitize_callback' => 'sanitize_text_field',
	    'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control('classic_dog_breeder_banner_title', array(
	    'settings' => 'classic_dog_breeder_banner_title',
	    'section'  => 'classic_dog_breeder_banner_section',
	    'label'    => __('Add Banner Title', 'classic-dog-breeder'),
	    'type'     => 'text',
	));

	$wp_customize->add_setting('classic_dog_breeder_banner_text', array(
	    'default'           => '',
	    'sanitize_callback' => 'sanitize_text_field',
	    'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control('classic_dog_breeder_banner_text', array(
	    'settings' => 'classic_dog_breeder_banner_text',
	    'section'  => 'classic_dog_breeder_banner_section',
	    'label'    => __('Add Banner Text', 'classic-dog-breeder'),
	    'type'     => 'text',
	));

	$wp_customize->add_setting('classic_dog_breeder_button_text', array(
	    'default'           => 'Explore the Puppies',
	    'sanitize_callback' => 'sanitize_text_field',
	    'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control('classic_dog_breeder_button_text', array(
	    'settings' => 'classic_dog_breeder_button_text',
	    'section'  => 'classic_dog_breeder_banner_section',
	    'label'    => __('Add Button Text', 'classic-dog-breeder'),
	    'type'     => 'text',
	));

	$classic_dog_breeder_args = array(
       	'type'                     => 'product',
        'child_of'                 => 0,
        'parent'                   => '',
        'orderby'                  => 'term_group',
        'order'                    => 'ASC',
        'hide_empty'               => false,
        'hierarchical'             => 1,
        'number'                   => '',
        'taxonomy'                 => 'product_cat',
        'pad_counts'               => false
    );
	$classic_dog_breeder_categories = get_categories($classic_dog_breeder_args);
	$classic_dog_breeder_cat_posts = array();
	$classic_dog_breeder_m = 0;
	$classic_dog_breeder_cat_posts[]='Select';
	foreach($classic_dog_breeder_categories as $classic_dog_breeder_category){
		if($classic_dog_breeder_m==0){
			$classic_dog_breeder_default = $classic_dog_breeder_category->slug;
			$classic_dog_breeder_m++;
		}
		$classic_dog_breeder_cat_posts[$classic_dog_breeder_category->slug] = $classic_dog_breeder_category->name;
	}

	$wp_customize->add_setting('classic_dog_breeder_hot_products_cat',array(
		'default'	=> 'select',
		'sanitize_callback' => 'classic_dog_breeder_sanitize_choices',
	));
	$wp_customize->add_control('classic_dog_breeder_hot_products_cat',array(
		'type'    => 'select',
		'choices' => $classic_dog_breeder_cat_posts,
		'label' => __('Select category to display products ','classic-dog-breeder'),
		'section' => 'classic_dog_breeder_banner_section',
	));

	$wp_customize->add_setting('classic_dog_breeder_banner_left_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'classic_dog_breeder_banner_left_img',array(
	    'label' => __('Select Banner Left Image','classic-dog-breeder'),
	    'description'	=> __('Use the given image dimension (345px x 450px).','classic-dog-breeder'),
	    'section' => 'classic_dog_breeder_banner_section'
	)));

	$wp_customize->add_setting('classic_dog_breeder_banner_right_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'classic_dog_breeder_banner_right_img',array(
	    'label' => __('Select Banner Right Image','classic-dog-breeder'),
	    'description'	=> __('Use the given image dimension (345px x 450px).','classic-dog-breeder'),
	    'section' => 'classic_dog_breeder_banner_section'
	)));
	
	// Product Section
	$wp_customize->add_section('classic_dog_breeder_product_section', array(
	    'title'       => __('Manage Product Section', 'classic-dog-breeder'),
	    'description' => __('<p class="sec-title">Manage Product Section</p>', 'classic-dog-breeder'),
	    'priority'    => null,
	    'panel'       => 'classic_dog_breeder_panel_area',
	));

	$wp_customize->add_setting('classic_dog_breeder_disabled_product_section', array(
	    'default'           => false,
	    'sanitize_callback' => 'classic_dog_breeder_sanitize_checkbox',
	    'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control('classic_dog_breeder_disabled_product_section', array(
	    'settings' => 'classic_dog_breeder_disabled_product_section',
	    'section'  => 'classic_dog_breeder_product_section',
	    'label'    => __('Check To Enable Section', 'classic-dog-breeder'),
	    'type'     => 'checkbox',
	));

	$wp_customize->add_setting('classic_dog_breeder_product_sec_text', array(
	    'default'           => '',
	    'sanitize_callback' => 'sanitize_text_field',
	    'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control('classic_dog_breeder_product_sec_text', array(
	    'settings' => 'classic_dog_breeder_product_sec_text',
	    'section'  => 'classic_dog_breeder_product_section',
	    'label'    => __('Add Section Text', 'classic-dog-breeder'),
	    'type'     => 'text',
	));

	$wp_customize->add_setting('classic_dog_breeder_product_sec_title', array(
	    'default'           => '',
	    'sanitize_callback' => 'sanitize_text_field',
	    'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control('classic_dog_breeder_product_sec_title', array(
	    'settings' => 'classic_dog_breeder_product_sec_title',
	    'section'  => 'classic_dog_breeder_product_section',
	    'label'    => __('Add Section Title', 'classic-dog-breeder'),
	    'type'     => 'text',
	));

	$classic_dog_breeder_args = array(
       	'type'                     => 'product',
        'child_of'                 => 0,
        'parent'                   => '',
        'orderby'                  => 'term_group',
        'order'                    => 'ASC',
        'hide_empty'               => false,
        'hierarchical'             => 1,
        'number'                   => '',
        'taxonomy'                 => 'product_cat',
        'pad_counts'               => false
    );
	$classic_dog_breeder_categories = get_categories($classic_dog_breeder_args);
	$classic_dog_breeder_cat_posts = array();
	$classic_dog_breeder_m = 0;
	$classic_dog_breeder_cat_posts[]='Select';
	foreach($classic_dog_breeder_categories as $classic_dog_breeder_category){
		if($classic_dog_breeder_m==0){
			$classic_dog_breeder_default = $classic_dog_breeder_category->slug;
			$classic_dog_breeder_m++;
		}
		$classic_dog_breeder_cat_posts[$classic_dog_breeder_category->slug] = $classic_dog_breeder_category->name;
	}

	$wp_customize->add_setting('classic_dog_breeder_products_cat',array(
		'default'	=> 'select',
		'sanitize_callback' => 'classic_dog_breeder_sanitize_choices',
	));
	$wp_customize->add_control('classic_dog_breeder_products_cat',array(
		'type'    => 'select',
		'choices' => $classic_dog_breeder_cat_posts,
		'label' => __('Select category to display products ','classic-dog-breeder'),
		'section' => 'classic_dog_breeder_product_section',
	));

	//Blog post
	$wp_customize->add_section('classic_dog_breeder_blog_post_settings',array(
        'title' => __('Manage Post Section', 'classic-dog-breeder'),
        'priority' => null,
        'panel' => 'classic_dog_breeder_panel_area'
    ) );

	$wp_customize->add_setting('classic_dog_breeder_metafields_date', array(
	    'default' => true,
	    'sanitize_callback' => 'classic_dog_breeder_sanitize_checkbox',
	));
	$wp_customize->add_control('classic_dog_breeder_metafields_date', array(
	    'settings' => 'classic_dog_breeder_metafields_date', 
	    'section'   => 'classic_dog_breeder_blog_post_settings',
	    'label'     => __('Check to Enable Date', 'classic-dog-breeder'),
	    'type'      => 'checkbox',
	));

	$wp_customize->add_setting('classic_dog_breeder_metafields_comments', array(
		'default' => true,
		'sanitize_callback' => 'classic_dog_breeder_sanitize_checkbox',
	));	
	$wp_customize->add_control('classic_dog_breeder_metafields_comments', array(
		'settings' => 'classic_dog_breeder_metafields_comments',
		'section'  => 'classic_dog_breeder_blog_post_settings',
		'label'    => __('Check to Enable Comments', 'classic-dog-breeder'),
		'type'     => 'checkbox',
	));

	$wp_customize->add_setting('classic_dog_breeder_metafields_author', array(
		'default' => true,
		'sanitize_callback' => 'classic_dog_breeder_sanitize_checkbox',
	));
	$wp_customize->add_control('classic_dog_breeder_metafields_author', array(
		'settings' => 'classic_dog_breeder_metafields_author',
		'section'  => 'classic_dog_breeder_blog_post_settings',
		'label'    => __('Check to Enable Author', 'classic-dog-breeder'),
		'type'     => 'checkbox',
	));		

	$wp_customize->add_setting('classic_dog_breeder_metafields_time', array(
		'default' => true,
		'sanitize_callback' => 'classic_dog_breeder_sanitize_checkbox',
	));
	$wp_customize->add_control('classic_dog_breeder_metafields_time', array(
		'settings' => 'classic_dog_breeder_metafields_time',
		'section'  => 'classic_dog_breeder_blog_post_settings',
		'label'    => __('Check to Enable Time', 'classic-dog-breeder'),
		'type'     => 'checkbox',
	));	

    // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('classic_dog_breeder_sidebar_post_layout',array(
		'default' => 'right',
		'sanitize_callback' => 'classic_dog_breeder_sanitize_choices'
	));
	$wp_customize->add_control('classic_dog_breeder_sidebar_post_layout',array(
		'type' => 'radio',
		'label'     => __('Theme Post Sidebar Position', 'classic-dog-breeder'),
		'description'   => __('This option work for blog page, archive page and search page.', 'classic-dog-breeder'),
		'section' => 'classic_dog_breeder_blog_post_settings',
		'choices' => array(
			'full' => __('Full','classic-dog-breeder'),
			'left' => __('Left','classic-dog-breeder'),
			'right' => __('Right','classic-dog-breeder'),
			'three-column' => __('Three Columns','classic-dog-breeder'),
			'four-column' => __('Four Columns','classic-dog-breeder'),
			'grid' => __('Grid Layout','classic-dog-breeder')
     ),
	) );

	$wp_customize->add_setting('classic_dog_breeder_blog_post_description_option',array(
    	'default'   => 'Excerpt Content', 
        'sanitize_callback' => 'classic_dog_breeder_sanitize_choices'
	));
	$wp_customize->add_control('classic_dog_breeder_blog_post_description_option',array(
        'type' => 'radio',
        'label' => __('Post Description Length','classic-dog-breeder'),
        'section' => 'classic_dog_breeder_blog_post_settings',
        'choices' => array(
            'No Content' => __('No Content','classic-dog-breeder'),
            'Excerpt Content' => __('Excerpt Content','classic-dog-breeder'),
            'Full Content' => __('Full Content','classic-dog-breeder'),
        ),
	) );

	$wp_customize->add_setting('classic_dog_breeder_blog_post_thumb',array(
        'sanitize_callback' => 'classic_dog_breeder_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('classic_dog_breeder_blog_post_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Show / Hide Blog Post Thumbnail', 'classic-dog-breeder'),
        'section'     => 'classic_dog_breeder_blog_post_settings',
    ));

    $wp_customize->add_setting( 'classic_dog_breeder_blog_post_page_image_box_shadow', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'classic_dog_breeder_sanitize_integer'
    ) );
    $wp_customize->add_control(new Classic_Dog_Breeder_Slider_Custom_Control( $wp_customize, 'classic_dog_breeder_blog_post_page_image_box_shadow',array(
		'label'	=> esc_html__('Blog Page Image Box Shadow','classic-dog-breeder'),
		'section'=> 'classic_dog_breeder_blog_post_settings',
		'settings'=>'classic_dog_breeder_blog_post_page_image_box_shadow',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 100,
        ),
	)));

	//Single Post Settings
	$wp_customize->add_section('classic_dog_breeder_single_post_settings',array(
		'title' => __('Manage Single Post Section', 'classic-dog-breeder'),
		'priority' => null,
		'panel' => 'classic_dog_breeder_panel_area'
	));

	$wp_customize->add_setting( 'classic_dog_breeder_single_page_breadcrumb',array(
		'default' => true,
        'sanitize_callback'	=> 'classic_dog_breeder_sanitize_checkbox',
	));
	$wp_customize->add_control('classic_dog_breeder_single_page_breadcrumb',array(
       'section' => 'classic_dog_breeder_single_post_settings',
	   'label' => __( 'Check To Enable Breadcrumb','classic-dog-breeder' ),
	   'type' => 'checkbox'
    ));	

	$wp_customize->add_setting('classic_dog_breeder_sidebar_single_post_layout',array(
    	'default' => 'right',
    	 'sanitize_callback' => 'classic_dog_breeder_sanitize_choices'
	));
	$wp_customize->add_control('classic_dog_breeder_sidebar_single_post_layout',array(
   		'type' => 'radio',
    	'label'     => __('Single post sidebar layout', 'classic-dog-breeder'),
     	'section' => 'classic_dog_breeder_single_post_settings',
     	'choices' => array(
			'full' => __('Full','classic-dog-breeder'),
			'left' => __('Left','classic-dog-breeder'),
			'right' => __('Right','classic-dog-breeder'),
     ),
	));

	// Footer Section
	$wp_customize->add_section('classic_dog_breeder_footer', array(
		'title'	=> __('Manage Footer Section','classic-dog-breeder'),
		'description'	=> __('<p class="sec-title">Manage Footer Section</p>','classic-dog-breeder'),
		'priority'	=> null,
		'panel' => 'classic_dog_breeder_panel_area',
	));

	$wp_customize->add_setting('classic_dog_breeder_footer_widget', array(
	    'default' => true,
	    'sanitize_callback' => 'classic_dog_breeder_sanitize_checkbox',
	));
	$wp_customize->add_control('classic_dog_breeder_footer_widget', array(
	    'settings' => 'classic_dog_breeder_footer_widget',
	    'section'   => 'classic_dog_breeder_footer',
	    'label'     => __('Check to Enable Footer Widget', 'classic-dog-breeder'),
	    'type'      => 'checkbox',
	));

	//  footer bg color
	$wp_customize->add_setting('classic_dog_breeder_footerbg_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_dog_breeder_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_dog_breeder_footerbg_color', array(
		'settings' => 'classic_dog_breeder_footerbg_color',
		'section'   => 'classic_dog_breeder_footer',
		'label' => __('Footer Background Color', 'classic-dog-breeder'),
		'type'      => 'color'
	));

	$wp_customize->add_setting('classic_dog_breeder_footer_bg_image',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'classic_dog_breeder_footer_bg_image',array(
        'label' => __('Footer Background Image','classic-dog-breeder'),
        'section' => 'classic_dog_breeder_footer',
    )));

	$wp_customize->add_setting('classic_dog_breeder_copyright_line',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'classic_dog_breeder_copyright_line', array(
	   'section' 	=> 'classic_dog_breeder_footer',
	   'label'	 	=> __('Copyright Line','classic-dog-breeder'),
	   'type'    	=> 'text',
	   'priority' 	=> null,
    ));

	$wp_customize->add_setting('classic_dog_breeder_copyright_link',array(
    	'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'classic_dog_breeder_copyright_link', array(
	   'section' 	=> 'classic_dog_breeder_footer',
	   'label'	 	=> __('Copyright Link','classic-dog-breeder'),
	   'type'    	=> 'text',
	   'priority' 	=> null,
    ));

	//  footer coypright color
	$wp_customize->add_setting('classic_dog_breeder_footercoypright_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_dog_breeder_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_dog_breeder_footercoypright_color', array(
	   'settings' => 'classic_dog_breeder_footercoypright_color',
	   'section'   => 'classic_dog_breeder_footer',
	   'label' => __('Coypright Color', 'classic-dog-breeder'),
	   'type'      => 'color'
	));

	//  footer title color
	$wp_customize->add_setting('classic_dog_breeder_footertitle_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_dog_breeder_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_dog_breeder_footertitle_color', array(
	   'settings' => 'classic_dog_breeder_footertitle_color',
	   'section'   => 'classic_dog_breeder_footer',
	   'label' => __('Title Color', 'classic-dog-breeder'),
	   'type'      => 'color'
	));

	//  footer description color
	$wp_customize->add_setting('classic_dog_breeder_footerdescription_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_dog_breeder_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_dog_breeder_footerdescription_color', array(
	   'settings' => 'classic_dog_breeder_footerdescription_color',
	   'section'   => 'classic_dog_breeder_footer',
	   'label' => __('Description Color', 'classic-dog-breeder'),
	   'type'      => 'color'
	));

	//  footer list color
	$wp_customize->add_setting('classic_dog_breeder_footerlist_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_dog_breeder_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_dog_breeder_footerlist_color', array(
	   'settings' => 'classic_dog_breeder_footerlist_color',
	   'section'   => 'classic_dog_breeder_footer',
	   'label' => __('List Color', 'classic-dog-breeder'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('classic_dog_breeder_scroll_hide', array(
        'default' => true,
        'sanitize_callback' => 'classic_dog_breeder_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'classic_dog_breeder_scroll_hide',array(
        'label'          => __( 'Check To Show Scroll To Top', 'classic-dog-breeder' ),
        'section'        => 'classic_dog_breeder_footer',
        'settings'       => 'classic_dog_breeder_scroll_hide',
        'type'           => 'checkbox',
    )));

	$wp_customize->add_setting('classic_dog_breeder_scroll_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'classic_dog_breeder_sanitize_choices'
    ));
    $wp_customize->add_control('classic_dog_breeder_scroll_position',array(
        'type' => 'radio',
        'section' => 'classic_dog_breeder_footer',
        'label'	 	=> __('Scroll To Top Positions','classic-dog-breeder'),
        'choices' => array(
            'Right' => __('Right','classic-dog-breeder'),
            'Left' => __('Left','classic-dog-breeder'),
            'Center' => __('Center','classic-dog-breeder')
        ),
    ) );

	$wp_customize->add_setting('classic_dog_breeder_footer_widget_areas',array(
		'default'           => 4,
		'sanitize_callback' => 'classic_dog_breeder_sanitize_choices',
	));
	$wp_customize->add_control('classic_dog_breeder_footer_widget_areas',array(
		'type'        => 'radio',
		'section' => 'classic_dog_breeder_footer',
		'label'       => __('Footer widget area', 'classic-dog-breeder'),
		'choices' => array(
		   '1'     => __('One', 'classic-dog-breeder'),
		   '2'     => __('Two', 'classic-dog-breeder'),
		   '3'     => __('Three', 'classic-dog-breeder'),
		   '4'     => __('Four', 'classic-dog-breeder')
		),
	));
    
	// Google Fonts
	$wp_customize->add_section( 'classic_dog_breeder_google_fonts_section', array(
		'title'       => __( 'Google Fonts', 'classic-dog-breeder' ),
		'priority'    => 24,
	) );

	$font_choices = array(
		'Kaushan Script:' => 'Kaushan Script',
		'Emilys Candy:' => 'Emilys Candy',
		'Poppins:0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900' => 'Poppins',
		'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
		'Open Sans:400italic,700italic,400,700' => 'Open Sans',
		'Oswald:400,700' => 'Oswald',
		'Playfair Display:400,700,400italic' => 'Playfair Display',
		'Montserrat:400,700' => 'Montserrat',
		'Raleway:400,700' => 'Raleway',
		'Droid Sans:400,700' => 'Droid Sans',
		'Lato:400,700,400italic,700italic' => 'Lato',
		'Arvo:400,700,400italic,700italic' => 'Arvo',
		'Lora:400,700,400italic,700italic' => 'Lora',
		'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
		'Oxygen:400,300,700' => 'Oxygen',
		'PT Serif:400,700' => 'PT Serif',
		'PT Sans:400,700,400italic,700italic' => 'PT Sans',
		'PT Sans Narrow:400,700' => 'PT Sans Narrow',
		'Cabin:400,700,400italic' => 'Cabin',
		'Fjalla One:400' => 'Fjalla One',
		'Francois One:400' => 'Francois One',
		'Josefin Sans:400,300,600,700' => 'Josefin Sans',
		'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
		'Arimo:400,700,400italic,700italic' => 'Arimo',
		'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
		'Bitter:400,700,400italic' => 'Bitter',
		'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
		'Roboto:400,400italic,700,700italic' => 'Roboto',
		'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
		'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
		'Roboto Slab:400,700' => 'Roboto Slab',
		'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
		'Rokkitt:400' => 'Rokkitt',
	);

	$wp_customize->add_setting( 'classic_dog_breeder_headings_fonts', array(
		'sanitize_callback' => 'classic_dog_breeder_sanitize_fonts',
	));
	$wp_customize->add_control( 'classic_dog_breeder_headings_fonts', array(
		'type' => 'select',
		'description' => __('Select your desired font for the headings.', 'classic-dog-breeder'),
		'section' => 'classic_dog_breeder_google_fonts_section',
		'choices' => $font_choices
	));

	$wp_customize->add_setting( 'classic_dog_breeder_body_fonts', array(
		'sanitize_callback' => 'classic_dog_breeder_sanitize_fonts'
	));
	$wp_customize->add_control( 'classic_dog_breeder_body_fonts', array(
		'type' => 'select',
		'description' => __( 'Select your desired font for the body.', 'classic-dog-breeder' ),
		'section' => 'classic_dog_breeder_google_fonts_section',
		'choices' => $font_choices
	));
  
}
add_action( 'customize_register', 'classic_dog_breeder_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function classic_dog_breeder_customize_preview_js() {
	wp_enqueue_script( 'classic_dog_breeder_customizer', esc_url(get_template_directory_uri()) . '/js/customize-preview.js', array( 'customize-preview' ), '20161510', true );
}
add_action( 'customize_preview_init', 'classic_dog_breeder_customize_preview_js' );
