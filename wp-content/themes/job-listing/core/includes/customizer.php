<?php

if ( class_exists("Kirki")){
	// LOGO

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'job_listing_logo_resizer',
		'label'       => esc_html__( 'Adjust Your Logo Size ', 'job-listing' ),
		'section'     => 'title_tagline',
		'default'     => 70,
		'choices'     => [
			'min'  => 10,
			'max'  => 300,
			'step' => 10,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'job_listing_enable_logo_text',
		'section'     => 'title_tagline',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Site Title and Tagline', 'job-listing' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'job_listing_display_header_title',
		'label'       => esc_html__( 'Site Title Enable / Disable Button', 'job-listing' ),
		'section'     => 'title_tagline',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'job-listing' ),
			'off' => esc_html__( 'Disable', 'job-listing' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'job_listing_display_header_text',
		'label'       => esc_html__( 'Tagline Enable / Disable Button', 'job-listing' ),
		'section'     => 'title_tagline',
		'default'     => false,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'job-listing' ),
			'off' => esc_html__( 'Disable', 'job-listing' ),
		],
	] );

	// FONT STYLE TYPOGRAPHY

	Kirki::add_panel( 'job_listing_panel_id', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Typography', 'job-listing' ),
	) );

	Kirki::add_section( 'job_listing_font_style_section', array(
		'title'      => esc_html__( 'Typography Option',  'job-listing' ),
		'priority'   => 2,
		'capability' => 'edit_theme_options',
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'job_listing_all_headings_typography',
		'section'     => 'job_listing_font_style_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading Of All Sections',  'job-listing' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'global', array(
		'type'        => 'typography',
		'settings'    => 'job_listing_all_headings_typography',
		'label'       => esc_html__( 'Heading Typography',  'job-listing' ),
		'description' => esc_html__( 'Select the typography options for your heading.',  'job-listing' ),
		'section'     => 'job_listing_font_style_section',
		'priority'    => 10,
		'default'     => array(
			'font-family'    => '',
			'variant'        => '',
		),
		'output' => array(
			array(
				'element' => array( 'h1','h2','h3','h4','h5','h6', ),
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'job_listing_body_content_typography',
		'section'     => 'job_listing_font_style_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Body Content',  'job-listing' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'global', array(
		'type'        => 'typography',
		'settings'    => 'job_listing_body_content_typography',
		'label'       => esc_html__( 'Content Typography',  'job-listing' ),
		'description' => esc_html__( 'Select the typography options for your content.',  'job-listing' ),
		'section'     => 'job_listing_font_style_section',
		'priority'    => 10,
		'default'     => array(
			'font-family'    => '',
			'variant'        => '',
		),
		'output' => array(
			array(
				'element' => array( 'body', ),
			),
		),
	) );

		// PANEL
	Kirki::add_panel( 'job_listing_panel_id_5', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Theme Animations', 'job-listing' ),
	) );

	// ANIMATION SECTION
	Kirki::add_section( 'job_listing_section_animation', array(
	    'title'          => esc_html__( 'Animations', 'job-listing' ),
	    'priority'       => 2,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'job_listing_animation_enabled',
		'label'       => esc_html__( 'Turn To Show Animation', 'job-listing' ),
		'section'     => 'job_listing_section_animation',
		'default'     => true,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'job-listing' ),
			'off' => esc_html__( 'Disable', 'job-listing' ),
		],
	] );

	// PANEL
	Kirki::add_panel( 'job_listing_panel_id_3', array(
	    'priority'    => 10,
	    'title'       => esc_html__( '404 Settings', 'job-listing' ),
	) );

	// 404 SECTION
	Kirki::add_section( 'job_listing_section_404', array(
	    'title'          => esc_html__( '404 Settings', 'job-listing' ),
	    'priority'       => 3,
	) );

	Kirki::add_field( 'theme_config_id', [
	    'type'        => 'custom',
	    'settings'    => 'job_listing_not_found_heading',
	    'section'     => 'job_listing_section_404',
	    'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Not Found Heading', 'job-listing' ) . '</h3>',
	    'priority'    => 10,
	]);

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'job_listing_404_page_title',
		'section'  => 'job_listing_section_404',
		'default'  => esc_html__('404 Not Found', 'job-listing'),
		'priority' => 10,
	] );

		Kirki::add_field( 'theme_config_id', [
	    'type'        => 'custom',
	    'settings'    => 'job_listing_not_found_text',
	    'section'     => 'job_listing_section_404',
	    'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Not Found Content', 'job-listing' ) . '</h3>',
	    'priority'    => 10,
	]);

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'job_listing_404_page_content',
		'section'  => 'job_listing_section_404',
		'default'  => esc_html__('Sorry, no posts matched your criteria.', 'job-listing'),
		'priority' => 10,
	] );
	// PANEL

	Kirki::add_panel( 'job_listing_panel_id', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Theme Options', 'job-listing' ),
	) );

	// Additional Settings

	Kirki::add_section( 'job_listing_additional_settings', array(
	    'title'          => esc_html__( 'Additional Settings', 'job-listing' ),
	    'panel'          => 'job_listing_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'job_listing_scroll_enable_setting',
		'label'       => esc_html__( 'Here you can enable or disable your scroller.', 'job-listing' ),
		'section'     => 'job_listing_additional_settings',
		'default'     => '1',
		'priority'    => 10,
	] );

	new \Kirki\Field\Radio_Buttonset(
	[
		'settings'    => 'job_listing_scroll_top_position',
		'label'       => esc_html__( 'Alignment for Scroll To Top', 'job-listing' ),
		'section'     => 'job_listing_additional_settings',
		'default'     => 'Right',
		'priority'    => 10,
		'choices'     => [
			'Left'   => esc_html__( 'Left', 'job-listing' ),
			'Center' => esc_html__( 'Center', 'job-listing' ),
			'Right'  => esc_html__( 'Right', 'job-listing' ),
		],
	]
	);

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'dashicons',
		'settings' => 'job_listing_scroll_top_icon',
		'label'    => esc_html__( 'Select Appropriate Scroll Top Icon', 'job-listing' ),
		'section'  => 'job_listing_additional_settings',
		'default'  => 'dashicons dashicons-arrow-up-alt',
		'priority' => 10,
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'menu_text_transform_job_listing',
		'label'       => esc_html__( 'Menus Text Transform', 'job-listing' ),
		'section'     => 'job_listing_additional_settings',
		'default'     => 'CAPITALISE',
		'placeholder' => esc_html__( 'Choose an option', 'job-listing' ),
		'choices'     => [
			'CAPITALISE' => esc_html__( 'CAPITALISE', 'job-listing' ),
			'UPPERCASE' => esc_html__( 'UPPERCASE', 'job-listing' ),
			'LOWERCASE' => esc_html__( 'LOWERCASE', 'job-listing' ),

		],
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'job_listing_menu_zoom',
		'label'       => esc_html__( 'Menu Transition', 'job-listing' ),
		'section'     => 'job_listing_additional_settings',
		'default' => 'Zoom Out',
		'placeholder' => esc_html__( 'Choose an option', 'job-listing' ),
		'choices'     => [
			'Zoomout' => __('Zoom Out','job-listing'),
            'Zoominn' => __('Zoom Inn','job-listing'),
            
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'job_listing_container_width',
		'label'       => esc_html__( 'Theme Container Width', 'job-listing' ),
		'section'     => 'job_listing_additional_settings',
		'default'     => 100,
		'choices'     => [
			'min'  => 50,
			'max'  => 100,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'job_listing_site_loader',
		'label'       => esc_html__( 'Here you can enable or disable your Site Loader.', 'job-listing' ),
		'section'     => 'job_listing_additional_settings',
		'default'     => false,
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'job_listing_sticky_header',
		'label'       => esc_html__( 'Here you can enable or disable your Sticky Header.', 'job-listing' ),
		'section'     => 'job_listing_additional_settings',
		'default'     => false,
		'priority'    => 10,
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'job_listing_page_layout',
		'label'       => esc_html__( 'Page Layout Setting', 'job-listing' ),
		'section'     => 'job_listing_additional_settings',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'job-listing' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','job-listing'),
            'Right Sidebar' => __('Right Sidebar','job-listing'),
            'One Column' => __('One Column','job-listing')
		],
	] );

	if ( class_exists("woocommerce")){

	// Woocommerce Settings

	Kirki::add_section( 'job_listing_woocommerce_settings', array(
		'title'          => esc_html__( 'Woocommerce Settings', 'job-listing' ),
		'panel'          => 'job_listing_panel_id',
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'job_listing_shop_sidebar',
		'label'       => esc_html__( 'Here you can enable or disable shop page sidebar.', 'job-listing' ),
		'section'     => 'job_listing_woocommerce_settings',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'job_listing_product_sidebar',
		'label'       => esc_html__( 'Here you can enable or disable product page sidebar.', 'job-listing' ),
		'section'     => 'job_listing_woocommerce_settings',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'job_listing_related_product_setting',
		'label'       => esc_html__( 'Here you can enable or disable your related products.', 'job-listing' ),
		'section'     => 'job_listing_woocommerce_settings',
		'default'     => true,
		'priority'    => 10,
	] );

	new \Kirki\Field\Number(
		[
			'settings' => 'job_listing_per_columns',
			'label'    => esc_html__( 'Product Per Row', 'job-listing' ),
			'section'  => 'job_listing_woocommerce_settings',
			'default'  => 3,
			'choices'  => [
				'min'  => 1,
				'max'  => 4,
				'step' => 1,
			],
		]
	);

	new \Kirki\Field\Number(
		[
			'settings' => 'job_listing_product_per_page',
			'label'    => esc_html__( 'Product Per Page', 'job-listing' ),
			'section'  => 'job_listing_woocommerce_settings',
			'default'  => 9,
			'choices'  => [
				'min'  => 1,
				'max'  => 15,
				'step' => 1,
			],
		]
	);

	new \Kirki\Field\Number(
	[
		'settings' => 'custom_related_products_number_per_row',
		'label'    => esc_html__( 'Related Product Per Column', 'job-listing' ),
		'section'  => 'job_listing_woocommerce_settings',
		'default'  => 3,
		'choices'  => [
			'min'  => 1,
			'max'  => 4,
			'step' => 1,
		],
	]
	);

	new \Kirki\Field\Number(
	[
		'settings' => 'custom_related_products_number',
		'label'    => esc_html__( 'Related Product Per Page', 'job-listing' ),
		'section'  => 'job_listing_woocommerce_settings',
		'default'  => 3,
		'choices'  => [
			'min'  => 1,
			'max'  => 10,
			'step' => 1,
		],
	]
	);

	new \Kirki\Field\Select(
	[
		'settings'    => 'job_listing_shop_page_layout',
		'label'       => esc_html__( 'Shop Page Layout Setting', 'job-listing' ),
		'section'     => 'job_listing_woocommerce_settings',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'job-listing' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','job-listing'),
            'Right Sidebar' => __('Right Sidebar','job-listing')
		],
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'job_listing_product_page_layout',
		'label'       => esc_html__( 'Product Page Layout Setting', 'job-listing' ),
		'section'     => 'job_listing_woocommerce_settings',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'job-listing' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','job-listing'),
            'Right Sidebar' => __('Right Sidebar','job-listing')
		],
	] );

	new \Kirki\Field\Radio_Buttonset( [
		'settings'    => 'job_listing_woocommerce_pagination_position',
		'label'       => esc_html__( 'Woocommerce Pagination Alignment', 'job-listing' ),
		'section'     => 'job_listing_woocommerce_settings',
		'default'     => 'Center',
		'priority'    => 10,
		'choices'     => [
			'Left'   => esc_html__( 'Left', 'job-listing' ),
			'Center' => esc_html__( 'Center', 'job-listing' ),
			'Right'  => esc_html__( 'Right', 'job-listing' ),
		],
	]
	);

}

	// POST SECTION

	Kirki::add_section( 'job_listing_section_post', array(
	    'title'          => esc_html__( 'Post Settings', 'job-listing' ),
	    'panel'          => 'job_listing_panel_id',
	    'priority'       => 160,
	) );

	new \Kirki\Field\Sortable(
	[
		'settings' => 'job_listing_archive_element_sortable',
		'label'    => __( 'Archive Post Page element Reordering', 'job-listing' ),
		'section'  => 'job_listing_section_post',
		'default'  => [ 'option1', 'option2', 'option3' ],
		'choices'  => [
			'option1' => esc_html__( 'Post Meta', 'job-listing' ),
			'option2' => esc_html__( 'Post Title', 'job-listing' ),
			'option3' => esc_html__( 'Post Content', 'job-listing' ),
		],
	]
	);

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'job_listing_post_excerpt_number',
		'label'       => esc_html__( 'Post Content Range', 'job-listing' ),
		'section'     => 'job_listing_section_post',
		'default'     => 15,
		'choices'     => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'job_listing_pagination_setting',
		'label'       => esc_html__( 'Here you can enable or disable your Pagination.', 'job-listing' ),
		'section'     => 'job_listing_section_post',
		'default'     => true,
		'priority'    => 10,
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'job_listing_archive_sidebar_layout',
		'label'       => esc_html__( 'Archive Post Sidebar Layout Setting', 'job-listing' ),
		'section'     => 'job_listing_section_post',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'job-listing' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','job-listing'),
            'Right Sidebar' => __('Right Sidebar','job-listing'),
            'Three Column' => __('Three Column','job-listing'),
            'Four Column' => __('Four Column','job-listing'),
            'Grid Layout Without Sidebar' => __('Grid Layout Without Sidebar','job-listing'),
            'Grid Layout With Right Sidebar' => __('Grid Layout With Right Sidebar','job-listing'),
            'Grid Layout With Left Sidebar' => __('Grid Layout With Left Sidebar','job-listing')
		],
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'job_listing_single_post_sidebar_layout',
		'label'       => esc_html__( 'Single Post Sidebar Layout Setting', 'job-listing' ),
		'section'     => 'job_listing_section_post',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'job-listing' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','job-listing'),
            'Right Sidebar' => __('Right Sidebar','job-listing'),
		],
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'job_listing_search_sidebar_layout',
		'label'       => esc_html__( 'Search Page Sidebar Layout Setting', 'job-listing' ),
		'section'     => 'job_listing_section_post',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'job-listing' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','job-listing'),
            'Right Sidebar' => __('Right Sidebar','job-listing'),
            'Three Column' => __('Three Column','job-listing'),
            'Four Column' => __('Four Column','job-listing'),
            'Grid Layout Without Sidebar' => __('Grid Layout Without Sidebar','job-listing'),
            'Grid Layout With Right Sidebar' => __('Grid Layout With Right Sidebar','job-listing'),
            'Grid Layout With Left Sidebar' => __('Grid Layout With Left Sidebar','job-listing')
		],
	] );

	// Breadcrumb
	Kirki::add_section( 'job_listing_bradcrumb', array(
	    'title'          => esc_html__( 'Breadcrumb Settings', 'job-listing' ),
	    'panel'          => 'job_listing_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'job_listing_enable_breadcrumb_heading',
		'section'     => 'job_listing_bradcrumb',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Single Page Breadcrumb', 'job-listing' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'job_listing_breadcrumb_enable',
		'label'       => esc_html__( 'Breadcrumb Enable / Disable', 'job-listing' ),
		'section'     => 'job_listing_bradcrumb',
		'default'     => true,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'job-listing' ),
			'off' => esc_html__( 'Disable', 'job-listing' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
        'type'     => 'text',
        'default'     => '/',
        'settings' => 'job_listing_breadcrumb_separator' ,
        'label'    => esc_html__( 'Breadcrumb Separator',  'job-listing' ),
        'section'  => 'job_listing_bradcrumb',
    ] );

	// HEADER SECTION

	Kirki::add_section( 'job_listing_header_section', array(
        'title'          => esc_html__( 'Header Settings', 'job-listing' ),
        'panel'          => 'job_listing_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'job_listing_header_button_heading_button',
		'section'     => 'job_listing_header_section',
		'priority'    => 10,
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Header Button',  'job-listing' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Button Text',  'job-listing' ),
		'type'     => 'text',
		'settings' => 'job_listing_header_newsletter_button_text',
		'section'  => 'job_listing_header_section',
    ] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'url',
		'label'       => esc_html__( 'Button URL', 'job-listing' ),
		'settings' => 'job_listing_header_newsletter_button_url',
		'section'  => 'job_listing_header_section',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'url',
		'label'       => esc_html__( 'Wishlist URL', 'job-listing' ),
		'settings' => 'job_listing_wislist_url',
		'section'  => 'job_listing_header_section',
		'default'  => '',
		'priority' => 12,
	] );

	// SLIDER SECTION

	Kirki::add_section( 'job_listing_blog_slide_section', array(
        'title'          => esc_html__( ' Slider Settings', 'job-listing' ),
        'panel'          => 'job_listing_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'job_listing_enable_heading_2',
		'section'     => 'job_listing_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Slider', 'job-listing' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'job_listing_blog_box_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'job-listing' ),
		'section'     => 'job_listing_blog_slide_section',
		'default'     => true,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'job-listing' ),
			'off' => esc_html__( 'Disable', 'job-listing' ),
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'job_listing_slider_heading',
		'section'     => 'job_listing_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Slider', 'job-listing' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'settings'    => 'job_listing_blog_slide_number',
		'label'       => esc_html__( 'Number of slides to show', 'job-listing' ),
		'section'     => 'job_listing_blog_slide_section',
		'default'     => 0,
		'description' => esc_html__( 'Copy the shortcode from the Contact Form plugin, paste it here, publish the page, and then refresh the front end to display your form.', 'job-listing' ),
		'choices'     => [
			'min'  => 0,
			'max'  => 3,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'settings'    => 'job_listing_blog_slide_category',
		'label'       => esc_html__( 'Select the category to show slider ( Image Dimension 1600 x 600 )', 'job-listing' ),
		'section'     => 'job_listing_blog_slide_section',
		'default'     => '',
		'placeholder' => esc_html__( 'Select an category...', 'job-listing' ),
		'priority'    => 10,
		'choices'     => job_listing_get_categories_select(),
	] );

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Form Shortcode',  'job-listing' ),
		'type'     => 'text',
		'description' => esc_html__( 'Copy the shortcode from Contact form plugin and past it here and publish then refresh in front your form will show', 'job-listing' ),
		'settings' => 'job_listing_contact_form_shortcode',
		'section'  => 'job_listing_blog_slide_section',
    ] );

	//Categories SECTION

	Kirki::add_section( 'job_listing_testimonial_section', array(
	    'title'          => esc_html__( 'Top Categories Settings', 'job-listing' ),
	    'panel'          => 'job_listing_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'job_listing_enable_heading',
		'section'     => 'job_listing_testimonial_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Top Categories',  'job-listing' ) . '</h3>',
		'priority'    => 1,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'job_listing_testimonial_section_enable',
		'section'     => 'job_listing_testimonial_section',
		'default'     => true,
		'priority'    => 2,
		'choices'     => [
			'on'  => esc_html__( 'Enable',  'job-listing' ),
			'off' => esc_html__( 'Disable',  'job-listing' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Section Heading ',  'job-listing' ),
		'type'     => 'text',
		'settings' => 'job_listing_categories_section_heading',
		'section'  => 'job_listing_testimonial_section',
    ] );


    for ($i=1; $i <=10 ; $i++) {
    	Kirki::add_field( 'theme_config_id', [
			'type'     => 'dashicons',
			'settings' => 'job_listing_top_categories_icon' .$i,
			'label'    => esc_html__( 'Select Appropriate Categories Icon ', 'job-listing' ) .$i,
			'section'  => 'job_listing_testimonial_section',
			'default'  => 'dashicons dashicons-admin-users',
			'priority' => 10,
		] );

		Kirki::add_field( 'theme_config_id', [
			'label'    => esc_html__( 'Numbers Of Jobs ',  'job-listing' ).$i,
			'type'     => 'text',
			'settings' => 'job_listing_categories_number_of_jobs'.$i,
			'section'  => 'job_listing_testimonial_section',
	    ] );
    }

	// FOOTER SECTION

	Kirki::add_section( 'job_listing_footer_section', array(
        'title'          => esc_html__( 'Footer Settings', 'job-listing' ),
        'description'    => esc_html__( 'Here you can change copyright text', 'job-listing' ),
        'panel'          => 'job_listing_panel_id',
        'priority'       => 160,
    ) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'job_listing_footer_enable_heading',
		'section'     => 'job_listing_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Footer Link', 'job-listing' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'job_listing_copyright_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'job-listing' ),
		'section'     => 'job_listing_footer_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'job-listing' ),
			'off' => esc_html__( 'Disable', 'job-listing' ),
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'job_listing_footer_text_heading',
		'section'     => 'job_listing_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Text', 'job-listing' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'job_listing_footer_text',
		'section'  => 'job_listing_footer_section',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
	'type'        => 'custom',
	'settings'    => 'job_listing_footer_text_heading_2',
	'section'     => 'job_listing_footer_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Alignment', 'job-listing' ) . '</h3>',
	'priority'    => 10,
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'job_listing_copyright_text_alignment',
		'label'       => esc_html__( 'Copyright text Alignment', 'job-listing' ),
		'section'     => 'job_listing_footer_section',
		'default'     => 'LEFT-ALIGN',
		'placeholder' => esc_html__( 'Choose an option', 'job-listing' ),
		'choices'     => [
			'LEFT-ALIGN' => esc_html__( 'LEFT-ALIGN', 'job-listing' ),
			'CENTER-ALIGN' => esc_html__( 'CENTER-ALIGN', 'job-listing' ),
			'RIGHT-ALIGN' => esc_html__( 'RIGHT-ALIGN', 'job-listing' ),

		],
	] );

	Kirki::add_field( 'theme_config_id', [
	'type'        => 'custom',
	'settings'    => 'job_listing_footer_text_heading_1',
	'section'     => 'job_listing_footer_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Background Color', 'job-listing' ) . '</h3>',
	'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'job_listing_copyright_bg',
		'label'       => __( 'Choose Your Copyright Background Color', 'job-listing' ),
		'section'     => 'job_listing_footer_section',
		'default'     => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'job_listing_enable_footer_socail_link',
		'section'     => 'job_listing_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Social Media Link', 'job-listing' ) . '</h3>',
		'priority'    => 11,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'repeater',
		'section'     => 'job_listing_footer_section',
		'priority'    => 11,
		'row_label' => [
			'type'  => 'field',
			'value' => esc_html__( 'Footer Social Icon', 'job-listing' ),
			'field' => 'link_text',
		],
		'button_label' => esc_html__('Add New Social Icon', 'job-listing' ),
		'settings'     => 'job_listing_footer_social_links_settings',
		'default'      => '',
		'fields' 	   => [
			'link_text' => [
				'type'        => 'text',
				'label'       => esc_html__( 'Icon', 'job-listing' ),
				'description' => esc_html__( 'Add the fontawesome class ex: "fab fa-facebook-f".', 'job-listing' ),
				'default'     => '',
			],
			'link_url' => [
				'type'        => 'url',
				'label'       => esc_html__( 'Social Link', 'job-listing' ),
				'description' => esc_html__( 'Add the social icon url here.', 'job-listing' ),
				'default'     => '',
			],
		],
		'choices' => [
			'limit' => 5
		],
	] );
}