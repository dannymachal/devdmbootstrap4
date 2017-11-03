<?php if (get_theme_mod('devdmbootstrap4_show_credit_setting', 1)) : ?>

    <div class="container dmbs-author-credits">
        <div class="row">
            <div class="col-12">
                <p><a href="<?php echo esc_url(devdmbootstrap4_credit_link()); ?>"><?php _e('DevDmBootstrap4 Created by Danny Machal (DevDm.com)','devdmbootstrap4'); ?></a></p>
            </div>
        </div>
    </div>

<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>