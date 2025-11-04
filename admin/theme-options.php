<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Load styles and scripts only on the theme settings page
 */
add_action('admin_enqueue_scripts', 'mytube_admin_assets');
function mytube_admin_assets($hook) {
    if ($hook !== 'toplevel_page_mytube-theme-options') return;

    wp_enqueue_style(
        'mytube-admin-fonts',
        get_template_directory_uri() . '/assets/css/custom-fonts/custom-fonts.css',
        array(),
        null
    );

    wp_enqueue_style(
        'mytube-admin-style',
        get_template_directory_uri() . '/admin/assets/css/admin-style.css',
        [],
        '1.0.0'
    );

    wp_enqueue_media();
    wp_enqueue_script(
        'mytube-admin-script',
        get_template_directory_uri() . '/admin/assets/js/admin-script.js',
        ['jquery'],
        '1.0.0',
        true
    );
}

// Adding MYTUBE menu to admin panel
add_action('admin_menu', 'mytube_add_admin_menu');

/**
 * Adding mytube menu
 */
function mytube_add_admin_menu() {
    add_menu_page(
        __('مای‌توب', 'mytube'),
        __('مای‌توب', 'mytube'),
        'manage_options',
        'mytube-theme-options',
        'mytube_render_theme_options',
        'dashicons-youtube',
        3
    );
}

/**
 * Adding sub menu
 */
add_action('admin_menu', 'mytube_add_submenu');
function mytube_add_submenu() {
    add_submenu_page(
        'mytube-theme-options',
        __('تنظیمات قالب', 'mytube'),
        __('تنظیمات قالب', 'mytube'),
        'manage_options',
        'mytube-theme-options',
        'mytube_render_theme_options'
    );
}

/**
 * Submiting settings
 */
add_action('admin_init', 'mytube_register_settings');
function mytube_register_settings() {
    register_setting('mytube_theme_options_group', 'mytube_theme_options');
}

/**
 * Showing setting page function
 */
function mytube_render_theme_options() {
    $options = get_option('mytube_theme_options');
    if (!is_array($options)) {
        $options = [];
    }
    ?>
    <div class="wrap mytube-admin">
        <div class="mytube-header">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="MYTUBE Logo" class="mytube-logo" />
            <h1>تنظیمات قالب مای‌توب</h1>
            <hr />
        </div>

        <div class="mytube-settings-container">
            <!-- Tabs -->
            <ul class="mytube-tabs-vertical">
                <li class="active" data-tab="tab-header">هدر</li>
                <li class="has-submenu" data-tab="tab-contact">
                    تماس با ما <span class="arrow"><img src="<?php echo get_template_directory_uri() . '/assets/img/admin/arrow.svg' ?>" /></span>
                    <ul class="submenu">
                        <li data-subtab="contact-info">اطلاعات تماس</li>
                    </ul>
                </li>
                <!-- در آینده: <li data-tab="tab-footer">فوتر</li> -->
            </ul>

            <!-- Tabs Content -->
            <div class="mytube-tab-contents">
                <form method="post" action="options.php">
                    <?php
                        settings_fields('mytube_theme_options_group');
                        $options = get_option('mytube_theme_options');
                    ?>

                    <div id="tab-header" class="mytube-tab-content active">
                        <h2>تنظیمات هدر</h2>
                        <table class="form-table">
                            <div class="theme-option-field">
                                <label for="desktop_logo">لوگوی دسکتاپ</label>
                                <div class="upload-field">
                                    <input type="text" id="desktop_logo" 
                                        name="mytube_theme_options[desktop_logo]" 
                                        value="<?php echo esc_attr($options['desktop_logo'] ?? ''); ?>" />
                                    <button type="button" class="button upload-logo-button" data-target="#desktop_logo">انتخاب تصویر</button>
                                </div>
                            </div>

                            <div class="theme-option-field">
                                <label for="mobile_logo">لوگوی موبایل</label>
                                <div class="upload-field">
                                    <input type="text" id="mobile_logo" 
                                        name="mytube_theme_options[mobile_logo]" 
                                        value="<?php echo esc_attr($options['mobile_logo'] ?? ''); ?>" />
                                    <button type="button" class="button upload-logo-button" data-target="#mobile_logo">انتخاب تصویر</button>
                                </div>
                            </div>

                            <tr>
                                <th scope="row">شماره تماس پشتیبانی</th>
                                <td>
                                    <input type="text" name="mytube_theme_options[support_phone]" value="<?php echo esc_attr($options['support_phone'] ?? '۰۹۳۰ ۹۹۱ ۰۹۰۵'); ?>" class="regular-text" />
                                    <p class="description">شماره تماس برای نمایش در هدر</p>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div id="tab-contact" class="mytube-tab-content">
                        <!-- Sub menu: contact inf -->
                        <div id="contact-info" class="subtab-content">
                            <h2>اطلاعات تماس</h2>
                            <table class="form-table">
                                <tr>
                                    <th>آدرس</th>
                                    <td><input type="text" name="mytube_theme_options[contact_address]" value="<?php echo esc_attr($options['contact_address'] ?? 'تهران، میدان آزادی، کوچه ۲۴ آزادی، پلاک ۳۰'); ?>" /></td>
                                </tr>
                                <tr>
                                    <th>شماره تماس</th>
                                    <td><input type="tel" name="mytube_theme_options[contact_phone]" value="<?php echo esc_attr($options['contact_phone'] ?? '۰۹۳۸ ۹۳۸ ۸۱۸۱'); ?>" /></td>
                                </tr>
                                <tr>
                                    <th>واتساپ</th>
                                    <td><input type="tel" name="mytube_theme_options[contact_whatsapp]" value="<?php echo esc_attr($options['contact_whatsapp'] ?? '۰۹۳۸ ۹۳۸ ۸۱۸۱'); ?>" /></td>
                                </tr>
                                <tr>
                                    <th>ایمیل</th>
                                    <td><input type="email" name="mytube_theme_options[contact_email]" value="<?php echo esc_attr($options['contact_email'] ?? 'info@mytube.com'); ?>" /></td>
                                </tr>
                                <tr>
                                    <th>شهر</th>
                                    <td><input type="text" name="mytube_theme_options[contact_city]" value="<?php echo esc_attr($options['contact_city'] ?? 'تهران'); ?>" /></td>
                                </tr>
                                <tr>
                                    <th>استان</th>
                                    <td><input type="text" name="mytube_theme_options[contact_province]" value="<?php echo esc_attr($options['contact_province'] ?? 'تهران'); ?>" /></td>
                                </tr>
                                <tr>
                                    <th>خیابان و کوچه</th>
                                    <td><input type="text" name="mytube_theme_options[contact_street]" value="<?php echo esc_attr($options['contact_street'] ?? 'میدان آزادی، کوچه ۲۴ آزادی'); ?>" /></td>
                                </tr>
                                <tr>
                                    <th>پلاک</th>
                                    <td><input type="text" name="mytube_theme_options[contact_housenumber]" value="<?php echo esc_attr($options['contact_housenumber'] ?? 'پلاک ۶۷۴'); ?>" /></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <?php submit_button('ذخیره تنظیمات'); ?>
                </form>
            </div>
        </div>
    </div>
    <?php
}
