<footer id="footer" class="footer" role="contentinfo"
		itemscope itemtype="http://schema.org/WPFooter">

	<?php if (function_exists('yoast_breadcrumb')): ?>
		<div class="footer-breadcrumbs">
			<div class="container">
				<?php yoast_breadcrumb('<nav aria-label="breadcrumb" role="navigation">', '</nav>'); ?>
			</div>
		</div>
	<?php endif; ?>

	<div class="footer-top">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="footer-logo">
						<a href="<?php home_url('/'); ?>"><?php bloginfo('name') ?></a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="footer-text">
						<h4>Über uns</h4>
						<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolo<p>
					</div>
				</div>
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="footer-navigation">
						<div style="display: inline-block; width: 45%;">
							<?php if (afft_has_bottom_1_menu()): ?>
								<?php afft_bottom_1_menu(); ?>
							<?php endif; ?>
						</div>
						<div style="display: inline-block; width: 45%;">
							<?php if (afft_has_bottom_2_menu()): ?>
								<?php afft_bottom_2_menu(); ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12 flex-xs-middle">
					<div class="footer-copyright">
						<?php echo get_theme_mod('afft-information-copyright-text'); ?>
						<ul>
							<li><a href="#">Impressum</a></li>
							<li><a href="#">AGB</a></li>
							<li><a href="#">Kontakt</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12 flex-xs-middle">
					<div class="footer-social">
						<a href="#" class="social-button facebook"><i class="fa fa-facebook"></i></a>
						<a href="#" class="social-button twitter"><i class="fa fa-twitter"></i></a>
						<a href="#" class="social-button google"><i class="fa fa-google-plus"></i></a>
						<a href="#" class="social-button pinterest"><i class="fa fa-pinterest"></i></a>
						<a href="#" class="social-button reddit"><i class="fa fa-reddit"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>


<?php wp_footer(); ?>
</body>
</html>
