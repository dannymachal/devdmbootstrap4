<?php

class devdmbootstrap_comment_walker extends Walker_Comment {

	protected function html5_comment( $comment, $depth, $args ) {
		$tag = ( $args['style'] === 'div' ) ? 'div' : 'li';
?>
		<<?php echo esc_html($tag); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children === 1 ? 'has-children media' : ' media' ); ?>>


			<div class="card w-100" id="div-comment-<?php comment_ID(); ?>">
				<div class="card-header">
					<div class="dmbs-comment-author">
						<?php if ( $args['avatar_size'] != 0  ): ?>
						<a href="<?php echo esc_url(get_comment_author_url()); ?>" class="media-object">
							<?php echo get_avatar( $comment, $args['avatar_size'],'mm','', array('class'=>"comment_avatar rounded-circle") ); ?>
						</a>
						<?php endif; ?>
                        <h4 class="media-heading "><?php echo get_comment_author_link() ?></h4>
					</div>
					<div class="comment-metadata">
						<a class="hidden-xs-down" href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>">
							<time class="dmbs-comment-time" datetime="<?php comment_time( 'c' ); ?>">
								<?php comment_date() ?>,
								<?php comment_time() ?>
							</time>
						</a>
					</div><!-- .comment-metadata -->
				</div>
				<div class="card-block warning-color">
					<?php if ( '0' == $comment->comment_approved ) : ?>
					<p class="card-text comment-awaiting-moderation label label-info text-muted small"><?php esc_html_e( 'Your comment is awaiting moderation.' ,'devdmbootstrap4' ); ?></p>
					<?php endif; ?>

					<div class="comment-content card-text">
						<?php comment_text(); ?>
					</div><!-- .comment-content -->

				</div>
                <div class="card-footer dmbs-comment-footer">
                    <ul class="list-inline dmbs-comment-links">
                        <?php edit_comment_link( __( 'Edit','devdmbootstrap4' ), '<li class="edit-link list-inline-item dmbs-comment-edit-link">', '</li>' ); ?>
                        <?php
                        comment_reply_link( array_merge( $args, array(
                            'add_below' => 'div-comment',
                            'depth'     => $depth,
                            'max_depth' => $args['max_depth'],
                            'before'    => '<li class="reply-link list-inline-item dmbs-comment-reply-link">',
                            'after'     => '</li>'
                        ) ) );
                        ?>
                    </ul>
                </div>

            <?php if ($this->has_children === 1) : ?>
                </div>
			</div>
            <?php endif; ?>
<?php
	}
}
