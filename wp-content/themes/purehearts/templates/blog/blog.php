<?php

/**
 * Blog Content Template
 *
 * @package    WordPress
 * @subpackage PUREHEARTS
 * @author     Theme Kalia
 * @version    1.0
 */

if ( class_exists( 'Purehearts_Resizer' ) ) {
	$img_obj = new Purehearts_Resizer();
} else {
	$img_obj = array();
}

$options = purehearts_WSH()->option();

$allowed_tags = wp_kses_allowed_html('post');
global $post;
?>
<div <?php post_class(); ?>>
	
    <div class="news-block-two">
        <div class="inner-box">
            <?php if(has_post_thumbnail()){ ?>
            <figure class="image-box"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_post_thumbnail('purehearts_1170x500'); ?></a></figure>
            <?php } ?>
            <div class="content-box">
                <div class="text">
                    <?php if( $options->get( 'blog_post_date' ) ){ ?><span class="post-date"><?php echo esc_attr(get_the_date()); ?></span><?php } ?>
                    <?php if(has_category()){ ?><div class="category"><?php the_category(' ,'); ?></div><?php } ?>
                    <h3><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h3>
                    <?php the_excerpt(); ?>
                </div>
                <div class="info clearfix">
                    <div class="link-box pull-left"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php esc_html_e('More Details', 'purehearts'); ?></a></div>
                    <?php if( $options->get( 'blog_post_author' ) || $options->get( 'blog_post_comments' ) ){ ?>
                    <ul class="post-info pull-right clearfix">
                        <?php if( $options->get( 'blog_post_author' ) ){ ?>
                        <li><i class="fa fa-user"></i><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID') )); ?>"><?php esc_html_e('By', 'purehearts'); ?> <?php the_author(); ?></a></li>
                        <?php } ?>
                        <?php if( $options->get( 'blog_post_comments' ) ){ ?>
                        <li><i class="fa fa-comment"></i><a href="<?php echo esc_url(get_permalink(get_the_id()).'#comments'); ?>"><?php comments_number( wp_kses(__('0 Comments' , 'purehearts'), true), wp_kses(__('1 Comment' , 'purehearts'), true), wp_kses(__('% Comments' , 'purehearts'), true)); ?></a></li>
                        <?php } ?>
                    </ul>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
            
</div>