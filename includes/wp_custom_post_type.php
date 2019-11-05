<?php

function portafolio() {

    $labels = array(
        'name'                  => _x( 'Portafolios', 'Post Type General Name', 'PROYECTO' ),
        'singular_name'         => _x( 'Portafolio', 'Post Type Singular Name', 'PROYECTO' ),
        'menu_name'             => __( 'Portafolio', 'PROYECTO' ),
        'name_admin_bar'        => __( 'Portafolio', 'PROYECTO' ),
        'archives'              => __( 'Archivo de Portafolio', 'PROYECTO' ),
        'attributes'            => __( 'Atributos de Portafolio', 'PROYECTO' ),
        'parent_item_colon'     => __( 'Portafolio Padre:', 'PROYECTO' ),
        'all_items'             => __( 'Todos los Items', 'PROYECTO' ),
        'add_new_item'          => __( 'Agregar Nuevo Item', 'PROYECTO' ),
        'add_new'               => __( 'Agregar Nuevo', 'PROYECTO' ),
        'new_item'              => __( 'Nuevo Item', 'PROYECTO' ),
        'edit_item'             => __( 'Editar Item', 'PROYECTO' ),
        'update_item'           => __( 'Actualizar Item', 'PROYECTO' ),
        'view_item'             => __( 'Ver Item', 'PROYECTO' ),
        'view_items'            => __( 'Ver Portafolio', 'PROYECTO' ),
        'search_items'          => __( 'Buscar en Portafolio', 'PROYECTO' ),
        'not_found'             => __( 'No hay Resultados', 'PROYECTO' ),
        'not_found_in_trash'    => __( 'No hay Resultados en la Papelera', 'PROYECTO' ),
        'featured_image'        => __( 'Imagen Destacada', 'PROYECTO' ),
        'set_featured_image'    => __( 'Colocar Imagen Destacada', 'PROYECTO' ),
        'remove_featured_image' => __( 'Remover Imagen Destacada', 'PROYECTO' ),
        'use_featured_image'    => __( 'Usar como Imagen Destacada', 'PROYECTO' ),
        'insert_into_item'      => __( 'Insertar dentro de Item', 'PROYECTO' ),
        'uploaded_to_this_item' => __( 'Cargado a este item', 'PROYECTO' ),
        'items_list'            => __( 'Listado del Portafolio', 'PROYECTO' ),
        'items_list_navigation' => __( 'Navegación de Listado del Portafolio', 'PROYECTO' ),
        'filter_items_list'     => __( 'Filtro de Listado del Portafolio', 'PROYECTO' ),
    );
    $args = array(
        'label'                 => __( 'Portafolio', 'PROYECTO' ),
        'description'           => __( 'Portafolio de Desarrollos', 'PROYECTO' ),
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
