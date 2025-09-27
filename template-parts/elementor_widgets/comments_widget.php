<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Comments extends Widget_Base{
    public function get_name() {
        return 'comments';
    }

    public function get_title() {
        return 'نظرات و شبکه های اجتماعی';
    }

    public function get_icon() {
        return 'eicon-social-icons';
    }

    public function get_style_depends() {
        return ['comments'];
    }

    public function get_categories() {
        return [ 'mytube-category' ];
    }

    protected function register_controls(){
        $this->start_controls_section(
            'comments_title_section',
            [
                'label' => 'عنوان نظرات',
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'heading_icon',
            [
                'label' => __( 'آیکن عنوان', 'mytube' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/img/comments/comments.svg',
                ],
            ]
        );

        $this->add_control(
            'heading',
            [
                'label' => __( 'عنوان', 'mytube' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'کامــــنـت های شمــــــــــــــــــــا', 'mytube' ),
            ]
        );

        $this->add_control(
            'heading_description',
            [
                'label' => __( 'متن توضیحات', 'mytube' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'کامنتایی که شما عزیزان برای ما گذاشتین!', 'mytube' ),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'comments_content_section',
            [
                'label' => 'نظرات کاربران',
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'comment_image',
            [
                'label' => __( 'تصویر کاربر', 'mytube' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'comment_title',
            [
                'label' => __( 'نام کاربر', 'mytube' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'نام کاربر', 'mytube' ),
            ]
        );

        $repeater->add_control(
            'comment_text',
            [
                'label' => __( 'توضیحات کوتاه درباره کاربر', 'mytube' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'توضیحات کوتاه درباره کاربر', 'mytube' ),
            ]
        );

        $repeater->add_control(
            'comment_description',
            [
                'label' => __( 'پیام کاربر', 'mytube' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'پیام کاربر', 'mytube' ),
            ]
        );

        $this->add_control(
            'comments',
            [
                'label' => __( 'نظرات کاربران', 'mytube' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ comment_title }}}',
                'default' => [
                    [
                        'comment_image' => ['url' => get_template_directory_uri() . '/assets/img/comments/image1.png'],
                        'comment_title' => __( 'ســعـــیـد کــریــمـیان', 'mytube' ),
                        'comment_text' => __( 'دنبـــال کنـنـده', 'mytube' ),
                        'comment_description' => __( 'سلام. سعید هستم. محتوای چنلتون عالیه. من همه ویدیو هاتون رو دیدم و همچنان دنبالتون می کنم. ادامه بدید!', 'mytube' ),
                    ],
                    [
                        'comment_image' => ['url' => get_template_directory_uri() . '/assets/img/comments/image1.png'],
                        'comment_title' => __( 'ســعـــیـد کــریــمـیان', 'mytube' ),
                        'comment_text' => __( 'دنبـــال کنـنـده', 'mytube' ),
                        'comment_description' => __( 'سلام. سعید هستم. محتوای چنلتون عالیه. من همه ویدیو هاتون رو دیدم و همچنان دنبالتون می کنم. ادامه بدید!', 'mytube' ),
                    ],
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'social_media_title_section',
            [
                'label' => 'عنوان شبکه های اجتماعی',
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'social_heading_icon',
            [
                'label' => __( 'آیکن عنوان', 'mytube' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/img/comments/social.svg',
                ],
            ]
        );

        $this->add_control(
            'social_heading',
            [
                'label' => __( 'عنوان', 'mytube' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'شبــــــکه هــــــای اجـــتـــماعیــمون', 'mytube' ),
            ]
        );

        $this->add_control(
            'social_heading_description',
            [
                'label' => __( 'متن توضیحات', 'mytube' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'ما رو توی شبکه های اجتماعی دنبال کنید!', 'mytube' ),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'social_media_section',
            [
                'label' => 'شبکه های اجتماعی',
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'social_icon',
            [
                'label' => __( 'آیکن شبکه اجتماعی', 'mytube' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'social_title',
            [
                'label' => __( 'عنوان شبکه اجتماعی', 'mytube' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'عنوان شبکه اجتماعی', 'mytube' ),
            ]
        );

        $repeater->add_control(
            'social_text',
            [
                'label' => __( 'آدرس شبکه اجتماعی', 'mytube' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'آدرس شبکه اجتماعی', 'mytube' ),
            ]
        );

        $this->add_control(
            'socials',
            [
                'label' => __( 'شبکه های اجتماعی', 'mytube' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ social_title }}}',
                'default' => [
                    [
                        'social_icon' => ['url' => get_template_directory_uri() . '/assets/img/comments/instagram.svg'],
                        'social_title' => __( 'اینستاگرام', 'mytube' ),
                        'social_text' => __( '@youtube.id', 'mytube' ),
                    ],
                    [
                        'social_icon' => ['url' => get_template_directory_uri() . '/assets/img/comments/telegram.svg'],
                        'social_title' => __( 'تلگرام', 'mytube' ),
                        'social_text' => __( '@youtube.id', 'mytube' ),
                    ],
                    [
                        'social_icon' => ['url' => get_template_directory_uri() . '/assets/img/comments/whatsapp.svg'],
                        'social_title' => __( 'واتس اپ', 'mytube' ),
                        'social_text' => __( '@youtube.id', 'mytube' ),
                    ],
                    [
                        'social_icon' => ['url' => get_template_directory_uri() . '/assets/img/comments/twitter.svg'],
                        'social_title' => __( 'توییتر', 'mytube' ),
                        'social_text' => __( '@youtube.id', 'mytube' ),
                    ],
                    [
                        'social_icon' => ['url' => get_template_directory_uri() . '/assets/img/comments/youtube.svg'],
                        'social_title' => __( 'یوتیوب', 'mytube' ),
                        'social_text' => __( '@youtube.id', 'mytube' ),
                    ]
                ],
            ],
        );

        $this->end_controls_section();


        // ------------------ Comments Section Title ------------------
        $this->start_controls_section(
            'style_title_section',
            [
                'label' => __( 'عنوان نظرات', 'mytube' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'heading_color',
            [
                'label'     => __( 'رنگ عنوان', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493A3A',
                'selectors' => [
                    '{{WRAPPER}} .comments-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'heading_typography',
                'label'    => __( 'تایپوگرافی عنوان', 'mytube' ),
                'selector' => '{{WRAPPER}} .comments-title',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 16, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 900 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_responsive_control(
            'heading_description_color',
            [
                'label'     => __( 'رنگ متن توضیحات', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#1D1616',
                'selectors' => [
                    '{{WRAPPER}} .comments-description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'heading_description_typography',
                'label'    => __( 'تایپوگرافی عنوان', 'mytube' ),
                'selector' => '{{WRAPPER}} .comments-description',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 16, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 600 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->end_controls_section();


        // ------------------ Comments Section ------------------
        $this->start_controls_section(
            'style_comments_section',
            [
                'label' => __( 'نظرات کاربران', 'mytube' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'comment_image_width',
            [
                'label' => __( 'عرض تصویر کاربر', 'mytube' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 2000,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 70,
                ],
                'selectors' => [
                    '{{WRAPPER}} .comment-image' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'comment_image_height',
            [
                'label' => __( 'ارتفاع تصویر کاربر', 'mytube' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 2000,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .comment-image' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'comment_title_color',
            [
                'label'     => __( 'رنگ نام کاربر', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493A3A',
                'selectors' => [
                    '{{WRAPPER}} .comment-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'comment_title_typography',
                'label'    => __( 'تایپوگرافی نام کاربر', 'mytube' ),
                'selector' => '{{WRAPPER}} .comment-title',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 16, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 700 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_responsive_control(
            'comment_text_color',
            [
                'label'     => __( 'رنگ متن توضیحات کوتاه', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493a3a79',
                'selectors' => [
                    '{{WRAPPER}} .comment-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'comment_text_typography',
                'label'    => __( 'تایپوگرافی متن توضیحات کوتاه', 'mytube' ),
                'selector' => '{{WRAPPER}} .comment-text',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 14, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 500 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_responsive_control(
            'comment_description_color',
            [
                'label'     => __( 'رنگ متن نظر کاربر', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#1d16169e',
                'selectors' => [
                    '{{WRAPPER}} .comment-description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'comment_description_typography',
                'label'    => __( 'تایپوگرافی متن نظر کاربر', 'mytube' ),
                'selector' => '{{WRAPPER}} .comment-description',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 16, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 400 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->end_controls_section();


        // ------------------ Social Media Title Section ------------------
        $this->start_controls_section(
            'style_socials_title_section',
            [
                'label' => __( 'عنوان شبکه های اجتماعی', 'mytube' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'social_heading_color',
            [
                'label'     => __( 'رنگ عنوان', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493A3A',
                'selectors' => [
                    '{{WRAPPER}} .socials-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'social_heading_typography',
                'label'    => __( 'تایپوگرافی عنوان', 'mytube' ),
                'selector' => '{{WRAPPER}} .socials-title',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 16, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 900 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_responsive_control(
            'social_heading_description_color',
            [
                'label'     => __( 'رنگ متن توضیحات', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#1D1616',
                'selectors' => [
                    '{{WRAPPER}} .socials-description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'social_heading_description_typography',
                'label'    => __( 'تایپوگرافی عنوان', 'mytube' ),
                'selector' => '{{WRAPPER}} .socials-description',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 16, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 600 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->end_controls_section();


        // ------------------ Social Media Section ------------------
        $this->start_controls_section(
            'style_socials_section',
            [
                'label' => __( 'شبکه های اجتماعی', 'mytube' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'social_icon_width',
            [
                'label' => __( 'اندازه آیکن', 'mytube' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 2000,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 70,
                ],
                'selectors' => [
                    '{{WRAPPER}} .social-icon' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'social_title_color',
            [
                'label'     => __( 'رنگ عنوان شبکه اجتماعی', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493A3A',
                'selectors' => [
                    '{{WRAPPER}} .social-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'social_title_typography',
                'label'    => __( 'تایپوگرافی عنوان شبکه اجتماعی', 'mytube' ),
                'selector' => '{{WRAPPER}} .social-title',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 16, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 700 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_responsive_control(
            'social_description_color',
            [
                'label'     => __( 'رنگ متن شبکه اجتماعی', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493a3a75',
                'selectors' => [
                    '{{WRAPPER}} .social-description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'social_description_typography',
                'label'    => __( 'تایپوگرافی متن شبکه اجتماعی', 'mytube' ),
                'selector' => '{{WRAPPER}} .social-description',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 12, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 500 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->end_controls_section();
    }

    public function render() {
        $settings = $this->get_settings_for_display();
        $comments = $settings['comments'];
        $socials = $settings['socials'];
        $current = 0;

        ?>
        <div class="comments-widget">
            <div class="comments-section">
                <img class="comments-bg" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/comments/comments-bg.svg') ?>" />
                <div class="comments-title-section">
                    <div class="comments-title-wrapper">
                        <img class="short-shape" src="<?php echo get_template_directory_uri(); ?>/assets/img/short-videos/shape.svg" />
                        <div class="comments-icon-wrapper">
                            <img class="main-icon" src="<?php echo esc_url( $settings['heading_icon']['url'] ); ?>" alt="" />
                        </div>
                        <span class="comments-title">
                            <?php echo esc_html($settings['heading']); ?>
                        </span>
                    </div>
                    <div class="comments-description">
                        <?php echo esc_html($settings['heading_description']); ?>
                    </div>
                </div>
                <div class="comments-content-section">
                    <div class="comments-navigation">
                        <button class="custom-up">˄</button>
                        <button class="custom-down">˅</button>
                    </div>
                    <div class=""></div>
                </div>
            </div>
        </div>
        <?php
    }
}