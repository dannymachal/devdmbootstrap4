<?php

// If this was a search we display a page header with the results count. If there were no results we display the search form.
if (is_search()) : ?>
    <h2 class='dmbs-search-header'>
        <?php
            $total_results = $wp_query->found_posts;
            /* translators: %1$1s: Total Results, %2$2s The Search Query */
            echo esc_html(sprintf( __('%1$1s Search Results for "%2$2s"','devdmbootstrap4'),  $total_results, get_search_query() ));
        ?>
    </h2>

    <?php
        if ($total_results == 0) :
            get_search_form(true);
        endif;

endif;

?>