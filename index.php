<?php get_header(); ?>

<div id="main">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
					<div class="entry">
						<?php the_content(); ?>
					</div>
				<?php endwhile; endif; ?>
			</div>
		</div>
	</div>
</div>

<aside id="sidebar">
	<!--<?php get_sidebar(); ?>-->
</aside>

<?php get_footer(); ?>
