<?php

//if this was a search we display a page header with the results count. If there were no results we display the search form.
if (is_search()) :

    $total_results = $wp_query->found_posts;

    echo "<h2 class='dmbs-search-header'>" . sprintf( __('%s Search Results for "%s"','devdmbootstrap4'),  $total_results, get_search_query() ) . "</h2>";

    if ($total_results == 0) :
        get_search_form(true);
    endif;

endif;

?>