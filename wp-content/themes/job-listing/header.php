<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta http-equiv="Content-Type" content="<?php echo esc_attr(get_bloginfo('html_type')); ?>; charset=<?php echo esc_attr(get_bloginfo('charset')); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php
	if ( function_exists( 'wp_body_open' ) )
	{
		wp_body_open();
	}else{
		do_action('wp_body_open');
	}
?>

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'job-listing' ); ?></a>

<?php if ( get_theme_mod('job_listing_site_loader', false) == true ) : ?>
	<div class="cssloader">
    	<div class="sh1"></div>
    	<div class="sh2"></div>
    	<h1 class="lt"><?php esc_html_e( 'loading',  'job-listing' ); ?></h1>
    </div>
<?php endif; ?>

<div class="<?php if( get_theme_mod( 'job_listing_sticky_header', false) != '') { ?>sticky-header<?php } else { ?>close-sticky main-menus<?php } ?>">
	<header id="site-navigation">
		<div class="header-outter py-2">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-3 col-sm-12  align-self-center">
						<div class="logo text-start">
				    		<div class="logo-image">
				    			<?php the_custom_logo(); ?>
					    	</div>
					    	<div class="logo-content">
						    	<?php
						    		if ( get_theme_mod('job_listing_display_header_title', true) == true ) :
							      		echo '<a href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name')) . '">';
							      			echo esc_html(get_bloginfo('name'));
							      		echo '</a>';
							      	endif;

							      	if ( get_theme_mod('job_listing_display_header_text', false) == true ) :
						      			echo '<span>'. esc_html(get_bloginfo('description')) . '</span>';
						      		endif;
					    		?>
							</div>
						</div>
					</div>					
					<div class="col-lg-7 col-md-5 col-sm-12">
						<div class="menu-box">
							<button class="menu-toggle toggle-menu my-2 py-2 px-3" aria-controls="top-menu" aria-expanded="false" type="button">
								<span aria-hidden="true"><?php esc_html_e( 'Menu', 'job-listing' ); ?></span>
							</button>
							<nav id="main-menu" class="close-panal main-menu">
								<?php
									wp_nav_menu( array(
										'theme_location' => 'main-menu',
										'container' => 'false'
									));
								?>
								<button class="close-menu close-menu my-2 p-2" type="button">
									<span aria-hidden="true"><i class="fa fa-times"></i></span>
								</button>
							</nav>
						</div>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-12 align-self-center contact-box text-start d-flex justify-content-end align-item-center">
						<?php if ( get_theme_mod('job_listing_wislist_url')) : ?>
							<a href="<?php echo esc_url( get_theme_mod('job_listing_wislist_url' ) ); ?>" class="myacunt-url"><i class="fas fa-heart"></i></a>
						<?php endif; ?>
						<?php if(class_exists('woocommerce')){ ?>
				          	<?php if ( is_user_logged_in() ) { ?>
				            	<a class="account-box" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>"><i class="fas fa-sign-in-alt me-2"></i></a>
				          	<?php }
				          	else { ?>
				            	<a class="account-box" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('Login / Register','job-listing'); ?>"><i class="fas fa-user me-2"></i></a>
				          	<?php } ?>
        				<?php }?>
						<?php if ( get_theme_mod('job_listing_header_newsletter_button_text') || get_theme_mod('job_listing_header_newsletter_button_url') ) : ?>
							<p class="info-button mb-0 text-center text-md-start"><a href="<?php echo esc_url(get_theme_mod('job_listing_header_newsletter_button_url'));?>"><span class="dashicons dashicons-plus-alt2 me-2"></span><?php echo esc_html(get_theme_mod('job_listing_header_newsletter_button_text'));?></a></p>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</header>
</div>