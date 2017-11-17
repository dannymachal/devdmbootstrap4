<?php

    $leftSidebarSize = devdmbootstrap_column_size('left');

    if ($leftSidebarSize != 0) :
?>

        <div class="col-md-<?php echo $leftSidebarSize; ?> dmbs-left">
            <?php dynamic_sidebar( 'dmbs-left-sidebar' ); ?>
        </div>

<?php endif; ?>