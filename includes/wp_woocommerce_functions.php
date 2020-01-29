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
        add_action( 'init', array($this, 'install' ));
        add_filter( 'product_type_selector', array( $this, 'add_type' ) );
        add_action( 'init', array($this, 'register_pahoy_product_type' ) );
        add_action( 'admin_footer', array($this, 'enable_js_on_wc_product' ) );
        add_filter( 'woocommerce_product_data_tabs', array($this, 'actividades_product_tab') );
        add_action( 'woocommerce_product_data_panels', array($this, 'actividades_product_tab_product_tab_content' ));
        add_action( 'woocommerce_process_product_meta', array($this, 'save_actividades_product_settings' ));
        add_action( 'woocommerce_product_options_general_product_data', array($this, 'get_price_options_table'));
        add_action( 'woocommerce_eventos_add_to_cart', array($this, 'custom_woocommerce_eventos_add_to_cart'));
        add_action( 'woocommerce_actividades_add_to_cart', array($this, 'custom_woocommerce_actividades_add_to_cart'));
        add_action( 'woocommerce_tickets_add_to_cart', array($this, 'custom_woocommerce_tickets_add_to_cart'));
        add_action( 'woocommerce_tour_add_to_cart', array($this, 'custom_woocommerce_tour_add_to_cart'));
    }

    public function install() {
        // If there is no advanced product type taxonomy, add it.
        if ( ! get_term_by( 'slug', 'actividades', 'product_type' ) ) {
            wp_insert_term( 'actividades', 'product_type' );
        }
        if ( ! get_term_by( 'slug', 'eventos', 'product_type' ) ) {
            wp_insert_term( 'eventos', 'product_type' );
        }
        if ( ! get_term_by( 'slug', 'tickets', 'product_type' ) ) {
            wp_insert_term( 'tickets', 'product_type' );
        }
        if ( ! get_term_by( 'slug', 'tour', 'product_type' ) ) {
            wp_insert_term( 'tour', 'product_type' );
        }
    }

    public function add_type( $types ) {
        $types['actividades'] = __( 'Actividades', 'pahoy' );
        $types['eventos'] = __( 'Eventos', 'pahoy' );
        $types['tickets'] = __( 'Tickets', 'pahoy' );
        $types['tour'] = __( 'Tour', 'pahoy' );

        return $types;
    }

    public function register_pahoy_product_type() {
        require_once('woo-custom-products/class-wc-product-actividades.php');
        require_once('woo-custom-products/class-wc-product-eventos.php');
        require_once('woo-custom-products/class-wc-product-tickets.php');
        require_once('woo-custom-products/class-wc-product-tour.php');
    }

    public function get_price_options_table() {
        global $post, $product_object;

        if ( ! $post ) { return; }

        if ( 'product' != $post->post_type ) :
        return;
        endif;

        $is_actividades = $product_object && 'actividades' === $product_object->get_type() ? true : false;
        $is_eventos = $product_object && 'eventos' === $product_object->get_type() ? true : false;
        $is_tickets = $product_object && 'tickets' === $product_object->get_type() ? true : false;
        $is_tour = $product_object && 'tour' === $product_object->get_type() ? true : false;

        if ( $is_actividades ) {
            $class = 'show_if_actividades';
            echo '<div class="options_group ' . $class . ' clear"></div>';
        }
        if ( $is_eventos ) {
            $class = 'show_if_eventos';
            echo '<div class="options_group ' . $class . ' clear"></div>';
        }
        if ( $is_tickets ) {
            $class = 'show_if_tickets';
            echo '<div class="options_group ' . $class . ' clear"></div>';
        }
        if ( $is_tour ) {
            $class = 'show_if_tour';
            echo '<div class="options_group ' . $class . ' clear"></div>';
        }


    }


    public function enable_js_on_wc_product() {
        global $post, $product_object;

        if ( ! $post ) { return; }

        if ( 'product' != $post->post_type ) :
        return;
        endif;

        $is_actividades = $product_object && 'actividades' === $product_object->get_type() ? true : false;
        $is_eventos = $product_object && 'eventos' === $product_object->get_type() ? true : false;
        $is_tickets = $product_object && 'tickets' === $product_object->get_type() ? true : false;
        $is_tour = $product_object && 'tour' === $product_object->get_type() ? true : false;
        var_dump($product_object->get_type());
?>
<script type='text/javascript'>
    jQuery(document).ready(function() {

        jQuery('#product-type').on('change', function() {
            //            var product_type = jQuery('#product-type option:selected').val();
            //            var productClassName = 'show_if_' + product_type;
            //            jQuery('#general_product_data .pricing').addClass('show_if_' + product_type);
            jQuery('#general_product_data .pricing').show();
        });
        //for Price tab
        jQuery('#general_product_data .pricing').addClass('show_if_actividades');
        jQuery('#general_product_data .pricing').addClass('show_if_eventos');
        jQuery('#general_product_data .pricing').addClass('show_if_tickets');
        jQuery('#general_product_data .pricing').addClass('show_if_tour');

        <?php if ( $is_actividades ) { ?>
        jQuery('#general_product_data .pricing').show();
        <?php } ?>
        <?php if ( $is_eventos ) { ?>
        jQuery('#general_product_data .pricing').show();
        <?php } ?>
        <?php if ( $is_tickets ) { ?>
        jQuery('#general_product_data .pricing').show();
        <?php } ?>
        <?php if ( $is_tour ) { ?>
        jQuery('#general_product_data .pricing').show();
        <?php } ?>
    });

</script>
<?php
    }



    public function actividades_product_tab( $tabs) {

        $tabs['actividades'] = array(
            'label'	 => __( 'actividades Product', 'dm_product' ),
            'target' => 'actividades_product_options',
            'class'  => 'show_if_actividades_product',
        );
        return $tabs;
    }




    public function actividades_product_tab_product_tab_content() {

?><div id='actividades_product_options' class='panel woocommerce_options_panel'><?php
    ?><div class='options_group'><?php

        woocommerce_wp_text_input(
            array(
                'id' => 'actividades_product_info',
                'label' => __( 'actividades Product Spec', 'dm_product' ),
                'placeholder' => '',
                'desc_tip' => 'true',
                'description' => __( 'Enter actividades product Info.', 'dm_product' ),
                'type' => 'text'
            )
        );
    ?></div>
</div><?php
    }



    public function save_actividades_product_settings( $post_id ){

        $actividades_product_info = $_POST['actividades_product_info'];

        if( !empty( $actividades_product_info ) ) {

            update_post_meta( $post_id, 'actividades_product_info', esc_attr( $actividades_product_info ) );
        }
    }

    public function custom_woocommerce_eventos_add_to_cart() {
        wc_get_template( 'single-product/add-to-cart/simple.php' );
    }   
    public function custom_woocommerce_actividades_add_to_cart() {
        wc_get_template( 'single-product/add-to-cart/simple.php' );
    }   
    public function custom_woocommerce_tickets_add_to_cart() {
        wc_get_template( 'single-product/add-to-cart/simple.php' );
    }   
    public function custom_woocommerce_tour_add_to_cart() {
        wc_get_template( 'single-product/add-to-cart/simple.php' );
    }
}

new WC_Product_Type_Plugin();








/*
add_action( 'woocommerce_product_options_pricing', 'add_advanced_pricing' );

function add_advanced_pricing() {
    global $product_object;
?>
<div class='options_group show_if_actividades'>
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
*/
