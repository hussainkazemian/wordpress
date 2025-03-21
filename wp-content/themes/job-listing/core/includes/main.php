<?php
/**
* Get started notice
*/
add_action( 'wp_ajax_job_listing_dismissed_notice_handler', 'job_listing_ajax_notice_handler' );

function job_listing_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}

function job_listing_deprecated_hook_admin_notice() {
    if ( ! get_option('dismissed-get_started', FALSE ) ) { ?>
        <?php
        require_once get_template_directory() .'/core/includes/demo-import.php';
        $current_screen = get_current_screen();
			if ($current_screen->id !== 'appearance_page_job-listing-guide-page') {
         $job_listing_comments_theme = wp_get_theme(); ?>
		<div class="demo-importer-loader">
            <div class="loader-setup-wizard">
                <h2><?php echo esc_html('Importing...','job-listing'); ?></h2>
            </div> 
        </div> 
        <div class="job-listing-notice-wrapper updated notice notice-get-started-class is-dismissible" data-notice="get_started">
		
		<div class="job-listing-notice">
			<div class="job-listing-notice-img">
				<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/admin-logo.png'); ?>" alt="<?php esc_attr_e('logo', 'job-listing'); ?>">
			</div>
			<div class="job-listing-notice-content">
				<div class="job-listing-notice-heading"><?php esc_html_e('Thanks for installing ','job-listing'); ?><?php echo esc_html( $job_listing_comments_theme ); ?> <?php esc_html_e('Theme','job-listing'); ?></div>
				<p><?php echo esc_html('Get started with the wordpress theme installation, Firstly install recommended plugins and then click on demo importer button.','job-listing'); ?></p>
				<div class="diplay-flex-btn">
					<a class="button button-primary" href="<?php echo esc_url(admin_url('themes.php?page=job-listing-guide-page')); ?>"><?php echo esc_html('More Option','job-listing'); ?></a>
					<?php if(isset($_GET['import-demo']) && $_GET['import-demo'] == true){ ?>
			    		<a class="button button-success" href="<?php echo esc_url(home_url()); ?>" target="_blank"><?php echo esc_html('Go to Homepage','job-listing'); ?></a> <span class="imp-success"><?php echo esc_html('Imported Successfully','job-listing'); ?></span>
			    	<?php } else { ?>
					<form id="demo-importer-form" action="<?php echo esc_url(home_url()); ?>/wp-admin/themes.php" method="POST">
			        	<input  type="submit" name="submit" value="<?php esc_attr_e('Demo Import','job-listing'); ?>" class="button button-primary">
			    	</form>
			    	<?php } ?>
				</div>
				
			</div>
		</div>
	</div>
    <?php }
	}
}
add_action( 'admin_notices', 'job_listing_deprecated_hook_admin_notice' );

add_action( 'admin_menu', 'job_listing_getting_started' );
function job_listing_getting_started() {
	add_theme_page( esc_html__('Get Started', 'job-listing'), esc_html__('Get Started', 'job-listing'), 'edit_theme_options', 'job-listing-guide-page', 'job_listing_test_guide');	
}

function job_listing_admin_enqueue_scripts() {
	wp_enqueue_style( 'job-listing-admin-style', esc_url( get_template_directory_uri() ).'/css/main.css' );
    wp_enqueue_script( 'job-listing-demo-script', get_template_directory_uri() . '/js/demo-script.js', array( 'jquery' ), '', true );
	wp_localize_script( 'job-listing-demo-script', 'job_listing_demo_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
}
add_action( 'admin_enqueue_scripts', 'job_listing_admin_enqueue_scripts' );


if ( ! defined( 'JOB_LISTING_DOCS_FREE' ) ) {
define('JOB_LISTING_DOCS_FREE',__('https://demo.misbahwp.com/docs/job-listing-free-docs/','job-listing'));
}
 if ( ! defined( 'JOB_LISTING_DOCS_PRO' ) ) {
define('JOB_LISTING_DOCS_PRO',__('https://demo.misbahwp.com/docs/job-listing-pro-docs/','job-listing'));
}
if ( ! defined( 'JOB_LISTING_BUY_NOW' ) ) {
define('JOB_LISTING_BUY_NOW',__('https://www.misbahwp.com/products/job-listing-wordpress-theme','job-listing'));
}
if ( ! defined( 'JOB_LISTING_SUPPORT_FREE' ) ) {
define('JOB_LISTING_SUPPORT_FREE',__('https://wordpress.org/support/theme/job-listing','job-listing'));
}
if ( ! defined( 'JOB_LISTING_REVIEW_FREE' ) ) {
define('JOB_LISTING_REVIEW_FREE',__('https://wordpress.org/support/theme/job-listing/reviews/#new-post','job-listing'));
}
if ( ! defined( 'JOB_LISTING_DEMO_PRO' ) ) {
define('JOB_LISTING_DEMO_PRO',__('https://demo.misbahwp.com/job-listing/','job-listing'));
}
if( ! defined( 'JOB_LISTING_THEME_BUNDLE' ) ) {
define('JOB_LISTING_THEME_BUNDLE',__('https://www.misbahwp.com/products/wordpress-bundle','job-listing'));
}

function job_listing_test_guide() { 
	$job_listing_theme = wp_get_theme();
	require_once get_template_directory() .'/core/includes/demo-import.php';
	?>
	<div class="wrap" id="main-page">
		<div id="lefty">
			<div id="admin_links">
				<a href="<?php echo esc_url( JOB_LISTING_DOCS_FREE ); ?>" target="_blank" class="blue-button-1"><?php esc_html_e( 'Documentation', 'job-listing' ) ?></a>
				<a href="<?php echo esc_url( admin_url('customize.php') ); ?>" id="customizer" target="_blank"><?php esc_html_e( 'Customize', 'job-listing' ); ?> </a>
				<a class="blue-button-1" href="<?php echo esc_url( JOB_LISTING_SUPPORT_FREE ); ?>" target="_blank" class="btn3"><?php esc_html_e( 'Support', 'job-listing' ) ?></a>
				<a class="blue-button-2" href="<?php echo esc_url( JOB_LISTING_REVIEW_FREE ); ?>" target="_blank" class="btn4"><?php esc_html_e( 'Review', 'job-listing' ) ?></a>
			</div>
			<div id="description">
				<h3><?php esc_html_e('Welcome! Thank you for choosing ','job-listing'); ?><?php echo esc_html( $job_listing_theme ); ?>  <span><?php esc_html_e('Version: ', 'job-listing'); ?><?php echo esc_html($job_listing_theme['Version']);?></span></h3>
				<div class="demo-import-box">
					<div class="demo-importer-loader">
			            <div class="loader-setup-wizard">
			                <h2><?php echo esc_html('Importing...','job-listing'); ?></h2>
			            </div> 
			        </div>
					<h4><?php echo esc_html('Import homepage demo in just one click.','job-listing'); ?></h4>
					<p><?php echo esc_html('Get started with the wordpress theme installation, Firstly install recommended plugins and then click on demo importer button.','job-listing'); ?></p>
					<?php if(isset($_GET['import-demo']) && $_GET['import-demo'] == true){ ?>
			    		<span class="imp-success"><?php echo esc_html('Imported Successfully','job-listing'); ?></span>  <a class="button button-success" href="<?php echo esc_url(home_url()); ?>" target="_blank"><?php echo esc_html('Go to Homepage','job-listing'); ?></a>
			    	<?php } else { ?>
					<form id="demo-importer-form" action="<?php echo esc_url(home_url()); ?>/wp-admin/themes.php?page=job-listing-guide-page" method="POST">
			        	<input  type="submit" name="submit" value="<?php esc_attr_e('Demo Import','job-listing'); ?>" class="button button-primary">
			    	</form>
			    	<?php } ?>
				</div>
				<img class="img_responsive" style="width: 100%;" src="<?php echo esc_url( $job_listing_theme->get_screenshot() ); ?>" />
				<div id="description-insidee">
					<?php
						$job_listing_theme = wp_get_theme();
						echo wp_kses_post( apply_filters( 'misbah_theme_description', esc_html( $job_listing_theme->get( 'Description' ) ) ) );
					?>
				</div>
			</div>
		</div>

		<div id="righty">
			<div class="volleyball-postboxx">
				<h3 class="hndle"><?php esc_html_e( 'Upgrade to Premium', 'job-listing' ); ?></h3>
				<div class="volleyball-insidee">
					<p><?php esc_html_e('Discover upgraded pro features with premium version click to upgrade.','job-listing'); ?></p>
					<div id="admin_pro_links">
						<a class="blue-button-2" href="<?php echo esc_url( JOB_LISTING_BUY_NOW ); ?>" target="_blank"><?php esc_html_e( 'Go Pro', 'job-listing' ); ?></a>
						<a class="blue-button-1" href="<?php echo esc_url( JOB_LISTING_DEMO_PRO ); ?>" target="_blank"><?php esc_html_e( 'Live Demo', 'job-listing' ) ?></a>
						<a class="blue-button-2" href="<?php echo esc_url( JOB_LISTING_DOCS_PRO ); ?>" target="_blank"><?php esc_html_e( 'Pro Docs', 'job-listing' ) ?></a>
					</div>
				</div>

				<h3 class="hndle bundle"><?php esc_html_e( 'Go For Theme Bundle', 'job-listing' ); ?></h3>
				<div class="insidee theme-bundle">
					<p class="offer"><?php esc_html_e('Get 80+ Perfect WordPress Theme In A Single Package at just $89."','job-listing'); ?></p>
					<p class="coupon"><?php esc_html_e('Get Our Theme Pack of 80+ WordPress Themes At 15% Off','job-listing'); ?><span class="coupon-code"><?php esc_html_e('"Bundleup15"','job-listing'); ?></span></p>
					<div id="admin_pro_linkss">
						<a class="blue-button-1" href="<?php echo esc_url( JOB_LISTING_THEME_BUNDLE ); ?>" target="_blank"><?php esc_html_e( 'Theme Bundle', 'job-listing' ) ?></a>
					</div>
				</div>
				<div class="d-table">
			    <ul class="d-column">
			      <li class="feature"><?php esc_html_e('Features','job-listing'); ?></li>
			      <li class="free"><?php esc_html_e('Pro','job-listing'); ?></li>
			      <li class="plus"><?php esc_html_e('Free','job-listing'); ?></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('24hrs Priority Support','job-listing'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('LearnPress Campatiblity','job-listing'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Kirki Framework','job-listing'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Posttype','job-listing'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('One Click Demo Import','job-listing'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Section Reordering','job-listing'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Enable / Disable Option','job-listing'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Multiple Sections','job-listing'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Color Pallete','job-listing'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Widgets','job-listing'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Page Templates','job-listing'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Typography','job-listing'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Section Background Image / Color ','job-listing'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
	  		</div>
			</div>
		</div>
	</div>
<?php } ?>
