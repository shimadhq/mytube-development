<?php
if (!defined('ABSPATH')) {
    exit;
}

$support_phone = get_option('mytube_support_phone', '۰۹۳۰ ۹۹۱ ۰۹۰۵');
?>

<div class="header-bottom">
    <nav class="main-nav">
        <?php
            wp_nav_menu([
                'theme_location' => 'primary-menu',
                'container'      => false,
                'menu_class'     => 'menu',
                'walker'         => new MyTube_Walker_Nav_Menu(),
            ]);
        ?>
    </nav>
    <div class="support-search">
        <div class="support-section">
            <div class="support">
                <span class="support-title">تماس با پشتیبانی</span>
                <span class="support-phone"><?php echo esc_html($support_phone); ?></span>
            </div>
            <div class="cart-icon">
                <a href="#" class="icon-btn">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/icon/support.svg') ?>" alt="support-icon" />
                </a>
            </div>
        </div>
        <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
            <input type="search" class="search-field" placeholder="جستجو..." value="<?php echo get_search_query(); ?>" name="s" />
            <button type="submit" class="search-submit">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/icon/search.svg') ?>" alt="search-icon" />
            </button>
        </form>
    </div>
</div>