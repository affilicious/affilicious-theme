<?php
namespace Affilicious\Theme\Design\Domain\Walker;

if(!defined('ABSPATH')) {
	exit('Not allowed to access pages directly.');
}

/**
 * A custom WordPress comment walker class to implement the Bootstrap 3 Media object in wordpress comment list.
 *
 * @package     WP Bootstrap Comment Walker
 * @version     1.0.0
 * @author      Edi Amin <to.ediamin@gmail.com>
 * @license     http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link        https://github.com/ediamin/wp-bootstrap-comment-walker
 */
class Bootstrap_Comment_Walker extends \Walker_Comment
{
	/**
	 * Output a comment in the HTML5 format.
	 *
	 * @access protected
	 * @since 1.0.0
	 *
	 * @see wp_list_comments()
	 *
	 * @param object $comment Comment to display.
	 * @param int $depth Depth of comment.
	 * @param array $args An array of arguments.
	 */
	protected function html5_comment($comment, $depth, $args)
	{
		$tag = ('div' === $args['style']) ? 'div' : 'li';
		?>
		<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class($this->has_children ? 'parent media' : 'media'); ?>
		 itemprop="comment" itemscope itemtype="http://schema.org/UserComments">

		<?php if (0 != $args['avatar_size']): ?>
		<div class="media-left">
			<a href="<?php echo get_comment_author_url(); ?>" class="media-object">
				<?php echo get_avatar($comment, $args['avatar_size']); ?>
			</a>
		</div>
	<?php endif; ?>

		<div class="media-body">

			<ul class="comment-meta media-heading">
				<li class="comment-author" itemprop="creator"
				    itemscope itemtype="http://schema.org/Person">
					<?php echo get_comment_author_link(); ?>
				</li>
				<li class="comment-date">
					<time class="text-muted" datetime="<?php comment_time('c'); ?>" temprop="commentTime">
						<?php printf(_x('%1$s', 'date'), get_comment_date()); ?>
					</time>
				</li>
			</ul>

			<?php if ('0' == $comment->comment_approved) : ?>
				<p class="comment-awaiting-moderation label label-default"><?php _e('Your comment is awaiting moderation.'); ?></p>
			<?php endif; ?>

			<div class="comment-content" itemprop="commentText">
				<?php comment_text(); ?>
			</div>

			<ul class="list-inline">
				<?php edit_comment_link(__('Edit'), '<li class="edit-link">', '</li>'); ?>

				<?php
				comment_reply_link(array_merge($args, array(
					'add_below' => 'div-comment',
					'depth'     => $depth,
					'max_depth' => $args['max_depth'],
					'before'    => '<li class="reply-link">',
					'after'     => '</li>'
				)));
				?>
			</ul>
		</div>
		<?php
	}
}
