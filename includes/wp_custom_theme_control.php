<?php
/* --------------------------------------------------------------
CUSTOM AREA FOR OPTIONS DATA - pahoy
-------------------------------------------------------------- */

add_action( 'customize_register', 'pahoy_customize_register' );

function pahoy_customize_register( $wp_customize ) {
    // HEADER
    $wp_customize->add_section('pahoy_header_settings', array(
        'title'    => __('Cabecera', 'pahoy'),
        'description' => __('Opciones para los elementos de la cabecera', 'pahoy'),
        'priority' => 30
    ));

    $wp_customize->add_setting('pahoy_header_settings[phone_number]', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'capability'        => 'edit_theme_options',
        'type'           => 'option'
    ));

    $wp_customize->add_control( 'phone_number', array(
        'type' => 'text',
        'label'    => __('Número Telefónico', 'pahoy'),
        'description' => __( 'Agregar número telefonico con formato para el link', 'pahoy' ),
        'section'  => 'pahoy_header_settings',
        'settings' => 'pahoy_header_settings[phone_number]'
    ));

    $wp_customize->add_setting('pahoy_header_settings[formatted_phone_number]', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'capability'        => 'edit_theme_options',
        'type'           => 'option'
    ));

    $wp_customize->add_control( 'formatted_phone_number', array(
        'type' => 'text',
        'label'    => __('Número Telefónico [Visible]', 'pahoy'),
        'description' => __( 'Agregar número telefónico en un formato visible para el público', 'pahoy' ),
        'section'  => 'pahoy_header_settings',
        'settings' => 'pahoy_header_settings[formatted_phone_number]'
    ));

    $wp_customize->add_setting('pahoy_header_settings[email_address]', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'capability'        => 'edit_theme_options',
        'type'           => 'option'

    ));

    $wp_customize->add_control( 'email_address', array(
        'type' => 'text',
        'label'    => __('Correo Electrónico', 'pahoy'),
        'description' => __( 'Agregar direccion de Correo Electrónico', 'pahoy' ),
        'section'  => 'pahoy_header_settings',
        'settings' => 'pahoy_header_settings[email_address]'
    ));

    // FOOTER
    $wp_customize->add_section('pahoy_footer_settings', array(
        'title'    => __('Footer', 'pahoy'),
        'description' => __('Opciones del pie de página', 'pahoy'),
        'priority' => 31,
    ));

    $wp_customize->add_setting('pahoy_footer_settings[custom_html]', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( new WP_Customize_Code_Editor_Control( $wp_customize, 'custom_html', array(
        'label'     => 'Additional JS',
        'code_type' => 'javascript',
        'section'  => 'pahoy_footer_settings',
        'settings'   => 'pahoy_footer_settings[custom_html]'
    ) ) );

    $wp_customize->add_section('pahoy_social_settings', array(
        'title'    => __('Redes Sociales', 'pahoy'),
        'description' => __('Agregue aqui las redes sociales de la página, serán usadas globalmente', 'pahoy'),
        'priority' => 175,
    ));

    $wp_customize->add_setting('pahoy_social_settings[facebook]', array(
        'default'           => '',
        'sanitize_callback' => 'pahoy_sanitize_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( 'facebook', array(
        'type' => 'url',
        'section' => 'pahoy_social_settings',
        'settings' => 'pahoy_social_settings[facebook]',
        'label' => __( 'Facebook', 'pahoy' ),
    ) );

    $wp_customize->add_setting('pahoy_social_settings[twitter]', array(
        'default'           => '',
        'sanitize_callback' => 'pahoy_sanitize_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( 'twitter', array(
        'type' => 'url',
        'section' => 'pahoy_social_settings',
        'settings' => 'pahoy_social_settings[twitter]',
        'label' => __( 'Twitter', 'pahoy' ),
    ) );

    $wp_customize->add_setting('pahoy_social_settings[instagram]', array(
        'default'           => '',
        'sanitize_callback' => 'pahoy_sanitize_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( 'instagram', array(
        'type' => 'url',
        'section' => 'pahoy_social_settings',
        'settings' => 'pahoy_social_settings[instagram]',
        'label' => __( 'Instagram', 'pahoy' ),
    ) );

    $wp_customize->add_setting('pahoy_social_settings[linkedin]', array(
        'default'           => '',
        'sanitize_callback' => 'pahoy_sanitize_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( 'linkedin', array(
        'type' => 'url',
        'section' => 'pahoy_social_settings',
        'settings' => 'pahoy_social_settings[linkedin]',
        'label' => __( 'LinkedIn', 'pahoy' ),
    ) );

    $wp_customize->add_setting('pahoy_social_settings[youtube]', array(
        'default'           => '',
        'sanitize_callback' => 'pahoy_sanitize_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( 'youtube', array(
        'type' => 'url',
        'section' => 'pahoy_social_settings',
        'settings' => 'pahoy_social_settings[youtube]',
        'label' => __( 'YouTube', 'pahoy' ),
    ) );


    $wp_customize->add_section('pahoy_cookie_settings', array(
        'title'    => __('Cookies', 'pahoy'),
        'description' => __('Opciones de Cookies', 'pahoy'),
        'priority' => 176,
    ));

    $wp_customize->add_setting('pahoy_cookie_settings[cookie_text]', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'capability'        => 'edit_theme_options',
        'type'           => 'option'

    ));

    $wp_customize->add_control( 'cookie_text', array(
        'type' => 'textarea',
        'label'    => __('Cookie consent', 'pahoy'),
        'description' => __( 'Texto del Cookie consent.' ),
        'section'  => 'pahoy_cookie_settings',
        'settings' => 'pahoy_cookie_settings[cookie_text]'
    ));

    $wp_customize->add_setting('pahoy_cookie_settings[cookie_link]', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( 'cookie_link', array(
        'type'     => 'dropdown-pages',
        'section' => 'pahoy_cookie_settings',
        'settings' => 'pahoy_cookie_settings[cookie_link]',
        'label' => __( 'Link de Cookies', 'pahoy' ),
    ) );
}

function pahoy_sanitize_url( $url ) {
    return esc_url_raw( $url );
}

add_action( 'wp_footer', 'prefix_customize_output', 100 );

function prefix_customize_output() {
    $footer_options = get_option('pahoy_footer_settings');
    if (isset($footer_options['custom_html'])) {
        if ( $footer_options['custom_html'] === '' ) {
            return;
        }


?>
<script type="text/javascript">
    <?php echo $footer_options['custom_html'] . "\n"; ?>

</script>
<?php

    }
}
