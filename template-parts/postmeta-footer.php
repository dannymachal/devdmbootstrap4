<div class="dmbs-post-meta-footer">

    <?php if( has_category() ) : ?>
        <div class="dmbs-post-meta-categories">
            <?php echo esc_html('Posted in ','devdmbootstrap4'); the_category(', '); ?>
        </div>
    <?php endif; ?>

    <?php if( has_tag() ) : ?>
        <div class="dmbs-post-meta-tags">
            <span class="fa fa-tags"></span> <?php the_tags(); ?>
        </div>
    <?php endif; ?>

</div>