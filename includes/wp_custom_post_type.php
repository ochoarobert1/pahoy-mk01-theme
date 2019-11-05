<?php

function portafolio() {

    $labels = array(
        'name'                  => _x( 'Portafolios', 'Post Type General Name', 'pahoy' ),
        'singular_name'         => _x( 'Portafolio', 'Post Type Singular Name', 'pahoy' ),
        'menu_name'             => __( 'Portafolio', 'pahoy' ),
        'name_admin_bar'        => __( 'Portafolio', 'pahoy' ),
        'archives'              => __( 'Archivo de Portafolio', 'pahoy' ),
        'attributes'            => __( 'Atributos de Portafolio', 'pahoy' ),
        'parent_item_colon'     => __( 'Portafolio Padre:', 'pahoy' ),
        'all_items'             => __( 'Todos los Items', 'pahoy' ),
        'add_new_item'          => __( 'Agregar Nuevo Item', 'pahoy' ),
        'add_new'               => __( 'Agregar Nuevo', 'pahoy' ),
        'new_item'              => __( 'Nuevo Item', 'pahoy' ),
        'edit_item'             => __( 'Editar Item', 'pahoy' ),
        'update_item'           => __( 'Actualizar Item', 'pahoy' ),
        'view_item'             => __( 'Ver Item', 'pahoy' ),
        'view_items'            => __( 'Ver Portafolio', 'pahoy' ),
        'search_items'          => __( 'Buscar en Portafolio', 'pahoy' ),
        'not_found'             => __( 'No hay Resultados', 'pahoy' ),
        'not_found_in_trash'    => __( 'No hay Resultados en la Papelera', 'pahoy' ),
        'featured_image'        => __( 'Imagen Destacada', 'pahoy' ),
        'set_featured_image'    => __( 'Colocar Imagen Destacada', 'pahoy' ),
        'remove_featured_image' => __( 'Remover Imagen Destacada', 'pahoy' ),
        'use_featured_image'    => __( 'Usar como Imagen Destacada', 'pahoy' ),
        'insert_into_item'      => __( 'Insertar dentro de Item', 'pahoy' ),
        'uploaded_to_this_item' => __( 'Cargado a este item', 'pahoy' ),
        'items_list'            => __( 'Listado del Portafolio', 'pahoy' ),
        'items_list_navigation' => __( 'Navegación de Listado del Portafolio', 'pahoy' ),
        'filter_items_list'     => __( 'Filtro de Listado del Portafolio', 'pahoy' ),
    );
    $args = array(
        'label'                 => __( 'Portafolio', 'pahoy' ),
        'description'           => __( 'Portafolio de Desarrollos', 'pahoy' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'trackbacks', 'custom-fields', ),
        'taxonomies'            => array( 'custom_portafolio' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-testimonial',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    register_post_type( 'portafolio', $args );

}
add_action( 'init', 'portafolio', 0 );
