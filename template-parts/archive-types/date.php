<h1 class="dmbs-category-archive-date">
    <?php
        if ( is_day() ) :
            /* translators: %s: The Day */
            echo esc_html(sprintf( __( 'Daily Archives %s', 'devdmbootstrap4' ), get_the_date() ));

        elseif ( is_month() ) :
            /* translators: %s: The month */
            echo esc_html(sprintf( __( 'Monthly Archives %s', 'devdmbootstrap4' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'devdmbootstrap4' ) ) ) );

        elseif ( is_year() ) :
            /* translators: %s: The year */
            echo esc_html(sprintf( __( 'Yearly Archives %s', 'devdmbootstrap4' ), get_the_date( _x( 'Y', 'yearly archives date format', 'devdmbootstrap4' ) ) ));

        else :
            esc_html_e( 'Archives', 'devdmbootstrap4' );

        endif;
    ?>
</h1>