<article id="entry-<?php the_ID(); ?>" <?php post_class('entry'); ?> role="article"
         itemscope itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
	<header class="entry-header">
		<h1 class="entry-title" itemprop="headline">
			<?php the_title(); ?>
		</h1>

		<?php if(!is_front_page() && !is_page()): ?>
			<ul class="entry-meta">
				<li class="entry-date" itemprop="datePublished">
					<?php the_time(get_option('date_format')); ?>
				</li>

				<?php if (has_category()): ?>
					<li class="entry-category" rel="category">
						<?php the_category(', '); ?>
					</li>
				<?php endif; ?>

				<?php if(get_the_author() !== null): ?>
					<li class="entry-author" itemscope
					    itemtype="http://schema.org/Person" itemprop="author">
						<?php the_author(); ?>
					</li>
				<?php endif; ?>
			</ul>
		<?php endif; ?>
	</header>

	<?php if (has_post_thumbnail()): ?>
		<div class="entry-thumbnail" itemprop="image">
			<?php the_post_thumbnail(); ?>
		</div>
	<?php endif; ?>

	<?php if(get_the_content() !== ''): ?>
		<section class="entry-body" itemprop="text">
			<?php the_content(); ?>
		</section>
	<?php endif; ?>

	<?php if(!is_front_page() && !is_page()): ?>
		<footer class="entry-footer">
			<?php the_tags(
				'<p class="entry-tags"><span class="label label-default label-md" rel="tag">',
				'</span><span class="label label-default label-md" rel="tag">',
				'</span></p>');
			?>
		</footer>
	<?php endif; ?>
</article>
