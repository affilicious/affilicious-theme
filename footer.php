<footer id="footer" class="footer" role="contentinfo"
        itemscope itemtype="http://schema.org/WPFooter">

	<?php if (function_exists('yoast_breadcrumb')): ?>
		<div class="footer-breadcrumbs">
			<div class="container">
				<?php yoast_breadcrumb('<nav aria-label="breadcrumb" role="navigation">', '</nav>'); ?>
			</div>
		</div>
	<?php endif; ?>

	<div class="footer-content">
		<div class="container">
			<div class="clearfix">
				<div class="footer-logo">
					<a href="<?php home_url('/'); ?>"><?php bloginfo('name') ?></a>
				</div>

				<div id="bottom-menu">
					<?php if (afft_has_bottom_1_menu()): ?>
						<?php afft_bottom_1_menu(); ?>
					<?php endif; ?>

					<?php if (afft_has_bottom_2_menu()): ?>
						<?php afft_bottom_2_menu(); ?>
					<?php endif; ?>

					<?php if (afft_has_bottom_3_menu()): ?>
						<?php afft_bottom_3_menu(); ?>
					<?php endif; ?>

					<?php if (afft_has_bottom_4_menu()): ?>
						<?php afft_bottom_4_menu(); ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="footer-copyright text-center">
				<?php echo get_theme_mod('general-copyright-text'); ?>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
