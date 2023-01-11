<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

global $wp_query;
$data  = \BLUEBELL\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
$layout = ( $layout ) ? $layout : 'right';
$sidebar = ( $sidebar ) ? $sidebar : 'default-sidebar';
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}

if( !$layout || $layout == 'full' ) $classes[] = 'col-xl-4 col-lg-6 col-md-6'; else $classes[] = 'col-xl-4 col-lg-6 col-md-6'; ?>

<div <?php post_class( $classes ); ?>>
	<div class="single-shop-item single-shop-item--style2">
        <div class="single-shop-item_inner">
			<?php
            /**
             * Hook: woocommerce_before_shop_loop_item.
             *
             * @hooked woocommerce_template_loop_product_link_open - 10
             */
            do_action( 'woocommerce_before_shop_loop_item_title' );
        
            /**
             * Hook: woocommerce_before_shop_loop_item_title.
             *
             * @hooked woocommerce_show_product_loop_sale_flash - 10
             * @hooked woocommerce_template_loop_product_thumbnail - 10
             */
             
             ?>
             <div class="img-holder">
                <?php woocommerce_template_loop_product_thumbnail(); ?>
                <div class="overlay">
                    <span class="icon-email"></span>
                    <a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php esc_html_e('Read More', 'bluebell'); ?></a>
                </div>
             </div>
                 
			<?php do_action( 'woocommerce_before_shop_loop_item_title' );
        
            /**
             * Hook: woocommerce_shop_loop_item_title.
             *
             * @hooked woocommerce_template_loop_product_title - 10
             */
            //do_action( 'woocommerce_shop_loop_item_title' );
        
            /**
             * Hook: woocommerce_after_shop_loop_item_title.
             *
             * @hooked woocommerce_template_loop_rating - 5
             * @hooked woocommerce_template_loop_price - 10
             */
            do_action( 'woocommerce_after_shop_loop_item_title' );
            ?>
            <div class="product-quantity-box">
                <div class="rate-box">
                    <?php woocommerce_template_single_price(); ?>
                </div>  
            </div>
            <div class="title-holder">
                <h3><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h3>
                <?php echo wp_kses(bluebell_trim(get_the_content(), 5), true);?>
                <div class="btn-box">
                    <a class="btn-one" href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>">
                        <div class="round"></div>
                        <span class="txt"><?php esc_html_e('Add to Cart', 'bluebell'); ?></span>
                    </a>
                </div>
            </div>
            <?php
            /**
             * Hook: woocommerce_after_shop_loop_item.
             *
             * @hooked woocommerce_template_loop_product_link_close - 5
             * @hooked woocommerce_template_loop_add_to_cart - 10
             */
            do_action( 'woocommerce_after_shop_loop_item_title' );
            ?>
        
        </div>
	</div>
</div>