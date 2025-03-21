<?php 
$job_listing_args = array(
    'taxonomy'   => 'category',
    'hide_empty' => true,
);

// Get categories
$categories = get_categories($job_listing_args);
?>

<?php if ( get_theme_mod('job_listing_testimonial_section_enable',true) ) : ?>
	<div id="trending" class="pt-5">
		<div class="container">
			<div class="categories-box">
				<div class="categories-heading">
					<h4 class="mb-4"><?php echo esc_html(get_theme_mod('job_listing_categories_section_heading'));?></h4>
				</div>
				<div class="cat-box">
					<div class="row ser-box mb-4">
						<div class="owl-carousel">
						    <?php
						    $categories = get_categories(array(
						        'taxonomy'   => 'category', 
						        'hide_empty' => true,
						    ));
						    $i = 1;
						    if (!empty($categories)) :
						        foreach ($categories as $category) :
						            $category_link = get_category_link($category->term_id);
						            ?>
						            <div class="rental-box">
						                <div class="rental-image mb-3">
						                    <?php $job_listing_top_categories_icon = get_theme_mod( 'job_listing_top_categories_icon'.$i,'dashicons dashicons-admin-users' ); ?>
									        <span class="dashicons dashicons-<?php echo esc_attr( $job_listing_top_categories_icon ); ?>"></span>
						                </div>
						                <div class="rental-owl-position">
						                    <h3 class="mb-2"><a href="<?php echo esc_url($category_link); ?>"><?php echo esc_html($category->name); ?></a></h3>
						                    <h6 class="mb-0"><?php echo esc_html(get_theme_mod('job_listing_categories_number_of_jobs'.$i));?></h6>
						                </div>
						            </div>
						        <?php $i++; endforeach;
						    endif; ?>
						</div>
				    </div>
			    </div>
			</div>
		</div>
	</div>
<?php endif; ?>