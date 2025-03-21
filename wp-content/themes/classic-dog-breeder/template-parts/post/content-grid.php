<?php
/**
 * @package Classic Dog Breeder
 */
?>

<?php
    $classic_dog_breeder_post_date = esc_html(get_the_date());
    $classic_dog_breeder_year = esc_html(get_the_date('Y'));
    $classic_dog_breeder_month = esc_html(get_the_date('m'));

    $classic_dog_breeder_author_id = esc_attr(get_the_author_meta('ID'));
    $classic_dog_breeder_author_link = esc_url(get_author_posts_url($classic_dog_breeder_author_id));
    $classic_dog_breeder_author_name = esc_html(get_the_author());
?>

<div class="col-lg-4 col-md-4 postsec-list">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="listarticle">
        <?php if (has_post_thumbnail() ){ ?>
            <div class="post-thumb">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
            </div>
        <?php } ?>
        <header class="entry-header">
            <h2 class="single_title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
            <?php if ('post' == get_post_type()) : ?>
                <div class="postmeta">
                    <?php if (get_theme_mod('classic_dog_breeder_metafields_date', true)) : ?>
                        <div class="post-date">
                            <a href="<?php echo esc_url(get_month_link($classic_dog_breeder_year, $classic_dog_breeder_month)); ?>">
                                <i class="fas fa-calendar-alt"></i> &nbsp;<?php echo esc_html($classic_dog_breeder_post_date); ?>
                                <span class="screen-reader-text"><?php echo esc_html($classic_dog_breeder_post_date); ?></span>
                            </a>
                        </div>
                    <?php endif; ?>  
                    <?php if (get_theme_mod('classic_dog_breeder_metafields_comments', true)) : ?>  
                        <div class="post-comment">&nbsp; &nbsp;
                            <a href="<?php echo esc_url(get_comments_link()); ?>">
                                <i class="fa fa-comment"></i> &nbsp; <?php comments_number(); ?>
                                <span class="screen-reader-text"><?php comments_number(); ?></span>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if (get_theme_mod('classic_dog_breeder_metafields_author', true)) : ?>
                        <div class="post-author">&nbsp; &nbsp;
                            <a href="<?php echo $classic_dog_breeder_author_link; ?>">
                                <i class="fas fa-user"></i> &nbsp; <?php echo esc_html($classic_dog_breeder_author_name); ?>
                                <span class="screen-reader-text"><?php echo esc_html($classic_dog_breeder_author_name); ?></span>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if (get_theme_mod('classic_dog_breeder_metafields_time', true)) : ?>
                        <div class="post-time">&nbsp; &nbsp;
                            <a href="#">
                                <i class="fas fa-clock"></i> &nbsp; <?php echo esc_html(get_the_time()); ?>
                                <span class="screen-reader-text"><?php echo esc_html(get_the_time()); ?></span>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </header>
            <div class="entry-summary">
            <?php if(get_theme_mod('classic_dog_breeder_blog_post_description_option') == 'Full Content'){ ?>
                <div class="entry-content"><?php
                    $classic_dog_breeder_content = get_the_content(); ?>
                    <p><?php echo wpautop($classic_dog_breeder_content); ?></p>  
                </div>
             <?php }
            if(get_theme_mod('classic_dog_breeder_blog_post_description_option', 'Excerpt Content') == 'Excerpt Content'){ ?>
                <?php if(get_the_excerpt()) { ?>
                    <div class="entry-content"> 
                        <p><?php $classic_dog_breeder_excerpt = get_the_excerpt(); echo esc_html($classic_dog_breeder_excerpt); ?></p>
                    </div>
                <?php }?>
            <?php }?> 
            </div>
        <div class="clearfix"></div>
    </div>
</article>
</div>
