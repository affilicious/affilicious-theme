<article id="entry-<?php the_ID(); ?>" <?php post_class('entry'); ?>
		 role="article" itemscope itemtype="http://schema.org/BlogPosting">

	<header class="entry-header">
		<?php get_template_part('partials/entry/header'); ?>
	</header>

	<div class="entry-teaser">
		<?php get_template_part('partials/entry/teaser'); ?>
	</div>

	<section class="entry-body" itemprop="text">
		<?php get_template_part('partials/entry/body'); ?>
	</section>
</article>
