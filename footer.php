<footer class="container-fluid p-0" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
    <div class="row no-gutters">
        <div class="the-footer col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="row no-gutters">
                <div class="footer-overlay col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="container">
                        <div class="row align-items-start">
                            <?php if ( is_active_sidebar( 'sidebar_footer' ) ) : ?>
                            <div class="footer-item col-xl col-lg col-md col-sm-12 col-12">
                                <ul id="sidebar-footer1" class="footer-sidebar">
                                    <?php dynamic_sidebar( 'sidebar_footer' ); ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                            <?php if ( is_active_sidebar( 'sidebar_footer-2' ) ) : ?>
                            <div class="footer-item col-xl col-lg col-md col-sm-12 col-12">
                                <ul id="sidebar-footer2" class="footer-sidebar">
                                    <?php dynamic_sidebar( 'sidebar_footer-2' ); ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                            <?php if ( is_active_sidebar( 'sidebar_footer-3' ) ) : ?>
                            <div class="footer-item col-xl col-lg col-md col-sm-12 col-12">
                                <ul id="sidebar-footer3" class="footer-sidebar">
                                    <?php dynamic_sidebar( 'sidebar_footer-3' ); ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                            <?php if ( is_active_sidebar( 'sidebar_footer-4' ) ) : ?>
                            <div class="footer-item col-xl col-lg col-md col-sm-12 col-12">
                                <ul id="sidebar-footer4" class="footer-sidebar">
                                    <?php dynamic_sidebar( 'sidebar_footer-4' ); ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                            <div class="w-100"></div>
                            <div class="footer-payment col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/payment.png" alt="Payment" class="img-fluid" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copy col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h6>&copy; <?php echo date('Y'); ?> | QueHayPaHoy | <?php _e('Todos los Derechos Reservados', 'pahoy'); ?></h6>
        </div>
    </div>
</footer>
<?php wp_footer() ?>
</body>

</html>
