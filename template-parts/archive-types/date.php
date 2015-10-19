<?php
    if ( is_day() ) :
        printf( __( 'Daily Archives: %s', 'devdmbootstrap4' ), get_the_date() );

    elseif ( is_month() ) :
        printf( __( 'Monthly Archives: %s', 'devdmbootstrap4' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'devdmbootstrap4' ) ) );

    elseif ( is_year() ) :
        printf( __( 'Yearly Archives: %s', 'devdmbootstrap4' ), get_the_date( _x( 'Y', 'yearly archives date format', 'devdmbootstrap4' ) ) );

    else :
        _e( 'Archives', 'devdmbootstrap4' );

    endif;
?>