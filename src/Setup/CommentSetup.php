<?php
namespace Affilicious\Theme\Setup;

if(!defined('ABSPATH')) exit('Not allowed to access pages directly.');

class CommentSetup
{
	/**
	 * Set the support for html5 in the comments
	 *
	 * @since 0.3.4
	 */
	public function setThemeSupport()
	{
		add_theme_support( 'html5', array('comment-list'));
	}

	/**
	 * Set the form default fields for author, email and url
	 *
	 * @since 0.3.4
	 * @param array $fields
	 * @return array
	 */
	function setFormDefaultFields($fields) {
		$commenter = wp_get_current_commenter();

		$req      = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
		$html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;

		$fields   =  array(
			'author' => '<div class="form-group comment-form-author">' . '<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
			            '<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
			'email'  => '<div class="form-group comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
			            '<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
			'url'    => '<div class="form-group comment-form-url"><label for="url">' . __( 'Website' ) . '</label> ' .
			            '<input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>'
		);

		return $fields;
	}

	/**
	 * Set the form default field for the message
	 *
	 * @since 0.3.4
	 * @param array $args
	 * @return array
	 */
	function setFormDefaults($args) {
		$args['comment_field'] = '
		<div class="form-group comment-form-comment">
            <label for="comment">' . _x( 'Comment', 'noun' ) . '</label> 
            <textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
        </div>';

		$args['class_submit'] = 'btn btn-primary'; // since WP 4.1

		return $args;
	}
}
