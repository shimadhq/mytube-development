<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Courses extends Widget_Base{
    public function get_name() {
        return 'courses';
    }

    public function get_title() {
        return 'دوره های آموزشی';
    }

    public function get_icon() {
        return 'eicon-video-camera';
    }

    public function get_style_depends() {
        return ['courses'];
    }

    public function get_categories() {
        return [ 'mytube-category' ];
    }

    protected function register_controls(){
        $this->start_controls_section(
            'co_title_section',
            [
                'label' => 'عنوان و دکمه',
            ]
        );

        $this->add_control(
            'co_heading_icon',
            [
                'label' => __( 'آیکن عنوان', 'mytube' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/img/courses/courses.svg',
                ],
            ]
        );

        $this->add_control(
            'co_heading_text',
            [
                'label' => __( 'عنوان', 'mytube' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'دوره هــــــــای آمـــــوزشـــــــی', 'mytube' ),
            ]
        );

        $this->add_control(
            'co_button_text',
            [
                'label' => __( 'متن دکمه', 'mytube' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'همه دوره ها', 'mytube' ),
            ]
        );

        $this->add_control(
            'co_button_link',
            [
                'label' => 'لینک دکمه',
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'courses_section',
            [
                'label' => 'دوره ها'
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'course_image',
            [
                'label' => __( 'تصویر دوره', 'mytube' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'course_title',
            [
                'label' => __( 'عنوان دوره', 'mytube' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'عنوان دوره', 'mytube' ),
            ]
        );

        $repeater->add_control(
            'course_text',
            [
                'label' => __( 'توضیحات دوره', 'mytube' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'توضیحات دوره', 'mytube' ),
            ]
        );

        $repeater->add_control(
            'course_price',
            [
                'label' => __( 'قیمت دوره', 'mytube' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'قیمت دوره', 'mytube' ),
            ]
        );

        $repeater->add_control(
            'pay_button_text',
            [
                'label' => __( 'متن دکمه خرید', 'mytube' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'متن دکمه خرید', 'mytube' ),
            ]
        );

        $repeater->add_control(
            'pay_button_link',
            [
                'label' => 'لینک دکمه خرید',
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->add_control(
            'courses',
            [
                'label' => __( 'دوره ها', 'mytube' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ course_title }}}',
                'default' => [
                    [
                        'course_image' => ['url' => get_template_directory_uri() . '/assets/img/courses/course1.webp'],
                        'course_title' => __( 'دوره آموزش یوتیوب', 'mytube' ),
                        'course_text' =>  __( 'ترفند های حرفه ای یوتیوب', 'mytube' ),
                        'course_price' => __( '۵,۶۰۰,۰۰۰', 'mytube' ),
                        'pay_button_text' => __( 'خرید', 'mytube' ),
                    ],
                    [
                        'course_image' => ['url' => get_template_directory_uri() . '/assets/img/courses/course2.webp'],
                        'course_title' => __( 'دوره آموزش پرمیر', 'mytube' ),
                        'course_text' =>  __( 'تدوین حرفه ای ویدیو هاتون', 'mytube' ),
                        'course_price' => __( '۷,۶۰۰,۰۰۰', 'mytube' ),
                        'pay_button_text' => __( 'خرید', 'mytube' ),
                    ],
                    [
                        'course_image' => ['url' => get_template_directory_uri() . '/assets/img/courses/course3.webp'],
                        'course_title' => __( 'دوره آموزش تولید محتوا', 'mytube' ),
                        'course_text' =>  __( 'تولید محتوا یه اصل خیلی مهم برای ...', 'mytube' ),
                        'course_price' => __( '۱,۳۰۰,۰۰۰', 'mytube' ),
                        'pay_button_text' => __( 'خرید', 'mytube' ),
                    ],
                    [
                        'course_image' => ['url' => get_template_directory_uri() . '/assets/img/courses/course4.webp'],
                        'course_title' => __( 'دوره آموزش اینستاگرام', 'mytube' ),
                        'course_text' =>  __( 'ترفند های حرفه ای اینستاگرام', 'mytube' ),
                        'course_price' => __( '۵,۶۰۰,۰۰۰', 'mytube' ),
                        'pay_button_text' => __( 'خرید', 'mytube' ),
                    ],
                ],
            ]
        );

        $this->end_controls_section();

        // ------------------ Main Title ------------------
        $this->start_controls_section(
            'style_title_section',
            [
                'label' => __( 'عنوان و دکمه', 'mytube' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'courses_title_color',
            [
                'label'     => __( 'رنگ عنوان', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493A3A',
                'selectors' => [
                    '{{WRAPPER}} .courses-main-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'courses_title_typography',
                'label'    => __( 'تایپوگرافی عنوان', 'mytube' ),
                'selector' => '{{WRAPPER}} .courses-main-title',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 16, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 900 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_responsive_control(
            'courses_button_color',
            [
                'label'     => __( 'رنگ متن دکمه', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493A3A',
                'selectors' => [
                    '{{WRAPPER}} .courses-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'courses_button_typography',
                'label'    => __( 'تایپوگرافی متن دکمه', 'mytube' ),
                'selector' => '{{WRAPPER}} .courses-button',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 16, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 700 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->end_controls_section();


        // ------------------ Courses ------------------
        $this->start_controls_section(
            'style_courses_section',
            [
                'label' => __( 'دوره ها', 'mytube' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'course_image_width',
            [
                'label' => __( 'عرض تصویر اسلاید', 'mytube' ),
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
                    'size' => 300,
                ],
                'selectors' => [
                    '{{WRAPPER}} .course-image' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'course_image_height',
            [
                'label' => __( 'ارتفاع تصویر اسلاید', 'mytube' ),
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
                    '{{WRAPPER}} .course-image' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'course_title_color',
            [
                'label'     => __( 'رنگ عنوان دوره', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493A3A',
                'selectors' => [
                    '{{WRAPPER}} .course-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'course_title_typography',
                'label'    => __( 'تایپوگرافی عنوان دوره', 'mytube' ),
                'selector' => '{{WRAPPER}} .course-title',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 16, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 900 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_responsive_control(
            'course_text_color',
            [
                'label'     => __( 'رنگ متن توضیحات', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493a3a79',
                'selectors' => [
                    '{{WRAPPER}} .course-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'course_text_typography',
                'label'    => __( 'تایپوگرافی متن توضیحات', 'mytube' ),
                'selector' => '{{WRAPPER}} .course-text',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 14, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 500 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_responsive_control(
            'course_price_color',
            [
                'label'     => __( 'رنگ متن قیمت', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493A3A',
                'selectors' => [
                    '{{WRAPPER}} .course-price' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'course_price_typography',
                'label'    => __( 'تایپوگرافی متن قیمت', 'mytube' ),
                'selector' => '{{WRAPPER}} .course-price',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 18, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 900 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_responsive_control(
            'pay_button_bg_color',
            [
                'label'     => __( 'رنگ بک گراند دکمه خرید', 'mytube' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#ff454527',
                'selectors' => [
                    '{{WRAPPER}} .pay-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'pay_button_text_color',
            [
                'label'     => __( 'رنگ متن دکمه خرید', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#FF4545',
                'selectors' => [
                    '{{WRAPPER}} .pay-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'pay_button_text_typography',
                'label'    => __( 'تایپوگرافی متن دکمه خرید', 'mytube' ),
                'selector' => '{{WRAPPER}} .pay-button',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 16, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 500 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->end_controls_section();
    }

    public function render() {
        $settings = $this->get_settings_for_display();
        $courses = $settings['courses'];
        $current = 0;

        ?>
        <div class="courses">
            <div class="courses-header">
                <div class="courses-title-wrapper">
                    <img class="short-shape" src="<?php echo get_template_directory_uri(); ?>/assets/img/short-videos/shape.svg" />
                    <div class="courses-icon-wrapper">
                        <img class="main-icon" src="<?php echo esc_url( $settings['co_heading_icon']['url'] ); ?>" alt="" />
                    </div>
                    <span class="courses-main-title">
                        <?php echo esc_html($settings['co_heading_text']); ?>
                    </span>
                </div>
                <div href="<?php echo esc_url($settings['co_button_link']['url']); ?>" class="courses-button">
                    <?php echo esc_html($settings['co_button_text']); ?>
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/icon/arrow.svg') ?>" alt="arrow-icon" />
                </div>
            </div>
            <div class="courses-section">
                <?php foreach($courses as $course): ?>
                    <div class="course">
                        <div class="course-image-wrapper">
                            <?php if (!empty($course['course_image']['url'])) : ?>
                                <img class="course-image" src="<?php echo esc_url($course['course_image']['url']); ?>" alt="">
                            <?php endif; ?>
                        </div>
                        <div class="course-text">
                            <span class="course-title"><?php echo esc_html($course['course_title']); ?></span>
                            <span class="course-text"><?php echo esc_html($course['course_text']); ?></span>
                        </div>
                        <div class="price-pay">
                            <div class="course-price-wrapper">
                                <span class="course-price"><?php echo esc_html($course['course_price']); ?></span>
                                <span class="price-unit">تومان</span>
                            </div>
                            <div href="<?php echo esc_url($course['pay_button_link']['url']); ?>" class="pay-button">
                                <?php echo esc_html($course['pay_button_text']); ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
}