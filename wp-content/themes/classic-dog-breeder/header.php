<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Classic Dog Breeder
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
  wp_body_open();
} else {
  do_action( 'wp_body_open' );
} ?>

<?php if ( get_theme_mod('classic_dog_breeder_preloader', false) != "") { ?>
  <div id="preloader">
    <div id="status">&nbsp;</div>
  </div>
<?php }?>

<a class="screen-reader-text skip-link" href="#content"><?php esc_html_e( 'Skip to content', 'classic-dog-breeder' ); ?></a>

<div id="pageholder" <?php if( get_theme_mod( 'classic_dog_breeder_box_layout', false) != "" ) { echo 'class="boxlayout"'; } ?>>

<div class="mainhead">
  <div class="main-header">
    <div class="container">
      <div class="row">
        <div class="col-xl-2 col-lg-2 col-md-2 col-12 align-self-center text-center">
          <div class="logo">
            <?php classic_dog_breeder_the_custom_logo(); ?>
            <div class="site-branding-text">
              <?php if (get_theme_mod('classic_dog_breeder_title_enable', true)) { ?>
                <?php if (is_front_page() && is_home()) : ?>
                  <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                <?php else : ?>
                  <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></p>
                <?php endif; ?>
              <?php } ?>
              <?php $classic_dog_breeder_description = get_bloginfo('description', 'display');
              if ($classic_dog_breeder_description || is_customize_preview()) : ?>
                <?php if (get_theme_mod('classic_dog_breeder_tagline_enable', false)) { ?>
                  <span class="site-description"><?php echo esc_html($classic_dog_breeder_description); ?></span>
                <?php } ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="col-xl-8 col-lg-8 col-md-8 col-6 menu-sec align-self-center">
          <div class="toggle-nav text-center">
            <?php if (has_nav_menu('primary')) { ?>
              <button role="tab"><?php esc_html_e('Menu', 'classic-dog-breeder'); ?></button>
            <?php } ?>
          </div>
          <div id="mySidenav" class="nav sidenav">
            <nav id="site-navigation" class="main-nav" role="navigation" aria-label="<?php esc_attr_e('Top Menu', 'classic-dog-breeder'); ?>">
              <ul class="mobile_nav">
                <?php wp_nav_menu(array(
                  'theme_location' => 'primary',
                  'container_class' => 'main-menu',
                  'items_wrap' => '%3$s',
                  'fallback_cb' => 'wp_page_menu',
                )); ?>
              </ul>
              <a href="javascript:void(0)" class="close-button"><?php esc_html_e('CLOSE', 'classic-dog-breeder'); ?></a>
            </nav>
          </div>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-2 col-6 align-self-center d-flex align-items-center justify-content-center gap-3">
          <?php if (class_exists('woocommerce')) { ?>
            <span class="product-account text-center">
              <?php if (is_user_logged_in()) { ?>
                <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>" title="<?php esc_attr_e('My Account', 'classic-dog-breeder'); ?>"><?php $classic_dog_breeder_current_user = wp_get_current_user(); echo get_avatar($classic_dog_breeder_current_user->ID); ?></a>
              <?php } else { ?>
                <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>" title="<?php esc_attr_e('Login / Register', 'classic-dog-breeder'); ?>"><?php $classic_dog_breeder_current_user = wp_get_current_user(); echo get_avatar($classic_dog_breeder_current_user->ID); ?></a>
              <?php } ?>
            </span>               
          <?php }?>
          <div class="toggle-btn">
            <a href="#" id="sidebar-pop"><i class="fa-solid fa-bars"></i></a>
          </div>
          <div class="header-sidebar px-3">
            <div class="close-pop"><a href="#maincontent"><i class="fa-solid fa-xmark"></i></a>
            </div>
            <div class="menu-drawer">
              <div class="logo">
                <?php classic_dog_breeder_the_custom_logo(); ?>
              </div>
              <?php if ( get_theme_mod('classic_dog_breeder_topbar_text_title')) { ?>
                <p class="top-text mb-0 py-3"><?php echo esc_html(get_theme_mod('classic_dog_breeder_topbar_text_title')); ?></p>
              <?php } ?>
              <div class="mail-box mb-3">
                <?php if ( get_theme_mod('classic_dog_breeder_email_address') || get_theme_mod('classic_dog_breeder_topbar_mail_title')) { ?>
                  <div class="row">
                    <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 align-self-center">
                      <i class="fa-solid fa-envelope me-2"></i>
                    </div>
                    <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 align-self-center">
                      <p class="phone-text mb-0 text-capitalize"><?php echo esc_html(get_theme_mod('classic_dog_breeder_topbar_mail_title')); ?></p>
                      <a class="mail" href="mailto:<?php echo esc_attr( get_theme_mod('classic_dog_breeder_email_address','') ); ?>"><?php echo esc_html(get_theme_mod ('classic_dog_breeder_email_address','')); ?></a>
                    </div>
                  </div>
                <?php } ?>
              </div>
              <div class="phone-box">
                <?php if ( get_theme_mod('classic_dog_breeder_phone_number') || get_theme_mod('classic_dog_breeder_topbar_phone_title')) { ?>
                  <div class="row">
                    <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 align-self-center">
                      <i class="fas fa-phone me-2"></i>
                    </div>
                    <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 align-self-center">
                      <p class="phone-text mb-0 text-capitalize"><?php echo esc_html(get_theme_mod('classic_dog_breeder_topbar_phone_title')); ?></p>
                      <a class="phone-no" href="tel:<?php echo esc_attr( get_theme_mod('classic_dog_breeder_phone_number','' )); ?>"><?php echo esc_html(get_theme_mod ('classic_dog_breeder_phone_number','')); ?></a>
                    </div>
                  </div>
                <?php } ?>
              </div>
              <div class="social-icons d-flex gap-2 mt-4">
                <?php if ( get_theme_mod('classic_dog_breeder_facebook_link') != "") { ?>
                  <a title="<?php echo esc_attr('facebook', 'classic-dog-breeder'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('classic_dog_breeder_facebook_link')); ?>"><i class="fa-brands fa-facebook-f"></i></a> 
                <?php } ?>
                <?php if ( get_theme_mod('classic_dog_breeder_twitter_link') != "") { ?> 
                  <a title="<?php echo esc_attr('twitter', 'classic-dog-breeder'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('classic_dog_breeder_twitter_link')); ?>"><i class="fa-brands fa-x-twitter"></i></a>
                <?php } ?>
                <?php if ( get_theme_mod('classic_dog_breeder_instagram_link') != "") { ?> 
                  <a title="<?php echo esc_attr('instagram', 'classic-dog-breeder'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('classic_dog_breeder_instagram_link')); ?>"><i class="fa-brands fa-instagram"></i></a>
                <?php } ?>
                <?php if ( get_theme_mod('classic_dog_breeder_youtube_link') != "") { ?>
                  <a title="<?php echo esc_attr('youtube', 'classic-dog-breeder'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('classic_dog_breeder_youtube_link')); ?>"><i class="fa-brands fa-youtube"></i></a>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>