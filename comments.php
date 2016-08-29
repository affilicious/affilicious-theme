<?php
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
	return;
}
?>

<div class="comments">
	<?php if (have_comments()) : ?>
		<h2 class="comments-title">
			<?php
			echo sprintf(_n(
				'1 Comment',
				'%s Comments',
				get_comments_number(),
				'affilicious-theme'
			), number_format_i18n(get_comments_number()));
			?>
		</h2>

		<ul class="comments-list list-unstyled">
			<?php affilicious_theme_list_comments(); ?>
		</ul>
	<?php endif; ?>

	<?php if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')): ?>
		<div class="comments-closed">
			<div class="alert alert-info">

				<?php _e('Comments are closed.'); ?>
			</div>
		</div>
	<?php else: ?>
		<?php comment_form(); ?>
	<?php endif; ?>
</div>
