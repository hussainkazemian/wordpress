<?php


$job_listing_custom_css = '';

	/*---------------------------text-transform-------------------*/

	$job_listing_text_transform = get_theme_mod( 'menu_text_transform_job_listing','CAPITALISE');
    if($job_listing_text_transform == 'CAPITALISE'){

		$job_listing_custom_css .='#main-menu ul li a{';

			$job_listing_custom_css .='text-transform: capitalize;';

		$job_listing_custom_css .='}';

	}else if($job_listing_text_transform == 'UPPERCASE'){

		$job_listing_custom_css .='#main-menu ul li a{';

			$job_listing_custom_css .='text-transform: uppercase;';

		$job_listing_custom_css .='}';

	}else if($job_listing_text_transform == 'LOWERCASE'){

		$job_listing_custom_css .='#main-menu ul li a{';

			$job_listing_custom_css .='text-transform: lowercase;';

		$job_listing_custom_css .='}';
	}

		/*---------------------------menu-zoom-------------------*/

		$job_listing_menu_zoom = get_theme_mod( 'job_listing_menu_zoom','None');

    if($job_listing_menu_zoom == 'Zoomout'){

		$job_listing_custom_css .='#main-menu ul li a{';

			$job_listing_custom_css .='';

		$job_listing_custom_css .='}';

	}else if($job_listing_menu_zoom == 'Zoominn'){

		$job_listing_custom_css .='#main-menu ul li a:hover{';

			$job_listing_custom_css .='transition: all 0.3s ease-in-out !important; transform: scale(1.2) !important; color: #0859F7;';

		$job_listing_custom_css .='}';
	}

	/*---------------------------Container Width-------------------*/

$job_listing_container_width = get_theme_mod('job_listing_container_width');

		$job_listing_custom_css .='body{';

			$job_listing_custom_css .='width: '.esc_attr($job_listing_container_width).'%; margin: auto';

		$job_listing_custom_css .='}';

		/*---------------------------Copyright Text alignment-------------------*/

	$job_listing_copyright_text_alignment = get_theme_mod( 'job_listing_copyright_text_alignment','LEFT-ALIGN');

	if($job_listing_copyright_text_alignment == 'LEFT-ALIGN'){

		$job_listing_custom_css .='.copy-text p{';

			$job_listing_custom_css .='text-align:left;';

		$job_listing_custom_css .='}';


	}else if($job_listing_copyright_text_alignment == 'CENTER-ALIGN'){

		$job_listing_custom_css .='.copy-text p{';

			$job_listing_custom_css .='text-align:center;';

		$job_listing_custom_css .='}';


	}else if($job_listing_copyright_text_alignment == 'RIGHT-ALIGN'){

		$job_listing_custom_css .='.copy-text p{';

			$job_listing_custom_css .='text-align:right;';

		$job_listing_custom_css .='}';

	}

	/*---------------------------related Product Settings-------------------*/

$job_listing_related_product_setting = get_theme_mod('job_listing_related_product_setting',true);

	if($job_listing_related_product_setting == false){

		$job_listing_custom_css .='.related.products, .related h2{';

			$job_listing_custom_css .='display: none;';

		$job_listing_custom_css .='}';
	}

		/*---------------------------Scroll to Top Alignment Settings-------------------*/

		$job_listing_scroll_top_position = get_theme_mod( 'job_listing_scroll_top_position','Right');

		if($job_listing_scroll_top_position == 'Right'){
	
			$job_listing_custom_css .='.scroll-up{';
	
				$job_listing_custom_css .='right: 20px;';
	
			$job_listing_custom_css .='}';
	
		}else if($job_listing_scroll_top_position == 'Left'){
	
			$job_listing_custom_css .='.scroll-up{';
	
				$job_listing_custom_css .='left: 20px;';
	
			$job_listing_custom_css .='}';
	
		}else if($job_listing_scroll_top_position == 'Center'){
	
			$job_listing_custom_css .='.scroll-up{';
	
				$job_listing_custom_css .='right: 50%;left: 50%;';
	
			$job_listing_custom_css .='}';
		}
	
			/*---------------------------Pagination Settings-------------------*/
	
	
	$job_listing_pagination_setting = get_theme_mod('job_listing_pagination_setting',true);
	
		if($job_listing_pagination_setting == false){
	
			$job_listing_custom_css .='.nav-links{';
	
				$job_listing_custom_css .='display: none;';
	
			$job_listing_custom_css .='}';
		}

	/*---------------------------woocommerce pagination alignment settings-------------------*/

	$job_listing_woocommerce_pagination_position = get_theme_mod( 'job_listing_woocommerce_pagination_position','Center');

	if($job_listing_woocommerce_pagination_position == 'Left'){

		$job_listing_custom_css .='.woocommerce nav.woocommerce-pagination{';

			$job_listing_custom_css .='text-align: left;';

		$job_listing_custom_css .='}';

	}else if($job_listing_woocommerce_pagination_position == 'Center'){

		$job_listing_custom_css .='.woocommerce nav.woocommerce-pagination{';

			$job_listing_custom_css .='text-align: center;';

		$job_listing_custom_css .='}';

	}else if($job_listing_woocommerce_pagination_position == 'Right'){

		$job_listing_custom_css .='.woocommerce nav.woocommerce-pagination{';

			$job_listing_custom_css .='text-align: right;';

		$job_listing_custom_css .='}';
	}