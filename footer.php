<footer id="footer" class="footer" role="contentinfo"
        itemscope itemtype="http://schema.org/WPFooter">

	<?php if (function_exists('yoast_breadcrumb')): ?>
		<div class="footer-breadcrumbs">
			<?php if(affilicious_theme_is_loose_layout()): ?><div class="container"><?php endif; ?>
				<?php yoast_breadcrumb('<nav aria-label="breadcrumb" role="navigation">', '</nav>'); ?>
			<?php if (affilicious_theme_is_loose_layout()): ?></div><?php endif; ?>
		</div>
	<?php endif; ?>

	<div class="footer-content">
		<?php if (affilicious_theme_is_loose_layout()): ?><div class="container"><?php endif; ?>
			<div class="clearfix">
				<div class="footer-logo">
					<a href="<?php home_url('/'); ?>"><?php bloginfo('name') ?></a>
				</div>

				<div id="bottom-menu">
					<?php if (affilicious_theme_has_bottom_1_menu()): ?>
						<?php affilicious_theme_bottom_1_menu(); ?>
					<?php endif; ?>

					<?php if (affilicious_theme_has_bottom_2_menu()): ?>
						<?php affilicious_theme_bottom_2_menu(); ?>
					<?php endif; ?>

					<?php if (affilicious_theme_has_bottom_3_menu()): ?>
						<?php affilicious_theme_bottom_3_menu(); ?>
					<?php endif; ?>

					<?php if (affilicious_theme_has_bottom_4_menu()): ?>
						<?php affilicious_theme_bottom_4_menu(); ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="footer-copyright text-center">
				<?php echo get_theme_mod('general-copyright-text'); ?>
			</div>
		<?php if (affilicious_theme_is_loose_layout()): ?></div><?php endif; ?>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
