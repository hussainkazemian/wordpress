<?php
/**
 * The Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Classic Dog Breeder
 */

get_header(); ?>

<div id="content" >

    <?php
        $classic_dog_breeder_banner = get_theme_mod('classic_dog_breeder_banner', false);
        if ($classic_dog_breeder_banner) { ?>
        <div id="banner" class="position-relative">
            <div class="banner-page">
                <div class="container">
                    <div class="banner-main text-center">
                        <div class="row">
                            <?php 
                                if (class_exists('woocommerce')) {
                                    $classic_dog_breeder_selected_category = get_theme_mod('classic_dog_breeder_hot_products_cat');
                                    
                                    if ($classic_dog_breeder_selected_category && $classic_dog_breeder_selected_category !== 'select') {
                                        $classic_dog_breeder_args = array(
                                            'post_type' => 'product',
                                            'product_cat' => $classic_dog_breeder_selected_category,
                                            'order' => 'ASC',
                                            'posts_per_page' => 4
                                        );
                                        $classic_dog_breeder_loop = new WP_Query($classic_dog_breeder_args);
                                        
                                        if ($classic_dog_breeder_loop->have_posts()) {
                                            while ($classic_dog_breeder_loop->have_posts()) : $classic_dog_breeder_loop->the_post();
                                                global $product;
                                            ?>
                                            <div class="col-xl-3 col-lg-3 col-md-3 col-3 mb-0 topdog-img-box position-relative">
                                                <div class="topdog-img position-relative">
                                                    <a href="<?php the_permalink(); ?>">
                                                    <?php
                                                    if (has_post_thumbnail($classic_dog_breeder_loop->post->ID)) {
                                                        the_post_thumbnail($classic_dog_breeder_loop->post->ID, 'shop_catalog');
                                                    } else {
                                                        echo '<img src="' . esc_url(wc_placeholder_img_src()) . '"/>';
                                                    }
                                                    ?></a>
                                                </div>
                                            </div>
                                            <?php endwhile; 
                                            wp_reset_postdata();
                                        }
                                    }
                                }
                            ?>
                        </div>
                        <div class="img-box">
                            <?php if (get_theme_mod('classic_dog_breeder_banner_top_img')) { ?>
                                <img src="<?php echo esc_url(get_theme_mod('classic_dog_breeder_banner_top_img')); ?>" alt="<?php echo esc_attr( 'dog-img', 'classic-dog-breeder'); ?>"/> 
                            <?php } else { ?>
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/dog.png" alt="<?php echo esc_attr('dog-img', 'classic-dog-breeder'); ?>"/>
                            <?php } ?>
                        </div>
                        <h1 class="my-2 text-capitalize banner-title"><?php echo esc_html(get_theme_mod('classic_dog_breeder_banner_title')); ?></h1>
                        <p class="banner-content mb-2"><?php echo esc_html(get_theme_mod('classic_dog_breeder_banner_text')); ?></p>
                        <?php if (class_exists('woocommerce')) { ?>
                            <div class="bannerbtn">
                                <a target="_blank" href="<?php echo wc_get_page_permalink( 'shop' ) ?>"><?php echo esc_html(get_theme_mod('classic_dog_breeder_button_text', 'Explore the Puppies')); ?><i class="fa-solid fa-paw"></i></a> 
                            </div>
                        <?php }?>
                    </div>
                </div>
                <div class="left-img position-absolute">
                    <?php if (get_theme_mod('classic_dog_breeder_banner_left_img')) { ?>
                        <img src="<?php echo esc_url(get_theme_mod('classic_dog_breeder_banner_left_img')); ?>" alt="<?php echo esc_attr( 'dog-img', 'classic-dog-breeder'); ?>"/> 
                    <?php } else { ?>
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/left-img.png" alt="<?php echo esc_attr('dog-img', 'classic-dog-breeder'); ?>"/>
                    <?php } ?>
                </div>
                <div class="right-img position-absolute">
                    <?php if (get_theme_mod('classic_dog_breeder_banner_right_img')) { ?>
                        <img src="<?php echo esc_url(get_theme_mod('classic_dog_breeder_banner_right_img')); ?>" alt="<?php echo esc_attr( 'dog-img', 'classic-dog-breeder'); ?>"/> 
                    <?php } else { ?>
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/right-img.png" alt="<?php echo esc_attr('dog-img', 'classic-dog-breeder'); ?>"/>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>

    <!-- Product Section Section -->
    <?php 
        $classic_dog_breeder_hide_product_sec_section = get_theme_mod('classic_dog_breeder_disabled_product_section', false);
        $classic_dog_breeder_catData = get_theme_mod('classic_dog_breeder_product_sec_cat', '0');
        if ($classic_dog_breeder_hide_product_sec_section) { ?>
        <section id="product-section" class="py-2 mb-5">
            <div class="container">
                <div class="blog-bx mb-2 text-center">
                    <?php if (get_theme_mod('classic_dog_breeder_product_sec_text')) { ?>
                        <p class="product-sec-text mb-0 text-capitalize"><?php echo esc_html(get_theme_mod('classic_dog_breeder_product_sec_text')); ?><i class="fa-solid fa-bone"></i></p>
                    <?php } ?>
                    <?php if (get_theme_mod('classic_dog_breeder_product_sec_title')) { ?>
                        <h2 class="product-sec-title pb-3 mt-1 text-capitalize"><?php echo esc_html(get_theme_mod('classic_dog_breeder_product_sec_title')); ?></h2>
                    <?php } ?>
                </div>
                <div class="row">
                    <?php 
                        if (class_exists('woocommerce')) {
                            $classic_dog_breeder_selected_product_category = get_theme_mod('classic_dog_breeder_products_cat');
                            
                            if ($classic_dog_breeder_selected_product_category && $classic_dog_breeder_selected_product_category !== 'select') {
                                $classic_dog_breeder_args = array(
                                    'post_type' => 'product',
                                    'product_cat' => $classic_dog_breeder_selected_product_category,
                                    'order' => 'ASC',
                                    'posts_per_page' => 4
                                );
                                $classic_dog_breeder_loop = new WP_Query($classic_dog_breeder_args);
                                
                                if ($classic_dog_breeder_loop->have_posts()) {
                                    while ($classic_dog_breeder_loop->have_posts()) : $classic_dog_breeder_loop->the_post(); 
                                        global $product;
                                    ?>
                                    <div class="col-xl-3 col-lg-3 col-md-6 col-12 product-main-box mb-3 text-center">
                                        <div class="product-box position-relative">
                                            <div class="ratings position-absolute">
                                                <?php
                                                $classic_dog_breeder_average_rating = $product->get_average_rating();
                                                $classic_dog_breeder_rating_count = $product->get_rating_count();
                                                if ($classic_dog_breeder_rating_count > 0) {
                                                    echo '<div class="rating-box">';
                                                    echo '<span class="star-rating"><i class="fa-solid fa-star"></i></span>';
                                                    echo '<span class="numeric-rating">' . esc_html($classic_dog_breeder_average_rating) . '</span>';
                                                    echo '</div>';
                                                }
                                                ?>
                                            </div>
                                            <div class="product-box-img text-center pb-2 mb-2">
                                                <?php if (has_post_thumbnail($classic_dog_breeder_loop->post->ID)) {
                                                    echo get_the_post_thumbnail($classic_dog_breeder_loop->post->ID, 'shop_catalog', array('class' => 'product-img'));
                                                } else {
                                                    echo '<img class="product-img" src="' . esc_url(woocommerce_placeholder_img_src()) . '" />';
                                                } ?>
                                            </div>
                                            <div class="product-box-content text-start">
                                                <h3 class="pro-title text-capitalize"><a href="<?php echo esc_url(get_permalink($classic_dog_breeder_loop->post->ID)); ?>"><?php the_title(); ?></a></h3>
                                                <p class="product-price mb-2">
                                                    <?php echo $product->get_price_html(); ?>
                                                </p>
                                                <?php
                                                $classic_dog_breeder_stock_quantity = $product->get_stock_quantity();
                                                $classic_dog_breeder_total_sales = $product->get_total_sales();
                                                $classic_dog_breeder_total_stock = $classic_dog_breeder_stock_quantity + $classic_dog_breeder_total_sales;

                                                if ($classic_dog_breeder_total_stock > 0) {
                                                $classic_dog_breeder_sold_percentage = ($classic_dog_breeder_total_sales / $classic_dog_breeder_total_stock) * 100;
                                                ?>
                                                <div class="stock-progress">
                                                    <div class="progress-bar" style="width: <?php echo esc_attr($classic_dog_breeder_sold_percentage); ?>%; background: #D65504;">
                                                    </div>
                                                </div>
                                                <p class="stock-info mb-2">
                                                <span class="product-sold"><?php echo esc_html($classic_dog_breeder_total_sales); ?><?php esc_html_e( ' sold', 'classic-dog-breeder' ); ?></span>
                                                <span class="product-remaining"><?php echo esc_html($classic_dog_breeder_stock_quantity); ?><?php esc_html_e( ' Remaining', 'classic-dog-breeder' ); ?></span>
                                                </p>
                                                <?php } else { ?>
                                                    <p class="stock-info mb-2"><?php esc_html_e( 'Out of stock', 'classic-dog-breeder' ); ?></p>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="product-btn">
                                            <a href="<?php the_permalink(); ?>"><?php esc_html_e('Book Now', 'classic-dog-breeder') ?></a>
                                        </div>
                                    </div>
                                    <?php endwhile; 
                                    wp_reset_postdata();
                                }
                            }
                        }
                    ?>
                </div>
            </div>
        </section>
    <?php } ?>
</div>
<?php get_footer(); ?>
