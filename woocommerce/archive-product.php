<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
?>
<div class="main-banner-container container-fluid">
    <div class="row">
        <div class="main-banner-content col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <header class="woocommerce-products-header main-banner-info col-6">
                        <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                        <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
                        <?php endif; ?>
                    </header>
                    <nav class="main-banner-nav col-6">
                        <?php do_action('custom_woocommerce_breadcrumb'); ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<main class="container">
    <div class="row">
        <div class="main-woocommerce-container col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <?php
            /**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
            do_action( 'woocommerce_before_main_content' );
            ?>
            <div class="custom-search-container col-12">
                <form class="hero__form v2 filter">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-12">
                            <input class="hero__form-input custom-select" type="text" name="place-event" id="place-event" placeholder="What are you looking for?">
                        </div>
                        <div class="col-lg-3 col-md-12">
                            <select class="hero__form-input  custom-select">
                                <option>Select Location </option>
                                <option>New York</option>
                                <option>California</option>
                                <option>Washington</option>
                                <option>New Jersey</option>
                                <option>Florida</option>
                                <option>Los Angeles</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-12">

                            <select class="hero__form-input  custom-select">
                                <option>Select Categories</option>
                                <option>Art's</option>
                                <option>Health</option>
                                <option>Hotels</option>
                                <option>Real Estate</option>
                                <option>Rentals</option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-12">
                            <div class="submit_btn text-right md-left">
                                <button class="btn v3  mar-right-5" type="submit"><i class="ion-ios-search" aria-hidden="true"></i> Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <ul class="explore__form-checkbox-list full-filter">
                <?php /**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
                do_action( 'woocommerce_sidebar' );
                ?>
            </ul>
            <div class="item-wrapper">
                <div class="tab-content">
                    <div id="grid-view" class="tab-pane active  product-grid">
                        <?php
                        if ( woocommerce_product_loop() ) {

                            /**
     * Hook: woocommerce_before_shop_loop.
     *
     * @hooked woocommerce_output_all_notices - 10
     * @hooked woocommerce_result_count - 20
     * @hooked woocommerce_catalog_ordering - 30
     */
                            do_action( 'woocommerce_before_shop_loop' );

                            woocommerce_product_loop_start();

                            if ( wc_get_loop_prop( 'total' ) ) {
                                while ( have_posts() ) {
                                    the_post();

                                    /**
             * Hook: woocommerce_shop_loop.
             */
                                    do_action( 'woocommerce_shop_loop' );

                                    wc_get_template_part( 'content', 'product' );
                                }
                            }

                            woocommerce_product_loop_end();

                            /**
     * Hook: woocommerce_after_shop_loop.
     *
     * @hooked woocommerce_pagination - 10
     */
                            do_action( 'woocommerce_after_shop_loop' );
                        } else {
                            /**
     * Hook: woocommerce_no_products_found.
     *
     * @hooked wc_no_products_found - 10
     */
                            do_action( 'woocommerce_no_products_found' );
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php 
            /**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
            do_action( 'woocommerce_after_main_content' );


            ?>
        </div>
    </div>
</main>
<?php
get_footer( 'shop' );
