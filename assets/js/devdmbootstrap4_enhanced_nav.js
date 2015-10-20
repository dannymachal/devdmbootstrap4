jQuery(function($) {

    //check if the moble toggle bar is visible
    var mobileToggleVisible = $('.navbar-toggler').css('display');

    // Touch Device Detection
    var isTouchDevice = 'ontouchstart' in document.documentElement;

    if ( mobileToggleVisible == 'none' ){

        $('.navbar .dropdown').hover(function() {

            $(this).find('.dropdown-menu').first().stop(true, true).slideToggle(200);

        }, function() {

            $(this).find('.dropdown-menu').first().stop(true, true).slideToggle(100);

        });

    }

    if( !isTouchDevice || mobileToggleVisible != 'none' ) {

        $('.navbar .dropdown > a').click(function(){

            location.href = this.href;

        });
    }

});
