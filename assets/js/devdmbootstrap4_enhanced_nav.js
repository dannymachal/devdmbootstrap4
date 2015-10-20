jQuery(function($) {

    if ( $('.navbar-toggler').css('display') == 'none' ){

        $('.navbar .dropdown').hover(function() {

            $(this).find('.dropdown-menu').first().stop(true, true).slideToggle(200);

        }, function() {

            $(this).find('.dropdown-menu').first().stop(true, true).slideToggle(100);

        });

        $('.navbar .dropdown > a').click(function(){

            location.href = this.href;

        });

    }

});
