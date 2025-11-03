<?php
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
    ?>
    <div class="wrap mytube-admin">
        <div class="mytube-header">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" alt="MYTUBE Logo" class="mytube-logo" />
            <h1>تنظیمات قالب مای‌توب</h1>
        </div>

        <div class="mytube-tabs">
            <ul class="mytube-tab-titles">
                <li class="active" data-tab="tab-header">هدر</li>
                <!-- Future Tabs ... -->
            </ul>

            <form method="post" action="options.php">
                <?php settings_fields('mytube_theme_options_group'); ?>

                <div class="mytube-tab-content active" id="tab-header">
                    <h2>تنظیمات هدر</h2>

                    <table class="form-table">
                        <tr>
                            <th scope="row">لوگوی دسکتاپ</th>
                            <td>
                                <input type="text" name="mytube_theme_options[desktop_logo]" value="<?php echo esc_attr($options['desktop_logo'] ?? get_template_directory_uri() . '/assets/img/logo.png'); ?>" class="regular-text" />
                                <p class="description">آدرس تصویر لوگوی دسکتاپ</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">لوگوی موبایل</th>
                            <td>
                                <input type="text" name="mytube_theme_options[mobile_logo]" value="<?php echo esc_attr($options['mobile_logo'] ?? get_template_directory_uri() . '/assets/img/logo-mobile.svg'); ?>" class="regular-text" />
                                <p class="description">آدرس تصویر لوگوی موبایل</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">شماره تماس پشتیبانی</th>
                            <td>
                                <input type="text" name="mytube_theme_options[support_phone]" value="<?php echo esc_attr($options['support_phone'] ?? '۰۹۳۰ ۹۹۱ ۰۹۰۵'); ?>" class="regular-text" />
                                <p class="description">شماره تماس برای نمایش در هدر</p>
                            </td>
                        </tr>
                    </table>
                </div>

                <?php submit_button('ذخیره تنظیمات'); ?>
            </form>
        </div>
    </div>
    <?php
}
