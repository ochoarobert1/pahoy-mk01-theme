<!--Footer Starts-->
<footer class="the-footer footer-wrapper no-pad-tb">
    <div class="footer-top-area section-padding">
        <div class="overlay op-9 green"></div>
        <div class="container">
            <div class="row nav-folderized">
                <?php if ( is_active_sidebar( 'sidebar_footer' ) ) : ?>
                <div class="col-lg-3 col-md-12">
                    <ul id="sidebar-footer1">
                        <?php dynamic_sidebar( 'sidebar_footer' ); ?>
                    </ul>
                </div>
                <?php endif; ?>

                <?php if ( is_active_sidebar( 'sidebar_footer-2' ) ) : ?>
                <div class="col-lg-3 col-md-12">
                    <ul id="sidebar-footer2">
                        <?php dynamic_sidebar( 'sidebar_footer-2' ); ?>
                    </ul>
                </div>
                <?php endif; ?>

                <?php if ( is_active_sidebar( 'sidebar_footer-3' ) ) : ?>
                <div class="col-lg-3 col-md-12">
                    <ul id="sidebar-footer3">
                        <?php dynamic_sidebar( 'sidebar_footer-3' ); ?>
                    </ul>
                </div>
                <?php endif; ?>

                <?php if ( is_active_sidebar( 'sidebar_footer-4' ) ) : ?>
                <div class="col-lg-3 col-md-12">
                    <ul id="sidebar-footer4">
                        <?php dynamic_sidebar( 'sidebar_footer-4' ); ?>
                    </ul>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <p>&copy; 2019 QueHayPaHoy. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--Footer ends-->
<?php wp_footer() ?>
</body>

</html>
