<?php
    $leftSidebarSize = devdmbootstrap_column_size('left');
    if ($leftSidebarSize != 0) :
?>

    <div class="col-md-<?php echo esc_attr($leftSidebarSize); ?> dmbs-left">
        <?php dynamic_sidebar( 'dmbs-left-sidebar' ); ?>
    </div>

<?php endif; ?>