<?php
/* WOOCOMMERCE CUSTOM COMMANDS */

/* WOOCOMMERCE - DECLARE THEME SUPPORT - BEGIN */
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
/* WOOCOMMERCE - DECLARE THEME SUPPORT - END */

/* WOOCOMMERCE - CUSTOM WRAPPER - BEGIN */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
    echo '<section id="main" class="container-fluid"><div class="row"><div class="woocustom-main-container col-12">';
}

function my_theme_wrapper_end() {
    echo '</div></div></section>';
}
/* WOOCOMMERCE - CUSTOM WRAPPER - END */

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
add_action('custom_woocommerce_breadcrumb', 'woocommerce_breadcrumb', 20);

remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);

/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
    function loop_columns() {
        return 3; // 3 products per row
    }
}

/* GET CART QUANTITY */
function custom_woocommerce_get_cart_quantity() {
    global $woocommerce;
    $items = $woocommerce->cart->get_cart_contents_count();
    return $items;
}

/* GET MINI CART */
function custom_woocommerce_get_cart() {
    global $woocommerce;
    $items = $woocommerce->cart->get_cart();
?>
<div class="custom-mini-cart-container">
    <h2><?php _e('Carrito de Compras', 'pahoy'); ?></h2>
    <?php if (!empty($items)) { ?>
    <?php foreach($items as $item => $values) { ?>
    <?php $_product =  wc_get_product( $values['data']->get_id() ); ?>
    <?php $product_details = wc_get_product( $values['product_id'] ); ?>
    <?php $categories = get_the_terms($values['product_id'], 'product_cat'); ?>
    <div class="custom-mini-cart-item">
        <div class="custom-mini-cart-item-category">
            <?php foreach ($categories as $category) { ?>
            <?php if ($category->name != 'Productos') { ?>
            <span><?php echo $category->name; ?></span>
            <?php } ?>
            <?php } ?>
        </div>
        <div class="custom-mini-cart-item-content">
            <div class="custom-mini-cart-item-image">
                <a href="<?php echo get_permalink($values['product_id']); ?>" title="<?php _e('Ver Producto', 'pahoy'); ?>">
                    <?php echo $product_details->get_image('avatar', array('class' => 'img-fluid')); ?>
                </a>
            </div>
            <div class="custom-mini-cart-item-name">
                <a href="<?php echo get_permalink($values['product_id']); ?>" title="<?php _e('Ver Producto', 'pahoy'); ?>">
                    <h3><?php echo $_product->get_title(); ?> x <?php echo $values['quantity']; ?></h3>
                </a>
                <a href="" class="remove-link">x</a>
                <div class="custom-mini-cart-item-info">
                    <?php echo $_product->get_price_html(); ?>
                </div>
            </div>

        </div>
    </div>
    <?php } ?>
    <?php } else { ?>
    <h3 class="empty-cart"><?php _e('El carrito esta vacio', 'pahoy'); ?></h3>
    <?php } ?>
    <div class="custom-mini-cart-subtotal">
        <h4><strong><?php _e('Subtotal:', 'pahoy'); ?></strong> <?php echo $woocommerce->cart->get_cart_total(); ?></h4>
    </div>
    <div class="custom-mini-cart-buttons">
        <?php $cart_url = apply_filters( 'woocommerce_get_cart_url', wc_get_cart_url() ); ?>
        <a href="<?php echo $cart_url; ?>" title="<?php _e('Ver Carrito', 'pahoy'); ?>" class="btn btn-md btn-cart"><?php _e('Ver Carrito', 'pahoy'); ?></a>
        <?php $get_checkout_url = apply_filters( 'woocommerce_get_checkout_url', wc_get_checkout_url() ); ?>
        <a href="<?php echo $get_checkout_url; ?>" title="<?php _e('Finalizar Compra', 'pahoy'); ?>" class="btn btn-md btn-empty"><?php _e('Finalizar Compra', 'pahoy'); ?></a>
    </div>
</div>
<?php
}
