jQuery(document).ready(function ($) {
    "use strict";
    jQuery('.btn-cart').on('click', function(e) {
        e.stopPropagation();
        jQuery('.navbar-cart-content').toggleClass('navbar-cart-content-hidden');
    });
}); /* end of as page load scripts */
