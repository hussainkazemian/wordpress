<?php
/**
 * @package Classic Dog Breeder
 */
?>

<?php
    $classic_dog_breeder_post_date = esc_html(get_the_date());
    
    $classic_dog_breeder_author_name = esc_html(get_the_author());
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
    
    <?php 
    $classic_dog_breeder_designation = get_post_meta($post->ID, 'classic_dog_breeder_designation', true);
    
    if ($classic_dog_breeder_designation) : ?>
        <p class="serv-content"><?php echo esc_html($classic_dog_breeder_designation); ?></p>
    <?php endif; ?>
    <div class="social-icon text-start">
        <?php
        $classic_dog_breeder_facebook_link = get_post_meta($post->ID, 'classic_dog_breeder_facebook_link', true);
        $classic_dog_breeder_twitter_link = get_post_meta($post->ID, 'classic_dog_breeder_twitter_link', true);
        $classic_dog_breeder_telegram_link = get_post_meta($post->ID, 'classic_dog_breeder_telegram_link', true);

        if ($classic_dog_breeder_facebook_link || $classic_dog_breeder_twitter_link || $classic_dog_breeder_telegram_link) :
        ?>
            <div class="meta-fields text-start">
                <?php if ($classic_dog_breeder_facebook_link) : ?>
                    <a href="<?php echo esc_url($classic_dog_breeder_facebook_link); ?>" target="_blank"><i class="fab fa-facebook"></i></a>
                <?php endif; ?>

                <?php if ($classic_dog_breeder_twitter_link) : ?>
                    <a href="<?php echo esc_url($classic_dog_breeder_twitter_link); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                <?php endif; ?>

                <?php if ($classic_dog_breeder_telegram_link) : ?>
                    <a href="<?php echo esc_url($classic_dog_breeder_telegram_link); ?>" target="_blank"><i class="fab fa-telegram"></i></a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
    <?php if (has_post_thumbnail() ){ ?>
        <div class="post-thumb">
           <?php the_post_thumbnail(); ?>
        </div>
    <?php } ?>

    <?php if ('post' == get_post_type()) : ?>
        <div class="postmeta">
            <div class="post-date">
                <i class="fas fa-calendar-alt"></i> &nbsp;<?php echo esc_html($classic_dog_breeder_post_date); ?>
            </div>
            <div class="post-comment">&nbsp; &nbsp;
                <i class="fa fa-comment"></i> &nbsp; <?php comments_number(); ?>
            </div>
            <div class="post-author">&nbsp; &nbsp;
                <i class="fas fa-user"></i> &nbsp; <?php echo esc_html($classic_dog_breeder_author_name); ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="entry-content">
        <?php the_content(); ?>
        <?php
            wp_link_pages( array(
                'before' => '<div class="page-links">' . __( 'Pages:', 'classic-dog-breeder' ),
                'after'  => '</div>',
            ) );
        ?>
        <div class="tags"><?php the_tags(); ?></div>
    </div>
    <footer class="entry-meta">
        <?php edit_post_link( __( 'Edit', 'classic-dog-breeder' ), '<span class="edit-link">', '</span>' ); ?>
    </footer>
</article>