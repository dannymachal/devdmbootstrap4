<?php

    $showCreditSetting = get_theme_mod('devdmbootstrap4_show_credit_setting');

    if ($showCreditSetting == 1) : ?>

        <div class="container dmbs-author-credits">
            <div class="row">
                <div class="col-sm-12">
                    <p><a href="http://devdm.com">DevDmBootstrap4 Created by Danny Machal (DevDm.com)</a></p>
                </div>
            </div>
        </div>

    <?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>