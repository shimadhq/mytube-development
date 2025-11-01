<?php
if (!defined('ABSPATH')) {
    exit;
}

$desktop_logo = get_option('mytube_logo_desktop', get_template_directory_uri() . '/assets/img/logo.png');
?>

<div class="header-top">
    <div class="header-logo">
        <a href="<?php echo home_url(); ?>">
            <img src="<?php echo esc_url($desktop_logo); ?>" alt="<?php bloginfo('name'); ?>" class="logo">
        </a>
        <span class="tagline"><?php bloginfo('description'); ?></span>
    </div>
    <div class="header-icons">
        <div class="user-section">
            <p class="user-text">
                ورود و ثبت نام
            </p>
            <div class="user-icon">
                <a href="<?php echo wp_login_url(); ?>" class="icon-btn">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/icon/profile.svg') ?>" alt="user-icon" />
                </a>
            </div>
        </div>
        <div class="cart-section">
            <div class="cart-icon">
                <a href="#" class="icon-btn">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/icon/cart.svg') ?>" alt="cart-icon" />
                </a>
                <div class="cart-wrapper">
                    <p class="cart-text">
                        سبد خرید شما خالی است!
                    </p>
                    <button class="cart-button">
                        رفتن به فروشگاه
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>