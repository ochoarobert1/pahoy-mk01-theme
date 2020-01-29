<?php

/**
 * Advanced Product Type
 */
class WC_Product_Actividades extends WC_Product_Simple {

    public function __construct( $product ) {
        $this->product_type = 'actividades';
        parent::__construct( $product );
    }

    public function get_type() {
        return 'actividades';
    }

    public function get_price( $context = 'view' ) {

        if ( current_user_can('manage_options') ) {
            $price = $this->get_meta( '_member_price', true );
            if ( is_numeric( $price ) ) {
                return $price;
            }

        }
        return $this->get_prop( 'price', $context );
    }
}
