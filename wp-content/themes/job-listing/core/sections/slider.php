<?php $job_listing_args = array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'category_name' =>  get_theme_mod('job_listing_blog_slide_category'),
  'posts_per_page' => get_theme_mod('job_listing_blog_slide_number'),
); ?>

<?php if ( get_theme_mod('job_listing_blog_box_enable',true) ) : ?>
  <div class="slider">
    <div class="slider-box">
      <div class="slider-inner-banner">
          <div class="owl-carousel">
            <?php $job_listing_arr_posts = new WP_Query( $job_listing_args );
            $i = 1;
            if ( $job_listing_arr_posts->have_posts() ) :
              while ( $job_listing_arr_posts->have_posts() ) :
                $job_listing_arr_posts->the_post();
                ?>
                <div class="slider-box">
                  <div class="slider-image">
                    <?php
                      if ( has_post_thumbnail() ) :
                        the_post_thumbnail();
                      else:
                        ?>
                        <div class="slider-alternate">
                          <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/slider.png'; ?>">
                        </div>
                        <?php
                      endif;
                    ?>
                  </div>
                  <div class="slider-owl-position">
                    <h3 class="mb-3"><?php the_title(); ?></h3>
                    <p class="mb-4 pb-2 content"><?php echo wp_trim_words(get_the_content(), 30); ?></p>
                    <div class="form-box">
                      <form action="<?php echo esc_url(home_url('index.php/advanced-search')); ?>" method="get" class="form-div d-flex align-items-center rounded p-2 bg-white shadow-sm">
                          
                          <!-- Category Dropdown with Icon -->
                          <div class="input-group me-2">
                              <span class="search-icon"><i class="fas fa-briefcase"></i></span>
                              <select name="category_name" class="form-select">
                                  <option value=""><?php esc_html_e('Select Category', 'job-listing'); ?></option>
                                  <?php 
                                  $categories = get_categories(array(
                                      'taxonomy'   => 'category',
                                      'hide_empty' => false, 
                                  ));
                                  foreach ($categories as $category) : ?>
                                      <option value="<?php echo esc_attr($category->slug); ?>">
                                          <?php echo esc_html($category->name); ?>
                                      </option>
                                  <?php endforeach; ?>
                              </select>
                          </div>

                          <!-- Search Input with Icon -->
                          <div class="input-group me-2 flex-grow-1">
                              <span class="search-icon"><i class="fas fa-text-width"></i></span>
                              <input type="text" name="search" placeholder="Enter Keyword here..." value="<?php echo get_search_query(); ?>" class="form-control">
                          </div>

                          <!-- Search Button -->
                          <button type="submit" class="btn btn-primary slider-btn-search"><i class="fas fa-search"></i> <?php esc_html_e('Search', 'job-listing'); ?></button>
                      </form>
                    </div>
                  </div>
                </div>
              <?php
              $i++;
            endwhile;
            wp_reset_postdata();
            endif; ?>
          </div>
      </div>
    </div>
  </div>
<?php endif; ?>