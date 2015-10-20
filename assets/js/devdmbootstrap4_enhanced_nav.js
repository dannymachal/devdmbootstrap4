jQuery(function($) {

    // Check if the mobile toggle bar is visible.
    var mobileToggleVisible = $('.dmbs-header-navbar .navbar-toggler').css('display');

    // Determine if this is a Touch Enabled Device.
    var isTouchDevice = 'ontouchstart' in document.documentElement;

    /*
        Test for the mobile menu toggle being hidden and determine this IS NOT a touch device. With these two conditions
        this is most likely a mouse pointer enabled device that can handle hover events.
     */

    if ( mobileToggleVisible == 'none' && !isTouchDevice){

        $('.dmbs-header-navbar.navbar .dropdown, .dmbs-footer-navbar.navbar .dropdown').hover(function() {

            $(this).find('.dropdown-menu').first().stop(true, true).slideToggle(200);

        }, function() {

            $(this).find('.dropdown-menu').first().stop(true, true).slideToggle(100);

        });

        //allow the drop down parents to be clickable links.
        $('.dmbs-header-navbar.navbar .dropdown > a, .dmbs-footer-navbar.navbar .dropdown > a').click(function(){

            location.href = this.href;

        });

    }

    /*
        Detect if the mobile toggle button IS showing and allow the parent drop down items to be clickable links. This is mostly to handle
        tablet devices who can potentially display a regular menu in landscape mode and then the mobile menu when in portrait mode.
     */

    if( mobileToggleVisible != 'none' ) {

        $('.dmbs-header-navbar.navbar .dropdown > a, .dmbs-footer-navbar.navbar .dropdown > a').click(function(){

            location.href = this.href;

        });
    }

});
