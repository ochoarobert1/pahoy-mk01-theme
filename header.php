<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
    <?php /* MAIN STUFF */ ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset') ?>" />
    <meta name="robots" content="NOODP, INDEX, FOLLOW" />
    <meta name="HandheldFriendly" content="True" />
    <meta name="MobileOptimized" content="320" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="pingback" href="<?php echo esc_url(get_bloginfo('pingback_url')); ?>" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="dns-prefetch" href="//connect.facebook.net" />
    <link rel="dns-prefetch" href="//facebook.com" />
    <link rel="dns-prefetch" href="//googleads.g.doubleclick.net" />
    <link rel="dns-prefetch" href="//pagead2.googlesyndication.com" />
    <link rel="dns-prefetch" href="//google-analytics.com" />
    <?php /* FAVICONS */ ?>
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png" />
    <?php /* THEME NAVBAR COLOR */ ?>
    <meta name="msapplication-TileColor" content="#009F93" />
    <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/images/win8-tile-icon.png" />
    <meta name="theme-color" content="#009F93" />
    <?php /* AUTHOR INFORMATION */ ?>
    <meta name="language" content="<?php echo get_bloginfo('language'); ?>" />
    <meta name="author" content="QueHayPaHoy" />
    <meta name="copyright" content="http://pahoy.world" />
    <meta name="geo.position" content="10.333333;-67.033333" />
    <meta name="ICBM" content="10.333333, -67.033333" />
    <meta name="geo.region" content="PA" />
    <meta name="geo.placename" content="Panamá" />
    <meta name="DC.title" content="<?php if (is_home()) { echo get_bloginfo('name') . ' | ' . get_bloginfo('description'); } else { echo get_the_title() . ' | ' . get_bloginfo('name'); } ?>" />
    <?php /* MAIN TITLE - CALL HEADER MAIN FUNCTIONS */ ?>
    <?php wp_title('|', false, 'right'); ?>
    <?php wp_head() ?>
    <?php /* OPEN GRAPHS INFO - COMMENTS SCRIPTS */ ?>
    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php /* IE COMPATIBILITIES */ ?>
    <!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7" /><![endif]-->
    <!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8" /><![endif]-->
    <!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9" /><![endif]-->
    <!--[if gt IE 8]><!-->
    <html <?php language_attributes(); ?> class="no-js" />
    <!--<![endif]-->
    <!--[if IE]> <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script> <![endif]-->
    <!--[if IE]> <script type="text/javascript" src="https://cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script> <![endif]-->
    <!--[if IE]> <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" /> <![endif]-->
    <?php get_template_part('includes/fb-script'); ?>
    <?php get_template_part('includes/ga-script'); ?>
</head>
<?php $header_options = get_option('pahoy_header_settings'); ?>

<body class="the-main-body <?php echo join(' ', get_body_class()); ?>" itemscope itemtype="http://schema.org/WebPage">
    <div id="fb-root"></div>
    <header class="container-fluid" role="banner" itemscope itemtype="http://schema.org/WPHeader">
        <div class="row">
            <div class="top-header col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="top-header-left col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6">
                            <div class="top-header-item social-container">
                                <?php $social_options = get_option('pahoy_social_settings'); ?>
                                <?php if (isset($social_options['facebook'])) { ?>
                                <?php if ($social_options['facebook'] != '' ) { ?>
                                <a href="<?php echo esc_url($social_options['facebook']);?>" title="<?php _e('Visítanos us on Facebook', 'maxicon'); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                                <?php } ?>
                                <?php } ?>

                                <?php if (isset($social_options['twitter'])) { ?>
                                <?php if ($social_options['twitter'] != '') { ?>
                                <a href="<?php echo esc_url($social_options['twitter']);?>" title="<?php _e('Visit us on Twitter', 'maxicon'); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                                <?php } ?>
                                <?php } ?>

                                <?php if (isset($social_options['instagram'])) { ?>
                                <?php if ($social_options['instagram'] != '') { ?>
                                <a href="<?php echo esc_url($social_options['instagram']);?>" title="<?php _e('Visit us on Instagram', 'maxicon'); ?>" target="_blank"><i class="fa fa-instagram"></i></a>
                                <?php } ?>
                                <?php } ?>

                                <?php if (isset($social_options['youtube'])) { ?>
                                <?php if ($social_options['youtube'] != '') { ?>
                                <a href="<?php echo esc_url($social_options['youtube']);?>" title="<?php _e('Visit us on YouTube', 'maxicon'); ?>" target="_blank"><i class="fa fa-youtube"></i></a>
                                <?php } ?>
                                <?php } ?>

                                <?php if (isset($social_options['linkedin'])) { ?>
                                <?php if ($social_options['linkedin'] != '') { ?>
                                <a href="<?php echo esc_url($social_options['linkedin']);?>" title="<?php _e('Visit us on LinkedIn', 'maxicon'); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
                                <?php } ?>
                                <?php } ?>
                            </div>
                            <div class="top-header-item email-container">
                                <a href="mailto:<?php echo $header_options['email_address']; ?>" title="<?php _e('¡Envíanos un correo y le asistiremos en cualquier duda!', 'pahoy'); ?>" class="d-xl-inline-block d-lg-inline-block d-md-none d-sm-none d-none"><?php echo $header_options['email_address']; ?></a>
                                <a href="mailto:<?php echo $header_options['email_address']; ?>" title="<?php _e('¡Envíanos un correo y le asistiremos en cualquier duda!', 'pahoy'); ?>" class="d-xl-none d-lg-none d-md-inline-block d-sm-inline-block d-inline-block"><i class="fa fa-envelope-o"></i></a>
                            </div>
                        </div>
                        <div class="top-header-right col-xl-8 col-lg-8 col-md-6 col-sm-6 col-6">
                            <div class="top-header-item extra-buttons-container">
                                <a href="<?php echo home_url('/contacto'); ?>" title="<?php _e('¡Conviertete en Anfitrion!', 'pahoy'); ?>" class="d-xl-inline-block d-lg-inline-block d-md-inline-block d-sm-none d-none"><?php _e('¡Conviertete en Anfitrion!', 'pahoy'); ?></a>
                                <a href="<?php echo home_url('/agregar-eventos'); ?>" title="<?php _e('Agregar Evento', 'pahoy'); ?>" class="d-xl-inline-block d-lg-inline-block d-md-inline-block d-sm-none d-none"><?php _e('Agregar Evento', 'pahoy'); ?></a>
                            </div>
                            <div class="top-header-item number-container">
                                <a href="tel:<?php echo $header_options['phone_number']; ?>" title="<?php _e('¡Llámenos y le asistiremos en cualquier duda!', 'pahoy'); ?>" class="d-xl-inline-block d-lg-inline-block d-md-inline-block d-sm-none d-none"><?php echo $header_options['formatted_phone_number']; ?></a>
                                <a href="tel:<?php echo $header_options['phone_number']; ?>" title="<?php _e('¡Llámenos y le asistiremos en cualquier duda!', 'pahoy'); ?>" class="d-xl-none d-lg-none d-md-none d-sm-inline-block d-inline-block"><i class="fa fa-phone"></i></a>
                            </div>

                            <?php $myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' ); ?>
                            <?php if ( $myaccount_page_id ) { $myaccount_page_url = get_permalink( $myaccount_page_id ); } ?>
                            <?php if (is_user_logged_in()) { ?>
                            <div class="top-header-item account-container">
                                <a href="<?php echo $myaccount_page_url; ?>" title="<?php _e('Haz click aqui para ingresar a mi cuenta', 'pahoy'); ?>"><?php _e('Mi Cuenta', 'pahoy'); ?></a>
                            </div>
                            <?php } else { ?>
                            <div class="top-header-item account-container">
                                <a href="<?php echo $myaccount_page_url; ?>" title="<?php _e('Haz click aqui para iniciar sesión', 'pahoy'); ?>"><?php _e('Iniciar Sesión', 'pahoy'); ?></a>
                            </div>
                            <div class="top-header-item account-container register-container">
                                <a href="<?php echo $myaccount_page_url; ?>" title="<?php _e('Haz click aqui para registrarse', 'pahoy'); ?>"><?php _e('Regístrate', 'pahoy'); ?></a>
                            </div>
                            <?php } ?>
                            <div class="top-header-item lang-container">
                                <select name="lang" id="lang" class="form-control">
                                    <option value="es">Español</option>
                                    <option value="en">English</option>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="the-header col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="navbar-logo col-xl-1 col-lg-1 col-md-6 col-sm-6 col-6">
                            <a href="<?php echo home_url('/');?>" title="<?php echo get_bloginfo('name'); ?>">
                                <?php ?> <?php $custom_logo_id = get_theme_mod( 'custom_logo' ); ?>
                                <?php $image = wp_get_attachment_image_src( $custom_logo_id , 'full' ); ?>
                                <?php if (!empty($image)) { ?>
                                <img src="<?php echo $image[0];?>" alt="<?php echo get_bloginfo('name'); ?>" class="img-fluid img-logo" itemprop="photo" />
                                <?php } ?>
                            </a>
                        </div>
                        <div class="navbar-menu col-9 d-xl-flex d-lg-flex d-md-none d-sm-none d-none">
                            <nav class="navbar navbar-expand-md navbar-light" role="navigation">

                                <!-- Brand and toggle get grouped for better mobile display -->
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <?php
                                    wp_nav_menu( array(
                                        'theme_location'    => 'header_menu',
                                        'depth'             => 2, // 1 = with dropdowns, 0 = no dropdowns.
                                        'container'         => 'div',
                                        'container_class'   => 'collapse navbar-collapse',
                                        'container_id'      => 'bs-example-navbar-collapse-1',
                                        'menu_class'        => 'navbar-nav mr-auto',
                                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                        'walker'            => new WP_Bootstrap_Navwalker()
                                    ) );
                                    ?>

                            </nav>
                        </div>
                        <div class="navbar-button col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6">
                            <a class="btn-cart" title="<?php _e('Ver Carrito de Compras', 'pahoy'); ?>">
                                <i class="fa fa-shopping-cart"></i><span class="badge badge-primary"><?php echo custom_woocommerce_get_cart_quantity(); ?></span>
                            </a>
                            <div class="navbar-cart-content navbar-cart-content-hidden">
                                <?php custom_woocommerce_get_cart(); ?>
                            </div>
                            <a class="btn-search" title="<?php _e('Buscar', 'pahoy'); ?>">
                                <i class="fa fa-search"></i>
                            </a>
                            <a class="btn-menu d-xl-none d-lg-none d-md-inline-block d-sm-inline-block d-inline-block">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                        <div class="navbar-mobile-container navbar-mobile-hidden">
                            <div class="navbar-mobile-container-wrapper">
                                <a href="<?php echo home_url('/');?>" title="<?php echo get_bloginfo('name'); ?>">
                                    <?php ?> <?php $custom_logo_id = get_theme_mod( 'custom_logo' ); ?>
                                    <?php $image = wp_get_attachment_image_src( $custom_logo_id , 'full' ); ?>
                                    <?php if (!empty($image)) { ?>
                                    <img src="<?php echo $image[0];?>" alt="<?php echo get_bloginfo('name'); ?>" class="img-fluid img-logo" itemprop="photo" />
                                    <?php } ?>
                                </a>
                                <?php
                                    wp_nav_menu( array(
                                        'theme_location'    => 'header_menu',
                                        'depth'             => 2, // 1 = with dropdowns, 0 = no dropdowns.
                                        'container'         => 'div'
                                    ) );
                                    ?>
                                <div class="mobile-extra-buttons-container">
                                    <a href="<?php echo home_url('/contacto'); ?>" title="<?php _e('¡Conviertete en Anfitrion!', 'pahoy'); ?>"><?php _e('¡Conviertete en Anfitrion!', 'pahoy'); ?></a>
                                    <a href="<?php echo home_url('/agregar-eventos'); ?>" title="<?php _e('Agregar Evento', 'pahoy'); ?>"><?php _e('Agregar Evento', 'pahoy'); ?></a>

                                    <a href="<?php echo $myaccount_page_url; ?>" title="<?php _e('Haz click aqui para iniciar sesión', 'pahoy'); ?>"><?php _e('Iniciar Sesión', 'pahoy'); ?></a>

                                    <a href="<?php echo $myaccount_page_url; ?>" title="<?php _e('Haz click aqui para registrarse', 'pahoy'); ?>"><?php _e('Regístrate', 'pahoy'); ?></a>
                                </div>
                            </div>
                        </div>
                        <div class="navbar-black-section navbar-black-section-hidden">
                            <div class="btn-menu-close btn-menu-close-hidden">
                                <div class="btn-menu-close-wrapper">
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <nav class="floating-nav menu_scroll_loader is-hidden">
        <div class="floating-nav__inner">
            <header class="container-fluid" role="banner" itemscope itemtype="http://schema.org/WPHeader">
                <div class="row">

                </div>
            </header>
        </div>
    </nav>
    <?php custom_woocommerce_get_cart_quantity(); ?>
