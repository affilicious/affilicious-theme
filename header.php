<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset') ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS2 Feed" href="<?php bloginfo('rss2_url'); ?>" />

    <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
    <header id="top-bar" role="banner">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 id="title" class="display-4"><?php bloginfo('name') ?></h1>
                    <p id="slogan" class="lead text-muted"><?php bloginfo('description') ?></p>
                </div>
            </div>
        </div>
        <?php if(has_nav_menu('top-menu')): ?>
            <nav class="navbar navbar-default" role="navigation">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#top-menu">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <!--<a class="navbar-brand" href="<?php echo home_url(); ?>">
                                    <?php bloginfo('name'); ?>
                                </a>-->
                            </div>
                            <?php
                                wp_nav_menu(array(
                                    'menu_id'           => 'nav-top-menu',
                                    'theme_location'    => 'top-menu',
                                    'depth'             => 2,
                                    'container'         => 'div',
                                    'container_class'   => 'collapse navbar-collapse',
                                    'container_id'      => 'top-menu',
                                    'menu_class'        => 'nav navbar-nav',
                                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                    'walker'            => new wp_bootstrap_navwalker()
                                ));
                            ?>
                        </div>
                    </div>
                </div>
            </nav>
        <?php endif; ?>
    </header>
