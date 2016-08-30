
<!--
    <?php
    if (function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('<p id="breadcrumbs">','</p>');
    }
    ?>-->
    <footer class="footer" role="contentinfo"
            itemscope itemtype="http://schema.org/WPFooter">
        <?php if(affilicious_theme_is_loose_layout()): ?><div class="container"><?php endif; ?>
            <div class="clearfix">
                <div class="footer-logo">
                    <a href="<?php home_url('/'); ?>"><?php bloginfo('name') ?></a>
                </div>

                <?php if(affilicious_theme_has_footer_1_menu()): ?>
                    <?php affilicious_theme_footer_1_menu(); ?>
                <?php endif; ?>

                <?php if(affilicious_theme_has_footer_2_menu()): ?>
                    <?php affilicious_theme_footer_2_menu(); ?>
                <?php endif; ?>

                <?php if(affilicious_theme_has_footer_3_menu()): ?>
                    <?php affilicious_theme_footer_3_menu(); ?>
                <?php endif; ?>

                <?php if(affilicious_theme_has_footer_4_menu()): ?>
                    <?php affilicious_theme_footer_4_menu(); ?>
                <?php endif; ?>
            </div>
            <div class="footer-copyright text-center">Copyright 2016 Projekt Affiliate Theme</div>
        <?php if(affilicious_theme_is_loose_layout()): ?></div><?php endif; ?>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
