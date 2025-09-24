<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo wp_get_document_title(); ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php $mobile_logo  = get_option('mytube_logo_mobile', get_template_directory_uri() . '/assets/img/logo-mobile.svg'); ?>

<header id="header" class="header-desktop">
    <div class="header-section-ds">
        <?php get_template_part('template-parts/header/header-top') ?>
        <?php get_template_part('template-parts/header/header-bottom') ?>
    </div>
</header>
<header class="header-mobile">
    <div class="header-section-mb">
        <div class="menu-icon" id="mobileMenuToggle">
            <a href="#" class="icon-btn">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/icon/menu-toggle.svg') ?>" alt="menu-toggle" />
            </a>
        </div>
        <div class="mobile-menu-wrapper" id="mobileMenu">
            <?php
                wp_nav_menu([
                    'theme_location' => 'primary-menu',
                    'menu_class'     => 'mobile-menu',
                    'container'      => false,
                    'walker'         => new Mobile_Walker_Nav_Menu()
                ]);
            ?>
        </div>
        <div class="mobile-logo">
            <a href="<?php echo home_url(); ?>">
                <img src="<?php echo esc_url($mobile_logo); ?>" alt="<?php bloginfo('name'); ?>">
            </a>
        </div>
        <div class="cart-icon">
            <a href="#" class="icon-btn">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/icon/cart.svg') ?>" alt="cart-icon" />
            </a>
        </div>
    </div>
</header>