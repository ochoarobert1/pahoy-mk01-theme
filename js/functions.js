var lastScrollTop = 0;
jQuery(document).ready(function ($) {
    "use strict";
    jQuery('.btn-cart').on('click', function (e) {
        e.stopPropagation();
        jQuery('.navbar-cart-content').toggleClass('navbar-cart-content-hidden');
    });

    if (jQuery('.custom-slider-products-owl-carousel').length > 0 ) {
        jQuery('.custom-slider-products-owl-carousel').owlCarousel({
            items: 4,
            margin: 30,
            loop: true,
            nav: true,
            dots: false
        });
    }

    jQuery(window).on("scroll", function () {
        var st = jQuery(this).scrollTop();
        st > lastScrollTop ? jQuery(".floating-nav").addClass("is-hidden") : jQuery(window).scrollTop() > 200 ? jQuery(".floating-nav").removeClass("is-hidden") : jQuery(".floating-nav").addClass("is-hidden"),
            lastScrollTop = st,
            0 == jQuery(this).scrollTop() && jQuery(".floating-nav").addClass("is-hidden")
    });

    if (jQuery('.custom-testimonials-slider').length > 0 ) {
        jQuery('.custom-testimonials-slider').owlCarousel({
            items: 3,
            margin: 30,
            loop: true,
            nav: false,
            dots: true
        });
    }

}); /* end of as page load scripts */
