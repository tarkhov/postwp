<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php wp_title('-', true, 'right'); ?></title>
        <?php $site_url = get_site_url(); ?>
        <link rel="icon" href="<?php echo $site_url; ?>/favicon.ico" sizes="any">
        <link rel="icon" href="<?php echo $site_url; ?>/icon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="<?php echo $site_url; ?>/icon.png">
        <link rel="manifest" href="<?php echo $site_url; ?>/site.webmanifest">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <?php if (!is_404()) : ?>
            <header id="header" role="banner">
                <nav class="navbar navbar-expand-lg fixed-top" id="navbar-top" role="navigation" data-bs-theme="<?php if (is_front_page()) : ?>dark<?php else : ?>light<?php endif; ?>">
                    <div class="container-xxl">
                        <?php $site_name = get_option('blogname'); ?>
                        <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                            <?php echo postwp_icon('logo', [40, 40]); ?>
                            <span class="ms-2"><?php echo $site_name; ?></span>
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-navbar" aria-controls="offcanvas-navbar" aria-label="<?php _e('Toggle navigation', 'postwp'); ?>">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas-navbar-top" aria-labelledby="offcanvas-navbar-top-label">
                            <div class="offcanvas-header">
                                <div class="h5 offcanvas-title fw-normal" id="offcanvas-navbar-top-label">
                                    <?php echo postwp_icon('logo', [40, 40]); ?>
                                    <span class="ms-2"><?php echo $site_name; ?></span>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="<?php _e('Close', 'postwp'); ?>"></button>
                            </div>
                            <div class="offcanvas-body">
                                <?php
                                wp_nav_menu([
                                    'theme_location' => 'top',
                                    'container'      => false,
                                    'menu_class'     => 'navbar-nav',
                                ]);
                                ?>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
        <?php endif; ?>