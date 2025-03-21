<?php
/* Template Name: Advanced Search */
get_header();?>

<div class="advance-search-main">
    <div class="feature-header">
      <div class="feature-post-thumbnail">
        <div class="slider-alternate">
          <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/banner.png'; ?>">
        </div>
        <?php if ( get_theme_mod('job_listing_breadcrumb_enable',true) ) : ?>
          <div class="bread_crumb text-center">
            <h1 class="post-title feature-header-title"><?php esc_html_e('Advanced Search', 'job-listing'); ?></h1>
            <?php job_listing_breadcrumb();  ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
<div class="container">
        <?php
        // Get search parameters from the form
        $search_query   = isset($_GET['search']) ? sanitize_text_field($_GET['search']) : '';
        $category_slug  = isset($_GET['category_name']) ? sanitize_text_field($_GET['category_name']) : '';

        // Setup query args
        $args = array(
            'post_type'      => 'post',
            'post_status'    => 'publish',
            's'             => $search_query,
            'category_name'  => $category_slug,
            'posts_per_page' => 10, // Limit results
        );

        // Fetch posts
        $query = new WP_Query($args);

        if ($query->have_posts()) : ?>
            <div class="search-results row my-5">
                <?php 
                
                $i = 1;
                
                while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="col-lg-4">
                        <div class="blog-grid-layout">
                            <div id="post-<?php the_ID(); ?>" <?php post_class('post-box mb-4 p-3'); ?>>
                                <?php if (has_post_thumbnail()) { ?>
                                    <div class="post-thumbnail mb-2">
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                            <?php the_post_thumbnail(); ?>
                                        </a>
                                    </div>
                                <?php } ?>
                                <div class="rental-image mb-3 text-start">
                                    <?php $job_listing_top_categories_icon = get_theme_mod( 'job_listing_top_categories_icon'.$i,'dashicons dashicons-admin-users' ); ?>
                                    <span class="dashicons dashicons-<?php echo esc_attr( $job_listing_top_categories_icon ); ?>"></span>
                                </div>
                                <?php
                                $job_listing_archive_element_sortable = get_theme_mod('job_listing_archive_element_sortable', array('option1', 'option2', 'option3'));
                                foreach ($job_listing_archive_element_sortable as $key => $value) {
                                    if($value === 'option1') { ?>
                                    <div class="post-meta my-3">
                                        <i class="far fa-user me-2"></i><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a>
                                        <span class="ms-3"><i class="far fa-comments me-2"></i> <?php comments_number(esc_attr('0', 'job-listing'), esc_attr('0', 'job-listing'), esc_attr('%', 'job-listing')); ?> <?php esc_html_e('comments', 'job-listing'); ?></span>
                                    </div>
                                    <?php }
                                    if($value === 'option2') { ?>
                                    <h3 class="post-title mb-3 mt-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <?php }
                                    if($value === 'option3') { ?>
                                        <div class="post-content mb-2">
                                        <?php echo wp_trim_words(get_the_content(), get_theme_mod('job_listing_post_excerpt_number', 15)); ?>
                                        </div>
                                    <?php }
                                }

                                ?>
                                <?php echo esc_html(job_listing_edit_link()); ?>
                            </div>
                        </div>
                    </div>
                <?php $i++; endwhile; ?>
        </div>

            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p class="my-5"><?php echo esc_html('No results found. Try searching again.','job-listing'); ?></p>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
