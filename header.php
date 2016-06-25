<?php require_once('wp_bootstrap_navwalker.php'); ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset') ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS2 Feed" href="<?php bloginfo('rss2_url'); ?>" />

    <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <header role="banner">
                    <?php if(has_nav_menu('top-menu')): ?>
                        <nav class="navbar navbar-default" role="navigation">
                            <?php
                                wp_nav_menu(array(
                                    'menu_id'           => 'nav-top-menu',
                                    'theme_location'    => 'top-menu',
                                    'depth'             => 2,
                                    'container'         => 'div',
                                    'container_class'   => 'collapse navbar-collapse',
                                    'menu_class'        => 'nav navbar-nav',
                                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                    'walker'            => new wp_bootstrap_navwalker()
                                ));
                            ?>
                        </nav>
                    <?php endif; ?>
                </header>
            </div>
        </div>
