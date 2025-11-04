<?php
/**
 * Template Name: Contact Page
 */

get_header(); 

$options = get_option('mytube_theme_options');
?>

<div class="contact-page">
    <nav class="breadcrumb">
        <a class="main-page" href="<?php echo esc_url( home_url('/') ); ?>">MYTUBE</a>

        <?php
            // Separator icon
            $separator_icon = get_template_directory_uri() . '/assets/img/widgets/breadcrumb/arrow.svg';

            // Check page type
            if ( is_404() ) {
                // --- 404 page ---
                ?>
                    <span class="separator">
                        <img src="<?php echo esc_url( $separator_icon ); ?>" alt="separator" />
                    </span>
                    <span class="current-page">404</span>

                <?php
            } elseif ( is_single() && 'post' === get_post_type() ) {
                // --- Blog posts ---
                $categories = get_the_category();
                if ( ! empty( $categories ) ) {
                    $category = $categories[0];
                    ?>
                        <span class="separator">
                            <img src="<?php echo esc_url( $separator_icon ); ?>" alt="separator" />
                        </span>
                        <a class="previous-page" href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>">
                            <?php echo esc_html( $category->name ); ?>
                        </a>
                    <?php 
                } 
                ?>
                    <span class="separator">
                        <img src="<?php echo esc_url( $separator_icon ); ?>" alt="separator" />
                    </span>
                    <span class="current-page"><?php echo esc_html( get_the_title() ); ?></span>

                <?php
            } elseif ( is_page() ) {
                // --- For pages ---
                global $post;
                $ancestors = get_post_ancestors( $post );

                if ( ! empty( $ancestors ) ) {
                    $ancestors = array_reverse( $ancestors );
                    foreach ( $ancestors as $ancestor ) {
                        ?>
                            <span class="separator">
                                <img src="<?php echo esc_url( $separator_icon ); ?>" alt="separator" />
                            </span>
                            <a class="previous-page" href="<?php echo esc_url( get_permalink( $ancestor ) ); ?>">
                                <?php echo esc_html( get_the_title( $ancestor ) ); ?>
                            </a>
                        <?php
                    }
                }
                ?>
                    <span class="separator">
                        <img src="<?php echo esc_url( $separator_icon ); ?>" alt="separator" />
                    </span>
                    <span class="current-page"><?php echo esc_html( get_the_title() ); ?></span>

                <?php
            } else {
                // --- Other items (such as archives, categories, search results, etc.)---
                ?>
                    <span class="separator">
                        <img src="<?php echo esc_url( $separator_icon ); ?>" alt="separator" />
                    </span>
                    <span class="current-page"><?php echo wp_get_document_title(); ?></span>
                <?php 
            } 
        ?>
    </nav>
    <div class="contact-wrapper">
        <img src="<?php echo get_template_directory_uri() . '/assets/img/contact-page/right-corner.svg' ?>" class="corner" />
        <div class="contact-section">
            <div class="contact">
                <div class="first-section">
                    <div class="first-title-section">
                        <img class="contact-shape" src="<?php echo get_template_directory_uri(); ?>/assets/img/widgets/video-category/shape.svg" />
                        <span class="contact-first-title">
                            راه هــــــــــای ارتبــاطی
                        </span>
                        <div class="first-title-icon">
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/widgets/contact-us/rocket.svg' ?>" alt="">
                        </div>
                    </div>
                    <div class="first-contact-section">
                        <div class="address-section">
                            <div class="label-section">
                                <div class="label-icon">
                                    <img src="<?php echo get_template_directory_uri() . '/assets/img/widgets/contact-us/location.svg' ?>" alt="">
                                </div>
                                <span class="contact-address-label">
                                    آدرس
                                </span>
                            </div>
                            <?php if (!empty($options['contact_address'])) : ?>
                                <div class="address-field-section">
                                    <span class="contact-address-text">
                                        <?php echo esc_html($options['contact_address']); ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="phone-whatsapp">
                            <div class="phone-section">
                                <div class="label-section">
                                    <div class="label-icon">
                                        <img src="<?php echo get_template_directory_uri() . '/assets/img/widgets/contact-us/phone.svg' ?>" alt="">
                                    </div>
                                    <span class="contact-phone-label">
                                        شماره تماس
                                    </span>
                                </div>
                                <?php if (!empty($options['contact_phone'])) : ?>
                                    <div class="field-section">
                                        <span class="contact-phone-text">
                                            <a href="tel:<?php echo esc_attr($options['contact_phone']); ?>">
                                                <?php echo esc_html($options['contact_phone']); ?>
                                            </a>
                                        </span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="whatsapp-section">
                                <div class="label-section">
                                    <div class="label-icon">
                                        <img src="<?php echo get_template_directory_uri() . '/assets/img/widgets/contact-us/whatsapp.svg' ?>" alt="">
                                    </div>
                                    <span class="contact-whatsapp-label">
                                        واتساپ
                                    </span>
                                </div>
                                <?php if (!empty($options['contact_whatsapp'])) : ?>
                                    <div class="field-section">
                                        <span class="contact-whatsapp-text">
                                            <a href="https://wa.me/<?php echo esc_attr(preg_replace('/\D/', '', $options['contact_whatsapp'])); ?>" target="_blank">
                                                <?php echo esc_html($options['contact_whatsapp']); ?>
                                            </a>
                                        </span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="email-section">
                            <div class="label-section">
                                <div class="label-icon">
                                    <img src="<?php echo get_template_directory_uri() . '/assets/img/widgets/contact-us/email.svg' ?>" alt="">
                                </div>
                                <span class="contact-email-label">
                                    ایمیل
                                </span>
                            </div>
                            <?php if (!empty($options['contact_email'])) : ?>
                                <div class="email-field-section">
                                    <span class="contact-email-text">
                                        <a href="mailto:<?php echo esc_attr($options['contact_email']); ?>">
                                            <?php echo esc_html($options['contact_email']); ?>
                                        </a>
                                    </span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="second-section">
                    <img class="bg-shape1" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/widgets/contact-us/bg-contact-shape.svg') ?>" />
                    <div class="second-title-section">
                        <div class="second-title-icon">
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/widgets/contact-us/contact.svg' ?>" alt="">
                        </div>
                        <span class="contact-second-title">
                            تماس با ما
                        </span>
                    </div>
                    <div class="second-image">
                        <img src="<?php echo get_template_directory_uri() . '/assets/img/widgets/contact-us/image.svg' ?>" alt="">
                    </div>
                    <a href="tel:<?php echo esc_attr($options['contact_phone']); ?>" class="contact-second-button">
                        تماس با ما
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/icon/arrow.svg') ?>" alt="arrow-icon" />
                    </a>
                    <img class="bg-shape2" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/widgets/contact-us/bg-contact-shape2.svg') ?>" />
                </div>
                <div class="third-section">
                    <div class="third-title-section">
                        <img class="contact-shape" src="<?php echo get_template_directory_uri(); ?>/assets/img/widgets/biography/shape.svg" />
                        <span class="third-title">
                            پــــــــــیـــــام بــــــــذار!
                        </span>
                        <div class="third-title-icon">
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/widgets/contact-us/rocket.svg' ?>" alt="">
                        </div>
                    </div>
                    <div class="third-contact-section">
                        <img class="contact-shape" src="<?php echo get_template_directory_uri(); ?>/assets/img/widgets/video-category/shape.svg" />
                        <div class="name-phone">
                            <div class="fullname-field">
                                <label class="field-label">
                                   نام و نام خانوادگی
                                </label>
                                <input type="text" class="field-input" />
                            </div>
                            <div class="phone-field">
                                <label class="field-label">
                                    شماره تلفن
                                </label>
                                <input type="text" class="field-input" />
                            </div>
                        </div>
                        <div class="message-button">
                            <div class="message-field">
                                <label class="field-label">
                                    توضیحات
                                </label>
                                <input type="text" class="message-field-input" />
                            </div>
                            <div class="contact-send-button">
                                ارسال
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img src="<?php echo get_template_directory_uri() . '/assets/img/contact-page/left-corner.svg' ?>" class="corner" />
    </div>
</div>

<?php get_footer(); ?>
