<?php afft_check_requirements(); ?>
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
<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
    <header id="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <?php if(afft_has_logo() || afft_has_retina_logo()): ?>
                        <a href="<?php home_url('/'); ?>" title="<?php bloginfo('name'); ?>" rel='home'>
                            <img id="logo" src="<?php echo (!afft_has_logo() ? afft_get_retina_logo() : afft_get_logo()); ?>"
                                 data-rjs="<?php echo afft_get_retina_logo() ?>" alt="<?php bloginfo('name'); ?>">
                        </a>
                    <?php else: ?>
                        <h1 id="title" class="display-4" itemprop="headline"><?php bloginfo('name') ?></h1>
                        <p id="tagline" class="lead text-muted" itemprop="description"><?php bloginfo('description') ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>

    <nav id="main-menu" class="navbar" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#top-menu">
                            <span class="sr-only"><?php _e('Toggle navigation', 'affilicious-theme'); ?></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand visible-xs" href="<?php home_url('/'); ?>">
                            <?php bloginfo('name'); ?>
                        </a>
                    </div>
                    <?php if(afft_has_main_menu()): ?>
                        <?php afft_the_main_menu(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
