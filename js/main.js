// custom scripts

jQuery(document).ready(function () {

    // OPEN MENU
    var openMenu = function () {
        jQuery('#menu-block').css({'height': jQuery(window).outerHeight() + 100});
        jQuery('.modal-bg').css({'height': jQuery(window).outerHeight() + 100});
        jQuery('.modal-bg').addClass('modal-bg--open');
        jQuery('#menu-block').addClass('open-menu');
        jQuery('#button-menu').addClass('button-menu--open');
        jQuery('body').css({'overflow': 'hidden'});

    };

    // CLOSE MENU
    var closeMenu = function () {
        jQuery('.modal-bg').removeClass('modal-bg--open');
        jQuery('#menu-block').removeClass('open-menu');
        jQuery('#button-menu').removeClass('button-menu--open');
        jQuery('body').removeAttr('style');


    };

    $('#button-menu, .modal-bg').click(function () {
        if (jQuery('#menu-block').hasClass('open-menu')) {
            closeMenu();
        } else {
            openMenu();
        }
    });

    $(window).resize(function () {
        if (jQuery(window).width() > 768) {
            closeMenu();
            jQuery('#menu-block').removeAttr('style');
        }
    });
});


