<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header" id="site-header">
    <div class="container header-inner">

        <!-- Logo / Nome do Blog -->
        <a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <?php
            if ( has_custom_logo() ) {
                the_custom_logo();
            } else {
                ?>
                <span class="logo-text">Netrunner</span>
                <?php
            }
            ?>
        </a>

        <!-- Navegação principal -->
        <nav class="primary-nav" id="primary-nav" aria-label="<?php esc_attr_e( 'Menu Principal', 'netrunner' ); ?>">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'menu_class'     => 'nav-menu',
                'container'      => false,
                'fallback_cb'    => 'netrunner_fallback_menu',
            ) );
            ?>
        </nav>

        <div class="header-controls">
            <button class="dark-mode-toggle" id="dark-mode-toggle" aria-label="<?php esc_attr_e( 'Alternar modo escuro', 'netrunner' ); ?>">
                <span class="icon-sun" aria-hidden="true">☀️</span>
                <span class="icon-moon" aria-hidden="true">🌙</span>
            </button>

            <button class="hamburger" id="hamburger" aria-label="<?php esc_attr_e( 'Abrir menu', 'netrunner' ); ?>" aria-expanded="false" aria-controls="primary-nav">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>

    </div><!-- .header-inner -->
</header><!-- .site-header -->

<div id="page" class="site">
