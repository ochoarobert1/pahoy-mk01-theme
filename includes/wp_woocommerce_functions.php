<?php
/* WOOCOMMERCE CUSTOM COMMANDS */
//add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

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
    echo '<section id="main" class="container-fluid p-0"><div class="row no-gutters"><div class="woocustom-main-container col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">';
}

function my_theme_wrapper_end() {
    echo '</div></div></section>';
}
/* WOOCOMMERCE - CUSTOM WRAPPER - END */

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

/* PRODUCT LISTING OPTIONS */
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);


/* CHANGE QUANTITY OF PRODUCTS IN LOOP */
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
    function loop_columns() {
        return 3;
    }
}

/* REMOVE ACTIONS ON LOOP CATEGORY - SHOP */
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
add_action('custom_woocommerce_breadcrumbs', 'woocommerce_breadcrumb', 20);





/* CUSTOM ACTIONS ON SINGLE PRODUCT */
//add_action('custom_woocommerce_template_single_rating', 'woocommerce_template_single_rating');
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

class WC_Product_Type_Plugin {

    /**
     * Build the instance
     */
    public function __construct() {
        add_action( 'woocommerce_loaded', array( $this, 'load_plugin' ) );
        add_filter( 'product_type_selector', array( $this, 'add_type' ) );
        register_activation_hook( __FILE__, array( $this, 'install' ) );
        add_action( 'woocommerce_product_options_pricing', array( $this, 'add_advanced_pricing' ) );
        add_action( 'admin_footer', array( $this, 'enable_js_on_wc_product' ) );
        add_filter( 'woocommerce_product_data_tabs', array( $this, 'add_product_tab' ), 50 );
        add_action( 'woocommerce_product_data_panels', array( $this, 'add_product_tab_content' ) );
        add_action( 'woocommerce_process_product_meta_advanced', array( $this, 'save_advanced_settings' ) );

        add_action( 'woocommerce_product_options_general_product_data', function(){
            echo '<div class="options_group show_if_advanced clear"></div>';
        } );
    }
    /**
     * @param $post_id
     */
    public function save_advanced_settings( $post_id ) {
        $price = isset( $_POST['_member_price'] ) ? sanitize_text_field( $_POST['_member_price'] ) : '';
        update_post_meta( $post_id, '_member_price', $price );
    }
    public function add_type( $types ) {
        $types['advanced'] = __( 'Tour', 'yourtextdomain' );

        return $types;
    }
    public function add_advanced_pricing() {
        global $product_object;
?>
<div class='options_group show_if_advanced'>
    <?php

        woocommerce_wp_text_input(
            array(
                'id'          => '_member_price',
                'label'       => __( 'Pricing only for members', 'your_textdomain' ),
                'value'       => $product_object->get_meta( '_member_price', true ),
                'default'     => '',
                'placeholder' => 'Add pricing',
                'data_type' => 'price',
            )
        );
    ?>
</div>

<?php
    }
    public function install() {
        // If there is no advanced product type taxonomy, add it.
        if ( ! get_term_by( 'slug', 'advanced', 'product_type' ) ) {
            wp_insert_term( 'advanced', 'product_type' );
        }
    }
    public function enable_js_on_wc_product() {
        global $post, $product_object;

        if ( ! $post ) { return; }

        if ( 'product' != $post->post_type ) :
        return;
        endif;

        $is_advanced = $product_object && 'advanced' === $product_object->get_type() ? true : false;

?>
<script type='text/javascript'>
    jQuery(document).ready(function() {
        //for Price tab
        jQuery('#general_product_data .pricing').addClass('show_if_advanced');

        <?php if ( $is_advanced ) { ?>
        jQuery('#general_product_data .pricing').show();
        <?php } ?>
    });

</script>
<?php
    }
    /**
     * Load WC Dependencies
     *
     * @return void
     */
    public function load_plugin() {
        require_once 'class-wc-product-advanced.php';
    }
    /**
     * Add Experience Product Tab.
     *
     * @param array $tabs
     *
     * @return mixed
     */
    public function add_product_tab( $tabs ) {

        $tabs['advanced_type'] = array(
            'label'    => __( 'Advanced Type', 'your_textdomain' ),
            'target' => 'advanced_type_product_options',
            'class'  => 'show_if_advanced',
        );

        return $tabs;
    }

    /**
     * Add Content to Product Tab
     */
    public function add_product_tab_content() {
        global $product_object;
?>
<div id='advanced_type_product_options' class='panel woocommerce_options_panel hidden'>
    <div class='options_group'>
        <?php

        woocommerce_wp_text_input(
            array(
                'id'          => '_some_data',
                'label'       => __( 'Data', 'your_textdomain' ),
                'value'       => $product_object->get_meta( '_some_data', true ),
                'default'     => '',
                'placeholder' => 'Enter data',
            ));
        ?>
    </div>
</div>
<?php
    }
}

new WC_Product_Type_Plugin();
