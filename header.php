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
    <?php if(ap_is_tight_layout()): ?><div class="container"><?php endif; ?>
    <header id="header" role="banner">
        <?php if(ap_is_loose_layout()): ?><div class="container"><?php endif; ?>
            <div class="row">
                <div class="col-xs-12">
                    <?php if(ap_has_logo() || ap_has_logo_retina()): ?>
                        <a href="<?php home_url('/'); ?>" title="<?php bloginfo('name'); ?>" rel='home'>
                            <img id="logo" src="<?php !ap_has_logo() ? ap_logo_retina() : ap_logo() ?>"
                                 data-rjs="<?php ap_logo_retina() ?>" alt="<?php bloginfo('name'); ?>">
                        </a>
                    <?php else: ?>
                        <h1 id="title" class="display-4"><?php bloginfo('name') ?></h1>
                        <p id="tagline" class="lead text-muted"><?php bloginfo('description') ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php if(ap_is_loose_layout()): ?></div><?php endif; ?>
    </header>
    <?php if(ap_has_main_navigation()): ?>
        <nav class="navbar navbar-default" role="navigation">
            <?php if(ap_is_loose_layout()): ?><div class="container"><?php endif; ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#top-menu">
                                <span class="sr-only"><?php _e('Toggle navigation', 'projektaffiliatetheme'); ?></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand visible-xs" href="<?php home_url('/'); ?>">
                                <?php bloginfo('name'); ?>
                            </a>
                        </div>
                        <?php ap_main_navigation(); ?>
                    </div>
                </div>
            <?php if(ap_is_loose_layout()): ?></div><?php endif; ?>
        </nav>
    <?php endif; ?>
