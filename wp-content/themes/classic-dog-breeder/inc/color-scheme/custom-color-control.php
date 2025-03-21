<?php

$classic_dog_breeder_color_scheme_css = '';

$classic_dog_breeder_wave_color1 = get_theme_mod('classic_dog_breeder_wave_color1');
if($classic_dog_breeder_wave_color1 != false){
    $classic_dog_breeder_color_scheme_css .='.wave-img1 svg path, .banner-img .img-bg svg circle:nth-child(5), .banner-img .img-bg svg circle:nth-child(6){';
      $classic_dog_breeder_color_scheme_css .='fill: '.esc_html($classic_dog_breeder_wave_color1).';';
    $classic_dog_breeder_color_scheme_css .='}';
}

$classic_dog_breeder_wave_color2 = get_theme_mod('classic_dog_breeder_wave_color2');
if($classic_dog_breeder_wave_color2 != false){
    $classic_dog_breeder_color_scheme_css .='.wave-img2 svg path, .banner-img .img-bg svg circle:nth-child(3), .banner-img .img-bg svg circle:nth-child(4){';
      $classic_dog_breeder_color_scheme_css .='fill: '.esc_html($classic_dog_breeder_wave_color2).';';
    $classic_dog_breeder_color_scheme_css .='}';
}

$classic_dog_breeder_wave_color3 = get_theme_mod('classic_dog_breeder_wave_color3');
if($classic_dog_breeder_wave_color3 != false){
    $classic_dog_breeder_color_scheme_css .='.wave-img3 svg path, .banner-img .img-bg svg path:nth-child(1){';
      $classic_dog_breeder_color_scheme_css .='fill: '.esc_html($classic_dog_breeder_wave_color3).';';
    $classic_dog_breeder_color_scheme_css .='}';
}

$classic_dog_breeder_wave_color4 = get_theme_mod('classic_dog_breeder_wave_color4');
if($classic_dog_breeder_wave_color4 != false){
    $classic_dog_breeder_color_scheme_css .='.wave-img4 svg path, .banner-img .img-bg svg path:nth-child(2){';
      $classic_dog_breeder_color_scheme_css .='fill: '.esc_html($classic_dog_breeder_wave_color4).';';
    $classic_dog_breeder_color_scheme_css .='}';
}

//---------------------------------Logo-Max-height--------- 
$classic_dog_breeder_logo_width = get_theme_mod('classic_dog_breeder_logo_width');
if($classic_dog_breeder_logo_width != false){
    $classic_dog_breeder_color_scheme_css .='.logo .custom-logo-link img{';
      $classic_dog_breeder_color_scheme_css .='width: '.esc_html($classic_dog_breeder_logo_width).'px;';
    $classic_dog_breeder_color_scheme_css .='}';
}

/*--------------------------- Woocommerce Product Image Border Radius -------------------*/

$classic_dog_breeder_woo_product_img_border_radius = get_theme_mod('classic_dog_breeder_woo_product_img_border_radius');
if($classic_dog_breeder_woo_product_img_border_radius != false){
    $classic_dog_breeder_color_scheme_css .='.woocommerce-shop.woocommerce .product-content .product-image img{';
    $classic_dog_breeder_color_scheme_css .='border-radius: '.esc_attr($classic_dog_breeder_woo_product_img_border_radius).'px;';
    $classic_dog_breeder_color_scheme_css .='}';
}  

/*--------------------------- Preloader Background Image ------------*/

$classic_dog_breeder_preloader_bg_image = get_theme_mod('classic_dog_breeder_preloader_bg_image');
if($classic_dog_breeder_preloader_bg_image != false){
  $classic_dog_breeder_color_scheme_css .='#preloader{';
    $classic_dog_breeder_color_scheme_css .='background: url('.esc_attr($classic_dog_breeder_preloader_bg_image).'); background-size: cover;';
  $classic_dog_breeder_color_scheme_css .='}';
}

/*--------------------------- Scroll to top positions -------------------*/

$classic_dog_breeder_scroll_position = get_theme_mod( 'classic_dog_breeder_scroll_position','Right');
if($classic_dog_breeder_scroll_position == 'Right'){
    $classic_dog_breeder_color_scheme_css .='#button{';
        $classic_dog_breeder_color_scheme_css .='right: 20px;';
    $classic_dog_breeder_color_scheme_css .='}';
}else if($classic_dog_breeder_scroll_position == 'Left'){
    $classic_dog_breeder_color_scheme_css .='#button{';
        $classic_dog_breeder_color_scheme_css .='left: 20px;';
    $classic_dog_breeder_color_scheme_css .='}';
}else if($classic_dog_breeder_scroll_position == 'Center'){
    $classic_dog_breeder_color_scheme_css .='#button{';
        $classic_dog_breeder_color_scheme_css .='right: 50%;left: 50%;';
    $classic_dog_breeder_color_scheme_css .='}';
}

/*--------------------------- Footer background image -------------------*/

$classic_dog_breeder_footer_bg_image = get_theme_mod('classic_dog_breeder_footer_bg_image');
if($classic_dog_breeder_footer_bg_image != false){
    $classic_dog_breeder_color_scheme_css .='#footer{';
        $classic_dog_breeder_color_scheme_css .='background: url('.esc_attr($classic_dog_breeder_footer_bg_image).')!important;';
        $classic_dog_breeder_color_scheme_css .= 'background-size: cover!important;';  
    $classic_dog_breeder_color_scheme_css .='}';
}

/*--------------------------- Blog Post Page Image Box Shadow -------------------*/

$classic_dog_breeder_blog_post_page_image_box_shadow = get_theme_mod('classic_dog_breeder_blog_post_page_image_box_shadow',0);
if($classic_dog_breeder_blog_post_page_image_box_shadow != false){
    $classic_dog_breeder_color_scheme_css .='.post-thumb img{';
        $classic_dog_breeder_color_scheme_css .='box-shadow: '.esc_attr($classic_dog_breeder_blog_post_page_image_box_shadow).'px '.esc_attr($classic_dog_breeder_blog_post_page_image_box_shadow).'px '.esc_attr($classic_dog_breeder_blog_post_page_image_box_shadow).'px #cccccc;';
    $classic_dog_breeder_color_scheme_css .='}';
}       

/*--------------------------- Shop page pagination -------------------*/

$classic_dog_breeder_wooproducts_nav = get_theme_mod('classic_dog_breeder_wooproducts_nav', 'Yes');
if($classic_dog_breeder_wooproducts_nav == 'No'){
  $classic_dog_breeder_color_scheme_css .='.woocommerce nav.woocommerce-pagination{';
    $classic_dog_breeder_color_scheme_css .='display: none;';
  $classic_dog_breeder_color_scheme_css .='}';
}

/*--------------------------- Related Product -------------------*/

$classic_dog_breeder_related_product_enable = get_theme_mod('classic_dog_breeder_related_product_enable',true);
if($classic_dog_breeder_related_product_enable == false){
  $classic_dog_breeder_color_scheme_css .='.related.products{';
    $classic_dog_breeder_color_scheme_css .='display: none;';
  $classic_dog_breeder_color_scheme_css .='}';
}