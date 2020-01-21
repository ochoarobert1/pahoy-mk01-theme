<?php

// Register Custom Post Type
function pahoy_custom_post_elements() {

    $labels = array(
        'name'                  => _x( 'Testimonios', 'Post Type General Name', 'pahoy' ),
        'singular_name'         => _x( 'Testimonio', 'Post Type Singular Name', 'pahoy' ),
        'menu_name'             => __( 'Testimonios', 'pahoy' ),
        'name_admin_bar'        => __( 'Testimonios', 'pahoy' ),
        'archives'              => __( 'Archivo de Testimonios', 'pahoy' ),
        'attributes'            => __( 'Atributos del Testimonio', 'pahoy' ),
        'parent_item_colon'     => __( 'Testimonio Padre:', 'pahoy' ),
        'all_items'             => __( 'Todos los Testimonios', 'pahoy' ),
        'add_new_item'          => __( 'Agregar Nuevo Testimonio', 'pahoy' ),
        'add_new'               => __( 'Agregar Nuevo', 'pahoy' ),
        'new_item'              => __( 'Nuevo Testimonio', 'pahoy' ),
        'edit_item'             => __( 'Editar Testimonio', 'pahoy' ),
        'update_item'           => __( 'Actualizar Testimonio', 'pahoy' ),
        'view_item'             => __( 'Ver Testimonio', 'pahoy' ),
        'view_items'            => __( 'Ver Testimonios', 'pahoy' ),
        'search_items'          => __( 'Buscar Testimonios', 'pahoy' ),
        'not_found'             => __( 'No hay resultados', 'pahoy' ),
        'not_found_in_trash'    => __( 'No hay resultados en Papelera', 'pahoy' ),
        'featured_image'        => __( 'Imagen del Testimonio', 'pahoy' ),
        'set_featured_image'    => __( 'Colocar Imagen del Testimonio', 'pahoy' ),
        'remove_featured_image' => __( 'Remover Imagen del Testimonio', 'pahoy' ),
        'use_featured_image'    => __( 'Usar como Imagen del Testimonio', 'pahoy' ),
        'insert_into_item'      => __( 'Insertar en Testimonio', 'pahoy' ),
        'uploaded_to_this_item' => __( 'Cargado a este Testimonio', 'pahoy' ),
        'items_list'            => __( 'Listado de Testimonios', 'pahoy' ),
        'items_list_navigation' => __( 'Navegación del Listado de Testimonios', 'pahoy' ),
        'filter_items_list'     => __( 'Filtro del Listado de Testimonios', 'pahoy' ),
    );
    $args = array(
        'label'                 => __( 'Testimonio', 'pahoy' ),
        'description'           => __( 'Testimonios de los Clientes', 'pahoy' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-format-status',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => true,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'show_in_rest'          => true,
    );
    register_post_type( 'testimonios', $args );

// Register Custom Taxonomy
    $labels2 = array(
        'name'                       => _x( 'Locaciones', 'Taxonomy General Name', 'pahoy' ),
        'singular_name'              => _x( 'Locación', 'Taxonomy Singular Name', 'pahoy' ),
        'menu_name'                  => __( 'Locaciones', 'pahoy' ),
        'all_items'                  => __( 'Todas las Locaciones', 'pahoy' ),
        'parent_item'                => __( 'Locación Padre', 'pahoy' ),
        'parent_item_colon'          => __( 'Locación Padre:', 'pahoy' ),
        'new_item_name'              => __( 'Nueva Locación', 'pahoy' ),
        'add_new_item'               => __( 'Agregar Nueva Locación', 'pahoy' ),
        'edit_item'                  => __( 'Editar Locación', 'pahoy' ),
        'update_item'                => __( 'Actualizar Locación', 'pahoy' ),
        'view_item'                  => __( 'Ver Locación', 'pahoy' ),
        'separate_items_with_commas' => __( 'Separar Locaciones por comas', 'pahoy' ),
        'add_or_remove_items'        => __( 'Agregar o Remover Locaciones', 'pahoy' ),
        'choose_from_most_used'      => __( 'Escoger de las más usadas', 'pahoy' ),
        'popular_items'              => __( 'Locaciones Populares', 'pahoy' ),
        'search_items'               => __( 'Buscar Locación', 'pahoy' ),
        'not_found'                  => __( 'No hay resultados', 'pahoy' ),
        'no_terms'                   => __( 'No hay Locaciones', 'pahoy' ),
        'items_list'                 => __( 'Listado de Locaciones', 'pahoy' ),
        'items_list_navigation'      => __( 'Navegación del Listado de Locaciones', 'pahoy' ),
    );
    $args2 = array(
        'labels'                     => $labels2,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'show_in_rest'               => true,
    );
    register_taxonomy( 'locaciones', array( 'product' ), $args2 );

}
add_action( 'init', 'pahoy_custom_post_elements', 0 );

/* --------------------------------------------------------------
/* CUSTOM LOCATIONS IMAGE
-------------------------------------------------------------- */
add_action('locaciones_add_form_fields', 'add_term_image', 99, 2);
function add_term_image($taxonomy){
?>
<tr class="form-field term-group">
    <th scope="row">
        <label for="txt_upload_image">Upload an Image</label>
    </th>
    <td class="locacion-image-container">
        <input type="hidden" name="locacion_img" id="locacion_img" value="">
        <input type="button" id="upload_image_btn" class="button" value="Upload an Image" />
    </td>
</tr>
<?php
}


add_action('created_locaciones', 'save_term_image', 10, 2);
function save_term_image($term_id, $tt_id) {
    if (isset($_POST['locacion_img']) && '' !== $_POST['locacion_img']){
        add_term_meta($term_id, 'term_image', $_POST['locacion_img'], true);
    }
}


add_action('locaciones_edit_form_fields', 'edit_image_upload', 99, 2);
function edit_image_upload($term, $taxonomy) {
    // get current group
    $txt_upload_image = get_term_meta($term->term_id, 'term_image', true);
?>
<tr class="form-field term-group">
    <th scope="row">
        <label for="txt_upload_image">Upload an Image</label>
    </th>
    <td class="locacion-image-container">
        <input type="hidden" name="locacion_img" id="locacion_img" value="">
        <?php $image_id = get_term_meta($term->term_id, 'term_image', true); ?>
        <?php if ($image_id != '') { ?>
        <?php $image_url = wp_get_attachment_image_src($image_id); ?>
        <img src="<?php echo $image_url[0]; ?>" alt="image" width="100" height="100" />
        <?php } ?>
        <input type="button" id="upload_image_btn" class="button" value="Upload an Image" />
    </td>
</tr>

<?php
}

add_action('edited_locaciones', 'update_image_upload', 10, 2);
function update_image_upload($term_id, $tt_id) {
    if (isset($_POST['locacion_img']) && '' !== $_POST['locacion_img']){
        update_term_meta($term_id, 'term_image', $_POST['locacion_img']);
    }
}

