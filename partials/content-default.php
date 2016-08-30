<article id="entry-<?php the_ID(); ?>" <?php post_class('entry'); ?>
         role="article" itemscope itemtype="http://schema.org/BlogPosting">
	<header class="entry-header">
		<h1 class="entry-title" itemprop="headline"><?php the_title(); ?></h1>

		<?php if(!is_front_page() && !is_page()): ?>
			<ul class="entry-meta">
				<li class="entry-date">
					<?php the_time(get_option('date_format')); ?>
				</li>
				<?php if (has_category()): ?>
					<li class="entry-category">
						<?php the_category(', '); ?>
					</li>
				<?php endif; ?>
				<li class="entry-comments">
					<?php comments_number(
						__('No comments', 'affiliate-theme'),
						__('One comment', 'affiliate-theme'),
						__('%s comments', 'affiliate-theme')
					); ?>
				</li>
			</ul>
		<?php endif; ?>
	</header>

	<?php if (has_post_thumbnail()): ?>
		<div class="entry-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>
	<?php endif; ?>

	<div class="entry-body" itemprop="articleBody">
		<?php the_content(); ?>
	</div>

	<?php if(!is_front_page() && !is_page()): ?>
		<footer class="entry-footer">
			<?php the_tags('<p class="tags">', ' ', '</p>'); ?>
		</footer>
	<?php endif; ?>
</article>
