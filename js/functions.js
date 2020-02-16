var lastScrollTop = 0;
jQuery(document).ready(function ($) {
    "use strict";

    var elem = (document.compatMode === "CSS1Compat") ?
        document.documentElement :
        document.body;

    var height = elem.clientHeight;
    var width = elem.clientWidth;

    //    alert('h: ' + elem.clientHeight + 'w:' + elem.clientWidth);

    jQuery('.btn-cart').on('click', function (e) {
        e.stopPropagation();
        jQuery('.navbar-cart-content').toggleClass('navbar-cart-content-hidden');
    });

    jQuery('.btn-menu').on('click', function (e) {
        e.stopPropagation();
        jQuery('.navbar-mobile-container').toggleClass('navbar-mobile-hidden');
        jQuery('.navbar-black-section').toggleClass('navbar-black-section-hidden');
        jQuery('.btn-menu-close').toggleClass('btn-menu-close-hidden');
    });

    jQuery('.btn-menu-close').on('click', function (e) {
        e.stopPropagation();
        jQuery('.navbar-mobile-container').toggleClass('navbar-mobile-hidden');
        jQuery('.navbar-black-section').toggleClass('navbar-black-section-hidden');
        jQuery('.btn-menu-close').toggleClass('btn-menu-close-hidden');
    });

    jQuery('.navbar-black-section').on('click', function (e) {
        e.stopPropagation();
        jQuery('.navbar-mobile-container').toggleClass('navbar-mobile-hidden');
        jQuery('.navbar-black-section').toggleClass('navbar-black-section-hidden');
        jQuery('.btn-menu-close').toggleClass('btn-menu-close-hidden');
    });

    jQuery(document).on('click', '.menu-item-has-children a', function (e) {
        jQuery(this).toggleClass('nav-link-open');
        jQuery(this).next('.sub-menu').toggleClass('sub-menu-open');
    });

    if (jQuery('.custom-category-slider').length > 0) {
        jQuery('.custom-category-slider').owlCarousel({
            items: 8,
            margin: 15,
            loop: true,
            nav: true,
            dots: false,
            autoplay: true,
            responsive: {
                0: {
                    items: 2,
                },
                413: {
                    items: 2,
                },
                600: {
                    items: 3,
                },
                768: {
                    items: 4,
                },
                1170: {
                    items: 6,
                },
                1171: {
                    items: 8,
                }
            }
        });
    }

    if (jQuery('.custom-slider-products-owl-carousel').length > 0) {
        jQuery('.custom-slider-products-owl-carousel').owlCarousel({
            items: 4,
            margin: 30,
            loop: true,
            nav: true,
            dots: false,
            autoplay: true,
            responsive: {
                0: {
                    items: 1,
                },
                413: {
                    items: 2,
                },
                600: {
                    items: 2,
                },
                768: {
                    items: 3,
                },
                1000: {
                    items: 4,
                }
            }
        });
    }

    if (jQuery('.custom-taxonomy-boxes-slider').length > 0) {
        jQuery('.custom-taxonomy-boxes-slider').owlCarousel({
            items: 5,
            margin: 20,
            loop: true,
            nav: true,
            dots: false,
            autoplay: true,
            responsive: {
                0: {
                    items: 1,
                },
                413: {
                    items: 2,
                },
                600: {
                    items: 2,
                },
                768: {
                    items: 3,
                },
                1000: {
                    items: 4,
                },
                1171: {
                    items: 5,
                }
            }
        });
    }

    jQuery(window).on("scroll", function () {
        var st = jQuery(this).scrollTop();
        st > lastScrollTop ? jQuery(".floating-nav").addClass("is-hidden") : jQuery(window).scrollTop() > 200 ? jQuery(".floating-nav").removeClass("is-hidden") : jQuery(".floating-nav").addClass("is-hidden"),
            lastScrollTop = st,
            0 == jQuery(this).scrollTop() && jQuery(".floating-nav").addClass("is-hidden")
    });

    if (jQuery('.custom-testimonials-slider').length > 0) {
        jQuery('.custom-testimonials-slider').owlCarousel({
            items: 3,
            margin: 30,
            loop: true,
            nav: false,
            dots: true,
            autoplay: true,
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                1000: {
                    items: 3,
                }
            }
        });
    }

}); /* end of as page load scripts */
