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
                    <?php if(has_nav_menu('bottom-menu')): ?>
                        <div class="col-md-6 col-xs-12">
                            <?php
                                wp_nav_menu(array(
                                    'menu'              => 'footer_links',
                                    'theme_location'    => 'bottom-menu',
                                    'depth'             => 2,
                                    'container'         => 'nav',
                                    'container_class'   => 'navbar-collapse',
                                    'container_id'      => 'bottom-menu',
                                    'menu_class'        => 'nav navbar-nav',
                                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                    'walker'            => new wp_bootstrap_navwalker()
                                ));
                            ?>
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
