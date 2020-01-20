<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

?>
<?php $url = get_post_meta(get_the_ID(), 'ph_porduct_banner_image', true); ?>
<div class="custom-woocommerce-single-picture-container" style="background: url(<?php echo $url; ?>);">
    <div class="custom-woocommerce-single-picture-container-wrapper">
        <div class="container">
            <div class="row align-items-end justify-content-between">
                <div class="custom-woocommerce-title-information col-8">
                    <?php $terms = get_the_terms(get_the_ID(), 'product_cat'); ?>
                    <?php if ( $terms && ! is_wp_error( $terms ) ) :  ?>
                    <?php foreach ( $terms as $term ) { ?>
                    <a href="<?php echo get_term_link($term); ?>" title="<?php _e('Ver mas elementos de esta categoría', 'pahoy'); ?>" class="custom-category-link"><?php echo $term->name; ?></a>
                    <?php } ?>
                    <?php endif; ?>
                    <h1><?php the_title(); ?></h1>
                    <?php do_action('custom_woocommerce_template_single_rating'); ?>
                </div>
                <div class="custom-woocommerce-actions-container col-4">
                    <a href=""><i class="fa fa-heart"></i> <?php _e('Guardar', 'pahoy'); ?></a>
                    <a href=""><i class="fa fa-share"></i> <?php _e('Compartir', 'pahoy'); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}
?>
<div class="custom-woocommerce-single-main-container col-12" id="product-<?php the_ID(); ?>">
    <div class="container">
        <div class="row">
            <div class="custom-woocommerce-single-main-content col-12">
                <div class="row">
                    <div class="custom-woocommerce-single-main-left col-8">
                        <div class="row">
                            <div class="woocommerce-main-navigation-links col-12">
                                <ul>
                                    <li>
                                        <a href="#information"><?php _e('Información', 'pahoy'); ?></a>
                                    </li>
                                    <li>
                                        <a href="#gallery"><?php _e('Galería', 'pahoy'); ?></a>
                                    </li>
                                    <li>
                                        <a href="#pricing"><?php _e('Precios', 'pahoy'); ?></a>
                                    </li>
                                    <li>
                                        <a href="#reviews"><?php _e('Reviews', 'pahoy'); ?></a>
                                    </li>
                                </ul>
                            </div>
                            <div id="information" class="woocommerce-custom-product-content col-12">
                                <h2><?php _e('Información', 'pahoy'); ?></h2>
                                <?php the_content(); ?>
                            </div>
                            <div id="gallery" class="woocommerce-custom-product-gallery col-12">
                                <h2><?php _e('Galería', 'pahoy'); ?></h2>
                                <?php
                                /**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
                                do_action( 'woocommerce_before_single_product_summary' );
                                ?>
                            </div>
                            <div id="pricing" class="woocommerce-custom-product-pricing col-12">
                                <h2><?php _e('Información', 'pahoy'); ?></h2>
                                <?php the_content(); ?>
                            </div>
                            <div id="reviews" class="woocommerce-custom-product-reviews col-12">
                                <h2><?php _e('Información', 'pahoy'); ?></h2>
                                <?php the_content(); ?>
                            </div>

                        </div>
                    </div>
                    <div class="custom-woocommerce-buttons-container col-4">
                        <?php
                        /**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
                        do_action( 'woocommerce_single_product_summary' );
                        ?>
                    </div>
                </div>
                <div>



                    <div class="summary entry-summary">

                    </div>

                    <?php
                    /**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
                    do_action( 'woocommerce_after_single_product_summary' );
                    ?>
                </div>

            </div>
        </div>
    </div>

</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
