<?php
    $curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
?>

<div class="row dmbs-author-page-header">

    <div class="col-sm-6 dmbs-author-page-avatar text-center">
        <?php echo get_avatar( $curauth->ID, 250, '', '', array('class' => 'img-circle') ); ?>
    </div>

    <div class="col-sm-6 dmbs-author-page-meta">

        <?php if ($displayname = get_the_author_meta('display_name',$curauth->ID)) : ?>
            <h1 class="dmbs-author-display-name"><?php echo esc_html($displayname); ?></h1>
        <?php endif; ?>

        <?php if ($authorurl = get_the_author_meta('user_url',$curauth->ID)) : ?>
            <p class="dmbs-author-url"><a href="<?php echo esc_url($authorurl); ?>"><?php echo esc_url($authorurl); ?></a></p>
        <?php endif; ?>

        <?php if ($authorDescription = get_the_author_meta('description',$curauth->ID)) : ?>
            <p class="dmbs-author-description"><?php echo esc_html($authorDescription); ?></p>
        <?php endif; ?>

        <?php if ($authoryim = get_the_author_meta('yim',$curauth->ID)) : ?>
            <p class="dmbs-author-yim"><?php echo esc_html($authoryim); ?></p>
        <?php endif; ?>

        <?php if ($authorjabber = get_the_author_meta('jabber',$curauth->ID)) : ?>
            <p class="dmbs-author-jabber"><?php echo esc_html($authorjabber); ?></p>
        <?php endif; ?>

    </div>

</div>