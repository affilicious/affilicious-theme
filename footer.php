    <footer id="footer" role="contentinfo">
        <div id="bottom-bar">
            <?php if(ap_is_loose_layout()): ?><div class="container"><?php endif; ?>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <?php
                            if (function_exists('yoast_breadcrumb') ) {
                                yoast_breadcrumb('<p id="breadcrumbs">','</p>');
                            }
                        ?>
                    </div>
                    <?php if(ap_has_bottom_navigation()): ?>
                        <div class="col-md-6 col-xs-12">
                            <?php ap_bottom_navigation(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php if(ap_is_loose_layout()): ?></div><?php endif; ?>
        </div>
        <div id="copyright">
            <p>Copyright 2016 Projekt Affiliate Theme</p>
        </div>
    </footer>
    <?php if(ap_is_tight_layout()): ?></div><?php endif; ?>
    <?php wp_footer(); ?>
</body>
</html>
