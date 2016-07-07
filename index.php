<?php get_header(); ?>

<main role="main">
	<?php if(ap_is_loose_layout()): ?><div class="container"><?php endif; ?>
		<div class="row">
			<div class="col-md-8">
				<?php
					get_template_part('content', get_post_format());

					if (comments_open() || get_comments_number()) {
						comments_template();
					}
				?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	<?php if(ap_is_loose_layout()): ?></div><?php endif; ?>
</main>

<?php get_footer(); ?>
