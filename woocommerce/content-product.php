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
?>
<li <?php wc_product_class( '', $product ); ?>>
    <?php $rating_count = $product->get_rating_count(); ?>
    <?php $review_count = $product->get_review_count(); ?>
    <?php $average      = $product->get_average_rating(); ?>
    <div class="trending-place-item">
        <div class="trending-img">
            <?php /**
     * Hook: woocommerce_before_shop_loop_item_title.
     *
     * @hooked woocommerce_show_product_loop_sale_flash - 10
     * @hooked woocommerce_template_loop_product_thumbnail - 10
     */
            do_action( 'woocommerce_before_shop_loop_item_title' );
            ?>
            <?php if ( $rating_count > 0 ) : ?>
            <span class="trending-rating-green"><?php echo $review_count; ?></span>
            <?php endif; ?>
            <span class="save-btn"><i class="fa fa-heart"></i></span>
        </div>
        <div class="trending-title-box">
            <h4><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h4>
            <?php if ( $rating_count > 0 ) : ?>
            <div class="customer-review">
                <div class="rating-summary float-left">
                    <div class="rating-result" title="<?php echo $average; ?>%">
                        <ul class="product-rating">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="review-summury float-right">
                    <p><a href="<?php the_permalink(); ?>"><?php echo $review_count; ?> Reviews</a></p>
                </div>

            </div>
            <?php endif; ?>

            <ul class="trending-address">
                <li><?php the_excerpt(); ?></li>
                <li></li>
            </ul>

            <div class="trending-bottom">
                <div class="row align-items-center justify-content-center">
                    <div class="trend-left col">
                        <span class="round-bg pink"><i class="icofont-hotel"></i></span>
                        <p><a href="#">Hotel</a></p>

                    </div>
                    <div class="trend-right col">
                        <div class="trend-open"><?php /**
	 * Hook: woocommerce_after_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
                            do_action( 'woocommerce_after_shop_loop_item' ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</li>
