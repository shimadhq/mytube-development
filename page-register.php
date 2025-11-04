<?php
/*
Template Name: صفحه ثبت‌نام
*/

if (!defined('ABSPATH')) exit;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login_submit'])) {
    $creds = array(
        'user_fullname'    => sanitize_text_field($_POST['fullname']),
        'user_number' => $_POST['number'],
        'remember'      => true,
    );

    $user = wp_signon($creds, false);

    if (is_wp_error($user)) {
        $error_message = 'نام کاربری یا رمز عبور اشتباه است.';
    } else {
        wp_redirect(home_url());
        exit;
    }
}
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/auth/auth.css">
    <title>ایجاد حساب کاربری</title>
    <?php wp_head(); ?>
</head>
<body>
    <div class="auth-page">
        <div class="auth-background"></div>
        <img src="<?php echo get_template_directory_uri() . '/assets/img/auth/login/shape.svg' ?>" class="auth-shape" />
        <div class="auth-box">
            <div class="auth-section">
                <div class="auth-title-wrapper">
                    <img src="<?php echo get_template_directory_uri() . '/assets/img/auth/login/title-bg.svg' ?>" class="auth-title-bg" />
                    <img src="<?php echo get_template_directory_uri() . '/assets/img/auth/login/title-icon.svg' ?>" class="auth-title-icon" />
                    <div class="auth-title">
                        <span class="auth-title-text">
                            ثـــبت نــــــــام
                        </span>
                        <img src="<?php echo get_template_directory_uri() . '/assets/img/auth/login/MYTUBE.svg' ?>" class="auth-mytube" />
                    </div>
                </div>
                <div class="auth-desc">
                    <span class="auth-desc-title">
                        تــجربه تمــاشای خفــن ترین چالـــش ها فـقـط با مســتر بیــست !
                    </span>
                    <p class="auth-desc-text">
                        خفن ترین چالش های روز دنیا فقط و فقط از کانال مستر بیست ...
                    </p>
                </div>
                <?php if (!empty($error_message)) : ?>
                    <p class="auth-error"><?php echo esc_html($error_message); ?></p>
                <?php endif; ?>

                <form method="post" class="auth-form">
                    <div class="auth-form-input">
                        <label for="number" class="auth-form-label">نام و نام‌خانوادگی</label>
                        <input type="text" name="number" id="number" class="auth-input" required>
                    </div>
                    <div class="auth-form-input">
                        <label for="password" class="auth-form-label">رمز عبور</label>
                        <input type="password" name="password" id="password" class="auth-input" required>
                    </div>
                    <div class="forget-password">
                        <span class="forget-password-text">
                            <a href="#">
                                فراموشی رمز عبور
                            </a>
                        </span>
                    </div>
                    <div>
                        <input type="submit" name="login_submit" value="ثبت‌نام" class="auth-submit-button">
                    </div>
                </form>
                <p class="auth-link">
                    <span class="auth-link-text">حساب کاربری نداری؟</span>
                    <a href="<?php echo site_url('/register'); ?>" class="auth-link-register">ورود</a>
                </p>
            </div>
            <div class="auth-social-icons">
                <img src="<?php echo get_template_directory_uri() . '/assets/img/auth/login/layer1.png' ?>" class="auth-layer1" />
                <img src="<?php echo get_template_directory_uri() . '/assets/img/auth/login/layer2.png' ?>" class="auth-layer2" />
                <img src="<?php echo get_template_directory_uri() . '/assets/img/auth/login/layer3.png' ?>" class="auth-layer3" />

                <img src="<?php echo get_template_directory_uri() . '/assets/img/auth/login/mytube-logo.svg' ?>" class="auth-mytube-logo" />
            </div>
        </div>
    </div>
</body>
</html>