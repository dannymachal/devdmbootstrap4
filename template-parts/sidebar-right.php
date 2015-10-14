<?php

$rightSidebarSize = devdmbootstrap_column_size('right');

if ($rightSidebarSize != 0) :
    ?>

    <div class="col-sm-<?php echo $rightSidebarSize; ?> dmbs-right">
        <?php dynamic_sidebar( 'dmbs-right-sidebar' ); ?>
    </div>

<?php endif; ?>