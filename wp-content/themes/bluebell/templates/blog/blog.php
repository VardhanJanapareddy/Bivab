<?php

/**
 * Blog Content Template
 *
 * @package    WordPress
 * @subpackage BLUEBELL
 * @author     Theme Arc
 * @version    1.0
 */

if ( class_exists( 'Bluebell_Resizer' ) ) {
	$img_obj = new Bluebell_Resizer();
} else {
	$img_obj = array();
}

$options = bluebell_WSH()->option();

$allowed_tags = wp_kses_allowed_html('post');
global $post;
?>
<div <?php post_class(); ?>>
	
    <div class="inner-box m-b50">
        <?php if(has_post_thumbnail()){ ?>
        <div class="image"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_post_thumbnail('bluebell_840x435'); ?></a></div>
        <?php } ?>
        <div class="lower-content">
            <div class="post-meta">
                <div class="date"><?php echo esc_attr(get_the_date()); ?></div>
                <ul>
                    <li><?php esc_html_e('By:', 'bluebell'); ?> <?php the_author(); ?>  /  <?php the_category(' '); ?> / <?php comments_number( wp_kses(__('0 Comments' , 'bluebell'), true), wp_kses(__('1 Comment' , 'bluebell'), true), wp_kses(__('% Comments' , 'bluebell'), true)); ?></li>
                </ul>
            </div>
            <h3><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h3>
            <div class="blog-text"><?php the_excerpt(); ?> </div>
            <div class="link-btn"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>" class="view-all-btn"><span><?php esc_html_e('Read More', 'bluebell'); ?></span></a></div>
        </div>    
    </div>
</div>