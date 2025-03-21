<?php

class Job_Listing_Customizer_Notify {

	private $config = array(); // Declare $config property
	
	private $job_listing_recommended_actions;
	
	private $recommended_plugins;
	
	private static $instance;
	
	private $job_listing_recommended_actions_title;
	
	private $job_listing_recommended_plugins_title;
	
	private $dismiss_button;
	
	private $job_listing_install_button_label;
	
	private $job_listing_activate_button_label;
	
	private $job_listing_deactivate_button_label;

	
	public static function init( $config ) {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Job_Listing_Customizer_Notify ) ) {
			self::$instance = new Job_Listing_Customizer_Notify;
			if ( ! empty( $config ) && is_array( $config ) ) {
				self::$instance->config = $config;
				self::$instance->setup_config();
				self::$instance->setup_actions();
			}
		}

	}

	
	public function setup_config() {

		global $job_listing_customizer_notify_recommended_plugins;
		global $job_listing_customizer_notify_job_listing_recommended_actions;

		global $job_listing_install_button_label;
		global $job_listing_activate_button_label;
		global $job_listing_deactivate_button_label;

		$this->job_listing_recommended_actions = isset( $this->config['job_listing_recommended_actions'] ) ? $this->config['job_listing_recommended_actions'] : array();
		$this->recommended_plugins = isset( $this->config['recommended_plugins'] ) ? $this->config['recommended_plugins'] : array();

		$this->job_listing_recommended_actions_title = isset( $this->config['job_listing_recommended_actions_title'] ) ? $this->config['job_listing_recommended_actions_title'] : '';
		$this->job_listing_recommended_plugins_title = isset( $this->config['job_listing_recommended_plugins_title'] ) ? $this->config['job_listing_recommended_plugins_title'] : '';
		$this->dismiss_button            = isset( $this->config['dismiss_button'] ) ? $this->config['dismiss_button'] : '';

		$job_listing_customizer_notify_recommended_plugins = array();
		$job_listing_customizer_notify_job_listing_recommended_actions = array();

		if ( isset( $this->recommended_plugins ) ) {
			$job_listing_customizer_notify_recommended_plugins = $this->recommended_plugins;
		}

		if ( isset( $this->job_listing_recommended_actions ) ) {
			$job_listing_customizer_notify_job_listing_recommended_actions = $this->job_listing_recommended_actions;
		}

		$job_listing_install_button_label    = isset( $this->config['job_listing_install_button_label'] ) ? $this->config['job_listing_install_button_label'] : '';
		$job_listing_activate_button_label   = isset( $this->config['job_listing_activate_button_label'] ) ? $this->config['job_listing_activate_button_label'] : '';
		$job_listing_deactivate_button_label = isset( $this->config['job_listing_deactivate_button_label'] ) ? $this->config['job_listing_deactivate_button_label'] : '';

	}

	
	public function setup_actions() {

		// Register the section
		add_action( 'customize_register', array( $this, 'job_listing_plugin_notification_customize_register' ) );

		// Enqueue scripts and styles
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'job_listing_customizer_notify_scripts_for_customizer' ), 0 );

		/* ajax callback for dismissable recommended actions */
		add_action( 'wp_ajax_quality_customizer_notify_dismiss_action', array( $this, 'job_listing_customizer_notify_dismiss_recommended_action_callback' ) );

		add_action( 'wp_ajax_ti_customizer_notify_dismiss_recommended_plugins', array( $this, 'job_listing_customizer_notify_dismiss_recommended_plugins_callback' ) );

	}

	
	public function job_listing_customizer_notify_scripts_for_customizer() {

		wp_enqueue_style( 'job-listing-customizer-notify-css', get_template_directory_uri() . '/core/includes/customizer-notice/css/job-listing-customizer-notify.css', array());

		wp_enqueue_style( 'plugin-install' );
		wp_enqueue_script( 'plugin-install' );
		wp_add_inline_script( 'plugin-install', 'var pagenow = "customizer";' );

		wp_enqueue_script( 'updates' );

		wp_enqueue_script( 'job-listing-customizer-notify-js', get_template_directory_uri() . '/core/includes/customizer-notice/js/job-listing-customizer-notify.js', array( 'customize-controls' ));
		wp_localize_script(
			'job-listing-customizer-notify-js', 'joblistingCustomizercompanionObject', array(
				'ajaxurl'            => admin_url( 'admin-ajax.php' ),
				'template_directory' => get_template_directory_uri(),
				'base_path'          => admin_url(),
				'activating_string'  => __( 'Activating', 'job-listing' ),
			)
		);

	}

	
	public function job_listing_plugin_notification_customize_register( $wp_customize ) {

		
		require_once get_template_directory() . '/core/includes/customizer-notice/job-listing-customizer-notify-section.php';

		$wp_customize->register_section_type( 'Job_Listing_Customizer_Notify_Section' );

		$wp_customize->add_section(
			new Job_Listing_Customizer_Notify_Section(
				$wp_customize,
				'job-listing-customizer-notify-section',
				array(
					'title'          => $this->job_listing_recommended_actions_title,
					'plugin_text'    => $this->job_listing_recommended_plugins_title,
					'dismiss_button' => $this->dismiss_button,
					'priority'       => 0,
				)
			)
		);

	}

	
	public function job_listing_customizer_notify_dismiss_recommended_action_callback() {

		global $job_listing_customizer_notify_job_listing_recommended_actions;

		$action_id = ( isset( $_GET['id'] ) ) ? $_GET['id'] : 0;

		echo esc_html( $action_id ); /* this is needed and it's the id of the dismissable required action */ 

		if ( ! empty( $action_id ) ) {
			
			if ( get_option( 'job_listing_customizer_notify_show' ) ) {

				$job_listing_customizer_notify_show_job_listing_recommended_actions = get_option( 'job_listing_customizer_notify_show' );
				switch ( $_GET['todo'] ) {
					case 'add':
						$job_listing_customizer_notify_show_job_listing_recommended_actions[ $action_id ] = true;
						break;
					case 'dismiss':
						$job_listing_customizer_notify_show_job_listing_recommended_actions[ $action_id ] = false;
						break;
				}
				update_option( 'job_listing_customizer_notify_show', $job_listing_customizer_notify_show_job_listing_recommended_actions );

				
			} else {
				$job_listing_customizer_notify_show_job_listing_recommended_actions = array();
				if ( ! empty( $job_listing_customizer_notify_job_listing_recommended_actions ) ) {
					foreach ( $job_listing_customizer_notify_job_listing_recommended_actions as $job_listing_lite_customizer_notify_recommended_action ) {
						if ( $job_listing_lite_customizer_notify_recommended_action['id'] == $action_id ) {
							$job_listing_customizer_notify_show_job_listing_recommended_actions[ $job_listing_lite_customizer_notify_recommended_action['id'] ] = false;
						} else {
							$job_listing_customizer_notify_show_job_listing_recommended_actions[ $job_listing_lite_customizer_notify_recommended_action['id'] ] = true;
						}
					}
					update_option( 'job_listing_customizer_notify_show', $job_listing_customizer_notify_show_job_listing_recommended_actions );
				}
			}
		}
		die(); 
	}

	
	public function job_listing_customizer_notify_dismiss_recommended_plugins_callback() {

		$action_id = ( isset( $_GET['id'] ) ) ? $_GET['id'] : 0;

		echo esc_html( $action_id ); /* this is needed and it's the id of the dismissable required action */

		if ( ! empty( $action_id ) ) {

			$job_listing_lite_customizer_notify_show_recommended_plugins = get_option( 'job_listing_customizer_notify_show_recommended_plugins' );

			switch ( $_GET['todo'] ) {
				case 'add':
					$job_listing_lite_customizer_notify_show_recommended_plugins[ $action_id ] = false;
					break;
				case 'dismiss':
					$job_listing_lite_customizer_notify_show_recommended_plugins[ $action_id ] = true;
					break;
			}
			update_option( 'job_listing_customizer_notify_show_recommended_plugins', $job_listing_lite_customizer_notify_show_recommended_plugins );
		}
		die(); 
	}

}
