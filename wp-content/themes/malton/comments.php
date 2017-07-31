
<div class="comments-block">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
				<h2 class="comment-title text-center">Комментарии</h2>
				<ul class="comment-list">
				 <?php wp_list_comments(array('type' => 'comment', 'callback' => 'new_theme_comment' )); ?>
				</ul>
			</div>
		</div>
	</div>


			<?php 
			function new_theme_comment($comment, $args, $depth){
			   $GLOBALS['comment'] = $comment; ?>
			   
				<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
					<div class="item">
						<div class="row top-part">
							<div class="col-sm-6 col-xs-12 title">
								<?php echo get_comment_author_link() ?>
							</div>
							<div class="col-sm-3 col-xs-6 text-center text-left-xs">
								<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
							</div>
							<div class="col-sm-3 col-xs-6 comment-date">
								<?php echo get_comment_date('d.m.Y'); ?>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">	
								<div class="text">
									<?php comment_text() ?>
								</div>
							</div>
						</div>
					</div>
			<?php
			}
			?>


				
			<?php
			$defaults = array(
				'logged_in_as'         => '<div class="container"><div class="row">',
				'fields' => array(
						'author' => '
						<div class="container">
						<div class="row">
							<div class="col-sm-4 col-sm-offset-2 col-xs-12 col-xs-offset-0">
								<div class="form-group">
									<div class="wrap-form-control">' .
										'<input id="author" class="form-control big-height" placeholder="Введите ваше имя *" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' />
										<span class="additional-placeholder">Ваше имя</span>
									</div>
								</div>',
								
								'email'  => '
								<div class="form-group">
									<div class="wrap-form-control">' .
										'<input id="email" class="form-control big-height" name="email" placeholder="Введите ваш email *" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req  . ' />
										<span class="additional-placeholder">Ваш email <span>*</span></span>
									</div>
								</div>',
								
								'url'  => '
								<div class="form-group">
									<div class="wrap-form-control">' .
										'<input id="url" class="form-control big-height" name="url" placeholder="Ваш сайт, если есть" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_url'] ) . '" size="30" aria-describedby="url-notes"' . $aria_req . $html_req  . ' />
										<span class="additional-placeholder">Ваш сайт</span>
									</div>
								</div>
								
										
							</div>',
					),
				'comment_field'        => '<div class="col-sm-4 col-xs-12"><div class="form-group"><div class="wrap-form-control"><textarea placeholder="Введите текст комментария" id="comment" class="form-control big-height" name="comment"  aria-required="true" required="required"></textarea><span class="additional-placeholder">Ваш комментарий</span></div></div>',
				'must_log_in'          => '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
				'comment_notes_before' => '',
				'comment_notes_after'  => '',
				'id_form'              => 'commentform',
				'id_submit'            => 'submit',
				'class_form'           => 'comment-form',
				'title_reply'          => 'Оставить комментарий',
				'title_reply_to'       => '<div class="text-uppercase">Оставить комментарий для</div><div class="wrap-a">%s</div>',
				'title_reply_before'   => '<div id="reply-title" class="comment-reply-title h2">',
				'title_reply_after'    => '</div>',
				'cancel_reply_before'  => ' <div class="wrap-a">',
				'cancel_reply_after'   => '</div>',
				'cancel_reply_link'    => __( 'Cancel reply' ),
				'label_submit'         => 'Отправить',
				'class_submit'         => 'btn btn-black btn-block text-uppercase btn-transparent-2',
				'name_submit'          => 'submit',
				'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
				'submit_field'         => '%1$s %2$s</div></div></div>',
				'format'               => 'xhtml',
			);

			comment_form( $defaults );
?>
</div>
