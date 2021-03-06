<?php
/* PREVENTS DIRECT ACCESS */
if ( ! defined( 'ABSPATH' ) ) {
    die( 'Silence is Golden' );
}

/* GET ATTS FOR SHORTCODE  */
if ($atts['type_category'] == 'Locaciones') {
    $tax_type = 'locaciones';
}

if ($atts['type_category'] == 'Categorias') {
    $tax_type = 'category';
}

if ($atts['type_category'] == 'Categorías de Producto') {
    $tax_type = 'product_cat';
}

if (!isset($atts['quantity']) || ($atts['quantity'] == '')) {
    $tax_qty == 5;
} else {
    $tax_qty = $atts['quantity'];
}

ob_start();
/* SHORTCODE STRUCTURE  */
?>
<div class="custom-taxonomy-container col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="row">
        <div class="custom-taxonomy-slider-container col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="custom-taxonomy-boxes-slider owl-carousel owl-theme">
                <?php $term_array = get_terms(array('hide_empty' => false, 'taxonomy' => $tax_type, 'parent' => 0)); $i = 1; ?>
                <?php foreach ($term_array as $term_item) { ?>
                <?php $class = ''; ?>
                <div class="custom-taxonomy-item">
                    <div class="custom-taxonomy-item-wrapper">
                        <div class="custom-taxonomy-item-image-wrapper">
                            <?php $image_id = get_term_meta($term_item->term_id, 'term_image', true); ?>
                            <?php $image_url_square = wp_get_attachment_image_src($image_id, 'locacion_square', false); ?>
                            <img src="<?php echo $image_url_square[0]; ?>" alt="<?php echo $term_item->name; ?>" class="img-fluid" />
                        </div>
                        <div class="custom-taxonomy-item-content">
                            <a href="<?php echo get_term_link($term_item); ?>">
                                <h2><?php echo $term_item->name; ?></h2>
                            </a>
                            <?php $elements_array = new WP_Query(array('post_type' => 'product', 'posts_per_page' => -1, 'tax_query' => array(array('taxonomy' => $tax_type, 'field' => 'term_id', 'terms' => $term_item->term_id )))); ?>
                            <?php $elements_count = $elements_array->found_posts; ?>
                            <?php wp_reset_query(); ?>
                            <a href="<?php echo get_term_link($term_item); ?>" class="taxonomy-counter" title="<?php _e('Ver Más', 'pahoy'); ?>">
                                <?php if ($atts['type_category'] == 'Locaciones') { ?>
                                <?php printf( esc_html( _n( '%d tour', '%d tours', $elements_count, 'pahoy' ) ), $elements_count );
                                ?>
                                <?php } ?>

                                <?php if ($atts['type_category'] == 'Categorías de Producto') { ?>
                                <?php printf( esc_html( _n( '%d product', '%d productos', $elements_count, 'pahoy' ) ), $elements_count );
                                ?>
                                <?php } ?>

                                <?php if ($atts['type_category'] == 'Categorias') { ?>
                                <?php printf( esc_html( _n( '%d noticia', '%d noticias', $elements_count, 'pahoy' ) ), $elements_count );
                                ?>
                                <?php } ?>
                            </a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php
/* GET OB_CACHE CONTENT */
$content = ob_get_clean();
/* RETURN SHORTCODE */
return $content;
