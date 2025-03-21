<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Classic Dog Breeder
 */
?>
<div id="footer">
  <?php 
    $classic_dog_breeder_footer_widget_enabled = get_theme_mod('classic_dog_breeder_footer_widget', true);
    if ($classic_dog_breeder_footer_widget_enabled !== false && $classic_dog_breeder_footer_widget_enabled !== '') { ?>
    <?php 
        $classic_dog_breeder_widget_areas = get_theme_mod('classic_dog_breeder_footer_widget_areas', '4');
        if ($classic_dog_breeder_widget_areas == '3') {
            $classic_dog_breeder_cols = 'col-lg-4 col-md-6';
        } elseif ($classic_dog_breeder_widget_areas == '4') {
            $classic_dog_breeder_cols = 'col-lg-3 col-md-6';
        } elseif ($classic_dog_breeder_widget_areas == '2') {
            $classic_dog_breeder_cols = 'col-lg-6 col-md-6';
        } else {
            $classic_dog_breeder_cols = 'col-lg-12 col-md-12';
        }
    ?>
    <div class="footer-widget">
        <div class="container">
          <div class="row">
            <!-- Footer 1 -->
            <div class="<?php echo esc_attr($classic_dog_breeder_cols); ?> footer-block">
                <?php if (is_active_sidebar('footer-1')) : ?>
                    <?php dynamic_sidebar('footer-1'); ?>
                <?php else : ?>
                    <aside id="categories" class="widget py-3" role="complementary" aria-label="<?php esc_attr_e('footer1', 'classic-dog-breeder'); ?>">
                        <h3 class="widget-title"><?php esc_html_e('Categories', 'classic-dog-breeder'); ?></h3>
                        <ul>
                            <?php wp_list_categories('title_li='); ?>
                        </ul>
                    </aside>
                <?php endif; ?>
            </div>

            <!-- Footer 2 -->
            <div class="<?php echo esc_attr($classic_dog_breeder_cols); ?> footer-block">
                <?php if (is_active_sidebar('footer-2')) : ?>
                    <?php dynamic_sidebar('footer-2'); ?>
                <?php else : ?>
                    <aside id="archives" class="widget py-3" role="complementary" aria-label="<?php esc_attr_e('footer2', 'classic-dog-breeder'); ?>">
                        <h3 class="widget-title"><?php esc_html_e('Archives', 'classic-dog-breeder'); ?></h3>
                        <ul>
                            <?php wp_get_archives(array('type' => 'monthly')); ?>
                        </ul>
                    </aside>
                <?php endif; ?>
            </div>

            <!-- Footer 3 -->
            <div class="<?php echo esc_attr($classic_dog_breeder_cols); ?> footer-block">
                <?php if (is_active_sidebar('footer-3')) : ?>
                    <?php dynamic_sidebar('footer-3'); ?>
                <?php else : ?>
                    <aside id="meta" class="widget py-3" role="complementary" aria-label="<?php esc_attr_e('footer3', 'classic-dog-breeder'); ?>">
                        <h3 class="widget-title"><?php esc_html_e('Meta', 'classic-dog-breeder'); ?></h3>
                        <ul>
                            <?php wp_register(); ?>
                            <li><?php wp_loginout(); ?></li>
                            <?php wp_meta(); ?>
                        </ul>
                    </aside>
                <?php endif; ?>
            </div>

            <!-- Footer 4 -->
            <div class="<?php echo esc_attr($classic_dog_breeder_cols); ?> footer-block">
                <?php if (is_active_sidebar('footer-4')) : ?>
                    <?php dynamic_sidebar('footer-4'); ?>
                <?php else : ?>
                    <aside id="search-widget" class="widget py-3" role="complementary" aria-label="<?php esc_attr_e('footer4', 'classic-dog-breeder'); ?>">
                        <h3 class="widget-title"><?php esc_html_e('Search', 'classic-dog-breeder'); ?></h3>
                        <?php the_widget('WP_Widget_Search'); ?>
                    </aside>
                <?php endif; ?>
            </div>
          </div>
        </div>
    </div>
    <?php } ?>
    <div class="clear"></div>
    <div class="copywrap text-center">
        <div class="container">
            <p><?php echo esc_html(get_theme_mod('classic_dog_breeder_copyright_line',__('Classic Dog Breeder WordPress Theme','classic-dog-breeder'))); ?> <?php echo esc_html('By Classic Templates','classic-dog-breeder'); ?></p>
        </div>
    </div>
</div>

<?php if(get_theme_mod('classic_dog_breeder_scroll_hide',true)){ ?>
 <a id="button"><?php esc_html_e('TOP', 'classic-dog-breeder'); ?></a>
<?php } ?>
  
<?php wp_footer(); ?>
</body>
</html>
