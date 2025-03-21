<?php
if (isset($_GET['import-demo']) && $_GET['import-demo'] == true) {
    class JobListingDemoImporter {

        public function job_listing_customizer_primary_menu() {
            // Create Primary Menu
            $job_listing_themename = 'Job Listing'; // Define the theme name
            $job_listing_menuname = $job_listing_themename . 'Main Menus';
            $job_listing_bpmenulocation = 'main-menu';
            $job_listing_menu_exists = wp_get_nav_menu_object($job_listing_menuname);

            if (!$job_listing_menu_exists) {
                $job_listing_menu_id = wp_create_nav_menu($job_listing_menuname);

                wp_update_nav_menu_item($job_listing_menu_id, 0, array(
                    'menu-item-title' => __('Home', 'job-listing'),
                    'menu-item-classes' => 'home',
                    'menu-item-url' => home_url('/'),
                    'menu-item-status' => 'publish',
                ));

            wp_update_nav_menu_item($job_listing_menu_id, 0, array(
                'menu-item-title' =>  __('All jobs','job-listing'),
                'menu-item-classes' => 'jobs',
                'menu-item-url' => get_permalink(job_listing_get_page_id_by_title('jobs')), 
                'menu-item-status' => 'publish'));

            wp_update_nav_menu_item($job_listing_menu_id, 0, array(
                'menu-item-title' =>  __('Pages','job-listing'),
                'menu-item-classes' => 'pages',
                'menu-item-url' => get_permalink(job_listing_get_page_id_by_title('pages')), 
                'menu-item-status' => 'publish'));

            wp_update_nav_menu_item($job_listing_menu_id, 0, array(
                'menu-item-title' =>  __('Pricing Plans','job-listing'),
                'menu-item-classes' => 'pricing',
                'menu-item-url' => get_permalink(job_listing_get_page_id_by_title('pricing')), 
                'menu-item-status' => 'publish'));

            wp_update_nav_menu_item($job_listing_menu_id, 0, array(
                'menu-item-title' =>  __('Blog','job-listing'),
                'menu-item-classes' => 'blogs',
                'menu-item-url' => get_permalink(job_listing_get_page_id_by_title('blogs')), 
                'menu-item-status' => 'publish'));

            wp_update_nav_menu_item($job_listing_menu_id, 0, array(
                'menu-item-title' =>  __('Contact','job-listing'),
                'menu-item-classes' => 'contact',
                'menu-item-url' => get_permalink(job_listing_get_page_id_by_title('contact')), 
                'menu-item-status' => 'publish'));

                if (!has_nav_menu($job_listing_bpmenulocation)) {
                    $locations = get_theme_mod('nav_menu_locations');
                    $locations[$job_listing_bpmenulocation] = $job_listing_menu_id;
                    set_theme_mod('nav_menu_locations', $locations);
                }
            }
        }

        public function setup_widgets() {

        $job_listing_home_id='';
        $job_listing_home_content = '';
        $job_listing_home_title = 'Home';
        $job_listing_home = array(
            'post_type' => 'page',
            'post_title' => $job_listing_home_title,
            'post_content' => $job_listing_home_content,
            'post_status' => 'publish',
            'post_author' => 1,
            'post_slug' => 'home'
        );
        $job_listing_home_id = wp_insert_post($job_listing_home);

        add_post_meta( $job_listing_home_id, '_wp_page_template', 'frontpage.php' );

        update_option( 'page_on_front', $job_listing_home_id );
        update_option( 'show_on_front', 'page' );

                        // Create a Posts Page
            $job_listing_blog_title = 'All jobs';
            $job_listing_blog_check = job_listing_get_page_id_by_title($job_listing_blog_title);

            if ($job_listing_blog_check == 1) {
                $job_listing_blog = array(
                    'post_type' => 'page',
                    'post_title' => $job_listing_blog_title,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_name' => 'jobs',
                    'post_content' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."',
                );
                $job_listing_blog_id = wp_insert_post($job_listing_blog);

                if (!is_wp_error($job_listing_blog_id)) {
                    // update_option('page_for_posts', $job_listing_blog_id);
                }
            }

                        // Create a Posts Page
            $job_listing_blog_title = 'Pages';
            $job_listing_blog_check = job_listing_get_page_id_by_title($job_listing_blog_title);

            if ($job_listing_blog_check  == 1) {
                $job_listing_blog = array(
                    'post_type' => 'page',
                    'post_title' => $job_listing_blog_title,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_name' => 'pages',
                    'post_content' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."',
                );
                $job_listing_blog_id = wp_insert_post($job_listing_blog);

                if (!is_wp_error($job_listing_blog_id)) {
                    // update_option('page_for_posts', $job_listing_blog_id);
                }
            }

                         // Create a Posts Page
            $job_listing_blog_title = 'Pricing Plans';
            $job_listing_blog_check = job_listing_get_page_id_by_title($job_listing_blog_title);

            if ($job_listing_blog_check  == 1) {
                $job_listing_blog = array(
                    'post_type' => 'page',
                    'post_title' => $job_listing_blog_title,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_name' => 'pricing',
                    'post_content' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."',
                );
                $job_listing_blog_id = wp_insert_post($job_listing_blog);

                if (!is_wp_error($job_listing_blog_id)) {
                    // update_option('page_for_posts', $job_listing_blog_id);
                }
            }

             // Create a Posts Page
            $job_listing_blog_title = 'Blogs';
            $job_listing_blog_check = job_listing_get_page_id_by_title($job_listing_blog_title);

            if ($job_listing_blog_check  == 1) {
                $job_listing_blog = array(
                    'post_type' => 'page',
                    'post_title' => $job_listing_blog_title,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_name' => 'blogs',
                    'post_content' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."',
                );
                $job_listing_blog_id = wp_insert_post($job_listing_blog);

                if (!is_wp_error($job_listing_blog_id)) {
                    // update_option('page_for_posts', $job_listing_blog_id);
                }
            }

                         // Create a Posts Page
            $job_listing_blog_title = 'Contact';
            $job_listing_blog_check = job_listing_get_page_id_by_title($job_listing_blog_title);

            if ($job_listing_blog_check  == 1) {
                $job_listing_blog = array(
                    'post_type' => 'page',
                    'post_title' => $job_listing_blog_title,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_name' => 'contact',
                    'post_content' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."',
                );
                $job_listing_blog_id = wp_insert_post($job_listing_blog);

                if (!is_wp_error($job_listing_blog_id)) {
                    // update_option('page_for_posts', $job_listing_blog_id);
                }
            }

		//-----Header -----//

		set_theme_mod( 'job_listing_wislist_url', '# ' );

        set_theme_mod( 'job_listing_header_newsletter_button_text', 'Post Your Ad' );
        set_theme_mod( 'job_listing_header_newsletter_button_url', '#' );

		

		//-----Slider-----//

		set_theme_mod( 'job_listing_blog_box_enable', true);

		set_theme_mod( 'job_listing_blog_slide_number', '3' );
		$job_listing_latest_post_category = wp_create_category('Slider Post');
		set_theme_mod( 'job_listing_blog_slide_category', 'Slider Post' ); 

		for($i=1; $i<=3; $i++) {

			$title =   'Find Your Perfect Dream Jobs With Us';
			$content = 'Posting an ad is free and easy – it only takes a few simple steps! Select the right category and publish your classified ad for free.';

			// Create post object
			$job_listing_my_post = array(
				'post_title'    => wp_strip_all_tags( $title ),
				'post_content'  => $content,
				'post_status'   => 'publish',
				'post_type'     => 'post',
				'post_category' => array($job_listing_latest_post_category) 
			);

			// Insert the post into the database
			$job_listing_post_id = wp_insert_post( $job_listing_my_post );

			$job_listing_image_url = get_template_directory_uri().'/assets/images/slider.png';

			$job_listing_image_name= 'slider.png';
			$job_listing_upload_dir       = wp_upload_dir(); 
			// Set upload folder
			$job_listing_image_data       = file_get_contents($job_listing_image_url); 
			 
			// Get image data
			$job_listing_unique_file_name = wp_unique_filename( $job_listing_upload_dir['path'], $job_listing_image_name ); 
			// Generate unique name
			$filename= basename( $job_listing_unique_file_name ); 
			// Create image file name
			// Check folder permission and define file location
			if( wp_mkdir_p( $job_listing_upload_dir['path'] ) ) {
				$file = $job_listing_upload_dir['path'] . '/' . $filename;
			} else {
				$file = $job_listing_upload_dir['basedir'] . '/' . $filename;
			}

						if ( ! function_exists( 'WP_Filesystem' ) ) {
                    require_once( ABSPATH . 'wp-admin/includes/file.php' );
                }
                
                WP_Filesystem();
                global $wp_filesystem;
                
                if ( ! $wp_filesystem->put_contents( $file, $job_listing_image_data, FS_CHMOD_FILE ) ) {
                    wp_die( 'Error saving file!' );
                }

			$job_listing_wp_filetype = wp_check_filetype( $filename, null );
			$job_listing_attachment = array(
				'post_mime_type' => $job_listing_wp_filetype['type'],
				'post_title'     => sanitize_file_name( $filename ),
				'post_content'   => '',
				'post_type'     => 'post',
				'post_status'    => 'inherit'
			);
			$job_listing_attach_id = wp_insert_attachment( $job_listing_attachment, $file, $job_listing_post_id );
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$job_listing_attach_data = wp_generate_attachment_metadata( $job_listing_attach_id, $file );
				wp_update_attachment_metadata( $job_listing_attach_id, $job_listing_attach_data );
				set_post_thumbnail( $job_listing_post_id, $job_listing_attach_id );
		}

		//-----Categories-----//
		set_theme_mod( 'job_listing_testimonial_section_enable', true);

		set_theme_mod( 'job_listing_categories_section_heading', 'Browse From Top Categories');

		$post_title =   array('Accounting','Developer','Technology', 'Construction','HR','communication');

        $post_icon =   array('fas fa-file-invoice','fas fa-laptop-code', 'fas fa-microchip','fas fa-hard-hat','fas fa-user','fas fa-headset');

        $cat_title =   array('Accounting','Developer','Technology', 'Construction','HR','communication');


        for($i=1; $i<=6; $i++) {

            set_theme_mod( 'job_listing_categories_section_heading'.$i, $post_icon[$i-1]);

            $title =   $post_title[$i-1];
            $content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ';

            // Create post object
            $job_listing_my_post = array(
                'post_title'    => wp_strip_all_tags( $title ),
                'post_content'  => $content,
                'post_status'   => 'publish',
                'post_type'     => 'post',
                'post_category' => array($job_listing_categories_post_category) 
            );

            // Insert the post into the database
            $job_listing_post_id = wp_insert_post( $job_listing_my_post );

            wp_set_object_terms( $job_listing_post_id, $cat_title[$i-1], 'category');

        }

        // Appoinment form shortcode
          $cf7title = "Appoinment";
          $cf7content = '[email EnterAddress placeholder "Enter Address"][tel PhoneNumber placeholder "Enter Phone Number"][text EnterTextHere placeholder "Enter Text"][submit "Search"]

          --
          This e-mail was sent from a contact form on [_site_title] ([_site_url])
          [_site_admin_email]
          Reply-To: [your-email]

          0
          0

          [_site_title] "[your-subject]"
          [_site_title] <expamle@gmail.com>
          Message Body:
          [your-message]

          --
          This e-mail was sent from a contact form on [_site_title] ([_site_url])
          [your-email]
          Reply-To: [_site_admin_email]

          0
          0
          Thank you for your message. It has been sent.
          There was an error trying to send your message. Please try again later.
          One or more fields have an error. Please check and try again.
          There was an error trying to send your message. Please try again later.
          You must accept the terms and conditions before sending your message.
          The field is required.
          The field is too long.
          The field is too short.
          There was an unknown error uploading the file.
          You are not allowed to upload files of this type.
          The file is too big.
          There was an error uploading the file.';

          $cf7_post = array(
            'post_title'    => wp_strip_all_tags( $cf7title ),
            'post_content'  => $cf7content,
            'post_status'   => 'publish',
            'post_type'     => 'wpcf7_contact_form',
          );
          // Insert the post into the database
          $cf7post_id = wp_insert_post( $cf7_post );

          add_post_meta(
            $cf7post_id,
            "_form",
            '[email EnterAddress placeholder "Enter Address"][tel PhoneNumber placeholder "Enter Phone Number"][text EnterTextHere placeholder "Enter Text"][submit "Search"]'
          );

          $cf7mail_data  = array(
            'subject' => '[_site_title] "[your-subject]"',
            'sender'  => '[_site_title] <exapmle@gmail.com>',
            'body'    => 'From: [your-name] <[your-email]>
            Subject: [your-subject]

            Message Body:
            [your-message]

            --
            This e-mail was sent from a contact form on [_site_title] ([_site_url])',
            'recipient'           => '[_site_admin_email]',
            'additional_headers'  => 'Reply-To: [your-email]',
            'attachments'         => '',
            'use_html'            => 0,
            'exclude_blank'       => 0
          );

          add_post_meta($cf7post_id, "_mail", $cf7mail_data);

          // Gets term object from Tree in the database.

          $cf7shortcode = '[contact-form-7 id="'.$cf7post_id.'" title="'.$cf7title.'"]';

          set_theme_mod( 'job_listing_contact_form_shortcode',$cf7shortcode );
	
	    }
    }
	// Instantiate the class and call its methods
    $demo_importer = new JobListingDemoImporter();
    $demo_importer->setup_widgets();
    $demo_importer->job_listing_customizer_primary_menu();
	}
?>