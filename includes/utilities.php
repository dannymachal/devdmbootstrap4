<?php

/**
 * devdmbootstrap4_comment_form_fields
 */
function devdmbootstrap4_comment_form_fields( $fields ) {

    $commenter = wp_get_current_commenter();

    $req      = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;

    $fields   =  array(

        'author' =>
            '<div class="form-group comment-form-author">' .
            '<label for="author">' . __( 'Name', 'devdmbootstrap4' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
            '<input class="form-control" id="author" name="author" type="text" value="' .
            esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',

        'email'  => '<div class="form-group comment-form-email"><label for="email">' . __( 'Email', 'devdmbootstrap4'  ) .
            ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
            '<input class="form-control" id="email" name="email" ' .
            ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' .
            esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',

        'url'    =>
            '<div class="form-group comment-form-url"><label for="url">' . __( 'Website', 'devdmbootstrap4') . '</label> ' .
            '<input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) .
            ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>'
    );

    return $fields;
}
add_filter( 'comment_form_default_fields', 'devdmbootstrap4_comment_form_fields' );

/**
 * devdmbootstrap4_comment_form
 */
function devdmbootstrap4_comment_form( $args ) {
    global $current_user;
    wp_get_current_user();

    $args['cancel_reply_before'] = "<span class='float-right dmbs-comment-cancel-link'>";
    $args['cancel_reply_after']  = "</span>";
    $args['comment_field'] = '
        <div class="form-group comment-form-comment">
            <label for="comment">' . _x( 'Comment', 'noun', 'devdmbootstrap4') . '</label>
            <textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
        </div>
        ';
    $args['class_submit'] = 'btn btn-success btn-sm'; // since WP 4.1
    $args['logged_in_as'] = '<p class="logged-in-as">';
    $args['logged_in_as'] .= sprintf(
        /* translators: %s: Admin URL to profile, Display Name, Logout */
        __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" class="btn btn-sm btn-danger" title="Log out of this account"><span class="fa fa-sign-out"></span> Log out?</a>','devdmbootstrap4' ),
        admin_url( 'profile.php' ),
        $current_user->display_name,
        wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
    ) . '</p>';

    return $args;
}

add_filter( 'comment_form_defaults', 'devdmbootstrap4_comment_form' );

/**
 * devdmbootstrap4_credit_link
 */
function devdmbootstrap4_credit_link() {
    $link = "http://devdm.com";
    return $link;
}

/**
 * devdmbootstrap4_header_background
 */
function devdmbootstrap4_header_background() {
    $headerImage = get_header_image();
    $showHeader  = get_theme_mod('devdmbootstrap4_show_header_setting', 1);
    if ($showHeader && !empty($headerImage)) {
        ?>
        <style type="text/css">
            <?php echo esc_attr(sprintf(".dmbs-header {background-image: url(%s);}", $headerImage)); ?>
        </style>
        <?php
    }
}
add_action('wp_head','devdmbootstrap4_header_background');