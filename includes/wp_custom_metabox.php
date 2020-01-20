<?php
function be_metabox_show_on_slug( $display, $meta_box ) {
    if ( ! isset( $meta_box['show_on']['key'], $meta_box['show_on']['value'] ) ) {
        return $display;
    }

    if ( 'slug' !== $meta_box['show_on']['key'] ) {
        return $display;
    }

    $post_id = 0;

    // If we're showing it based on ID, get the current ID
    if ( isset( $_GET['post'] ) ) {
        $post_id = $_GET['post'];
    } elseif ( isset( $_POST['post_ID'] ) ) {
        $post_id = $_POST['post_ID'];
    }

    if ( ! $post_id ) {
        return $display;
    }

    $slug = get_post( $post_id )->post_name;

    // See if there's a match
    return in_array( $slug, (array) $meta_box['show_on']['value']);
}

add_filter( 'cmb2_show_on', 'be_metabox_show_on_slug', 10, 2 );


function ed_metabox_include_front_page( $display, $meta_box ) {
    if ( ! isset( $meta_box['show_on']['key'] ) ) {
        return $display;
    }

    if ( 'front-page' !== $meta_box['show_on']['key'] ) {
        return $display;
    }

    $post_id = 0;

    // If we're showing it based on ID, get the current ID
    if ( isset( $_GET['post'] ) ) {
        $post_id = $_GET['post'];
    } elseif ( isset( $_POST['post_ID'] ) ) {
        $post_id = $_POST['post_ID'];
    }

    if ( ! $post_id ) {
        return false;
    }

    // Get ID of page set as front page, 0 if there isn't one
    $front_page = get_option( 'page_on_front' );

    // there is a front page set and we're on it!
    return $post_id == $front_page;
}
add_filter( 'cmb2_show_on', 'ed_metabox_include_front_page', 10, 2 );

add_action( 'cmb2_admin_init', 'pahoy_register_custom_metabox' );
function pahoy_register_custom_metabox() {
    $prefix = 'ph_';

    $cmb_product_metabox = new_cmb2_box( array(
        'id'            => $prefix . 'product_metabox',
        'title'         => esc_html__( 'Test Metabox', 'cmb2' ),
        'object_types'  => array( 'prodcut' ), // Post type
        // 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
        // 'context'    => 'normal',
        // 'priority'   => 'high',
        // 'show_names' => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // true to keep the metabox closed by default
        // 'classes'    => 'extra-class', // Extra cmb2-wrap classes
        // 'classes_cb' => 'yourprefix_add_some_classes', // Add classes through a callback.
    ) );

    $cmb_product_metabox->add_field( array(
        'id'   => $prefix . 'product_banner_image',
        'name' => esc_html__('Imagen del Banner', 'pahoy'),
        'desc' => esc_html__('Seleccione una imagen para el banner.', 'pahoy'),
        'type' => 'file',
        'preview_size' => array( 100, 100 ),
        'query_args' => array( 'type' => 'image' ),
        'text' => array(
            'add_upload_files_text' => 'Cargar Imagen', // default: "Add or Upload Files"
            'remove_image_text' => 'Remover Imagen', // default: "Remove Image"
            'file_text' => 'Imagen:', // default: "File:"
            'file_download_text' => 'Descargar', // default: "Download"
            'remove_text' => 'Remover', // default: "Remove"
        )
    ) );

}
