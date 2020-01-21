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
    <div class="custom-product-wrapper">
        <?php
        /**
     * Hook: woocommerce_before_shop_loop_item.
     *
     * @hooked woocommerce_template_loop_product_link_open - 10
     */
        do_action( 'woocommerce_before_shop_loop_item' );
        ?>
        <div class="custom-product-wrapper-image">
            <a href="<?php the_permalink(); ?>" title="<?php _e('Ver Producto', 'pahoy'); ?>">
                <?php echo woocommerce_get_product_thumbnail( 'custom_woocommerce_thumbnail' ); ?>
            </a>
            <?php /**
     * Hook: woocommerce_before_shop_loop_item_title.
     *
     * @hooked woocommerce_show_product_loop_sale_flash - 10
     * @hooked woocommerce_template_loop_product_thumbnail - 10
     */
            do_action( 'woocommerce_before_shop_loop_item_title' );
            ?>

            <a href="" class="btn-favorites" title="<?php _e('Agregar a Favoritos', 'pahoy'); ?>"><i class="fa fa-heart"></i></a>
        </div>
        <div class="custom-product-wrapper-container">
            <header class="custom-product-wrapper-title">
                <a href="<?php the_permalink(); ?>" title="<?php _e('Ver Producto', 'pahoy'); ?>">
                    <h2><?php the_title(); ?></h2>
                </a>
            </header>
            <div class="custom-product-wrapper-price">
                <?php
                /**
     * Hook: woocommerce_after_shop_loop_item_title.
     *
     * @hooked woocommerce_template_loop_rating - 5
     * @hooked woocommerce_template_loop_price - 10
     */
                do_action( 'woocommerce_after_shop_loop_item_title' );
                ?>
            </div>
            <div class="custom-product-wrapper-category">
                <div class="custom-product-wrapper-button">
                    <?php
                    /**
        * Hook: woocommerce_after_shop_loop_item.
        *
        * @hooked woocommerce_template_loop_product_link_close - 5
        * @hooked woocommerce_template_loop_add_to_cart - 10
        */
                    do_action( 'woocommerce_after_shop_loop_item' );
                    ?>
                </div>
            </div>
        </div>
    </div>
</li>
