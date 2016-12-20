<footer id="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">

	<?php if (afft_has_breadcrumbs()): ?>
		<div id="footer-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<?php afft_the_breadcrumbs(); ?>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<div id="footer-content">
		<div class="container">
			<div class="row">
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="row">
						<div class="col-xs-12">
							<div id="footer-about-us">
								<h4>Über uns</h4>
								<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.<p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-5 col-lg-6 col-md-6 col-sm-12 col-xs-12 offset-xl-1">
					<div class="row">
						<div class="col-md-6">
							<?php if (afft_has_footer_content_first_menu()): ?>
								<nav id="footer-content-first-menu">
									<?php afft_the_footer_content_first_menu(); ?>
								</nav>
							<?php endif; ?>
						</div>

						<div class="col-md-6">
							<?php if (afft_has_footer_content_second_menu()): ?>
								<nav id="footer-content-second-menu">
									<?php afft_the_footer_content_second_menu(); ?>
								</nav>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="footer-plinth">
		<div class="container">
			<div class="row">
				<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
					<?php if(afft_has_copyright()): ?>
						<small id="footer-copyright">
							<?php afft_the_copyright() ?>
						</small>
					<?php endif; ?>

					<?php if (afft_has_footer_plinth_menu()): ?>
						<nav id="footer-plinth-menu">
							<?php afft_the_footer_plinth_menu(); ?>
						</nav>
					<?php endif; ?>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12">
					<div id="footer-social">
						<?php if(afft_has_facebook_link()): ?>
							<a href="<?php afft_the_facebook_link(); ?>" class="social-btn facebook"><i class="fa fa-facebook"></i></a>
						<?php endif; ?>

						<?php if(afft_has_twitter_link()): ?>
							<a href="<?php afft_the_twitter_link(); ?>" class="social-btn twitter"><i class="fa fa-twitter"></i></a>
						<?php endif; ?>

						<?php if(afft_has_google_plus_link()): ?>
							<a href="<?php afft_the_google_plus_link(); ?>" class="social-btn google-plus"><i class="fa fa-google-plus"></i></a>
						<?php endif; ?>

						<?php if(afft_has_pinterest_link()): ?>
							<a href="<?php afft_the_pinterest_link(); ?>" class="social-btn pinterest"><i class="fa fa-pinterest"></i></a>
						<?php endif; ?>

						<?php if(afft_has_reddit_link()): ?>
							<a href="<?php afft_the_reddit_link(); ?>" class="social-btn reddit"><i class="fa fa-reddit"></i></a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>

</footer>

<?php wp_footer(); ?>
</body>
</html>
