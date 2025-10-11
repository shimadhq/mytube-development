<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Main_Banner extends Widget_Base{
    public function get_name() {
        return 'main-banner';
    }

    public function get_title() {
        return 'بنر اصلی';
    }

    public function get_icon() {
        return 'eicon-image-before-after';
    }

    public function get_style_depends() {
        return ['main-banner'];
    }

    public function get_script_depends() {
        return ['counter'];
    }

    public function get_categories() {
        return [ 'mytube-category' ];
    }

    protected function register_controls(){
        $this->start_controls_section(
            'mb_content_section',
            [
                'label' => 'محتوا',
            ]
        );

        $this->add_control(
            'mb_heading_text',
            [
                'label' => 'عنوان',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'تـجربه تـماشای خفـن ترین چـالش ها فقط با مسـتر بیـست!',
            ]
        );

        $this->add_control(
            'mb_description',
            [
                'label' => 'متن',
                'type' =>  \Elementor\Controls_Manager::WYSIWYG,
                'default' => 'خفن ترین چالش های روز دنیا فقط و فقط از کانال مستر بیست ...'            
            ]
        );

        $this->add_control(
            'mb_button1_text',
            [
                'label' => 'متن دکمه اول',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'ویدیو ها',
            ]
        );

        $this->add_control(
            'mb_button1_link',
            [
                'label' => 'لینک دکمه اول',
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->add_control(
            'mb_button2_text',
            [
                'label' => 'متن دکمه دوم',
                'type' => Controls_Manager::TEXT,
                'default' => 'بریم یوتیوب',
            ]
        );

        $this->add_control(
            'mb_button2_link',
            [
                'label' => 'لینک دکمه دوم',
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'mb_image_section',
            [
                'label' => 'تصویر',
            ]
        );

        $this->add_control(
            'mb_main_image',
            [
                'label' => 'تصویر اصلی',
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/img/main-banner/main-image.webp',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'mb_counter_section',
            [
                'label' => 'شمارش گرها',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'mb_counter_icon',
            [
                'label' => 'تصویر شمارش گر',
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => '',
                ],
            ]
        );

        $repeater->add_control(
            'mb_counter_number',
            [
                'label' => 'عدد شمارش گر',
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 0,
                'placeholder' => 'عدد نهایی را وارد کنید',
            ]
        );

        $repeater->add_control(
            'mb_counter_suffix',
            [
                'label' => 'پسوند شمارش گر',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
                'placeholder' => 'پسوند نمونه را وارد کنید',
            ]
        );

        $repeater->add_control(
            'mb_counter_text',
            [
                'label' => 'متن شمارش گر',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'متن نمونه',
                'placeholder' => 'متن نمونه را وارد کنید',
            ]
        );

        $this->add_control(
            'counters_list',
            [
                'label' => 'لیست شمارش گرها',
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'mb_counter_icon' => ['url' => get_template_directory_uri() . '/assets/icon/calendar.svg'],
                        'mb_counter_number' => '10',
                        'mb_counter_suffix' => 'سال',
                        'mb_counter_text' => 'سابقه فعالیت'
                    ],
                    [
                        'mb_counter_icon' => ['url' => get_template_directory_uri() . '/assets/icon/group.svg'],
                        'mb_counter_number' => '1',
                        'mb_counter_suffix' => 'میلیون',
                        'mb_counter_text' => 'دنبال کننده'
                    ],
                    [
                        'mb_counter_icon' => ['url' => get_template_directory_uri() . '/assets/icon/eye.svg'],
                        'mb_counter_number' => '3',
                        'mb_counter_suffix' => 'میلیون',
                        'mb_counter_text' => 'بازدید ماهانه'
                    ],
                ],
                'title_field' => '{{{ mb_counter_text }}}',
            ]
        );

        $this->end_controls_section();


        // ------------------ Background ------------------

        $this->start_controls_section(
            'style_background_section',
            [
                'label' => __( 'بک گراند', 'mytube' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // Main bg color
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'main_bg',
                'label'    => __( 'پس‌زمینه اصلی', 'mytube' ),
                'types'    => [ 'gradient' ], 
                'selector' => '{{WRAPPER}} .main-banner',
            ]
        );

        $this->end_controls_section();

        // ------------------ Title & decs ------------------

        $this->start_controls_section(
            'style_title_section',
            [
                'label' => __( 'عنوان و متن', 'mytube' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // Main title color
        $this->add_responsive_control(
            'title_color',
            [
                'label'     => __( 'رنگ عنوان', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .main-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Main title typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typography',
                'label'    => __( 'تایپوگرافی عنوان', 'mytube' ),
                'selector' => '{{WRAPPER}} .main-title',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 34, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 900 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        // Description color
        $this->add_responsive_control(
            'description_color',
            [
                'label'     => __( 'رنگ متن توضیحات', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#ffffff85',
                'selectors' => [
                    '{{WRAPPER}} .description' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Description typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'description_typography',
                'label'    => __( 'تایپوگرافی متن توضیحات', 'mytube' ),
                'selector' => '{{WRAPPER}} .description',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 16, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 500 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->end_controls_section();

        // ------------------ Buttonns ------------------

        $this->start_controls_section(
            'style_buttons_section',
            [
                'label' => __( 'دکمه ها', 'mytube' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'button1_bg_color',
            [
                'label'     => __( 'رنگ پس‌زمینه دکمه اول', 'mytube' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .button1' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button1_text_color',
            [
                'label'     => __( 'رنگ متن دکمه اول', 'mytube' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#493A3A',
                'selectors' => [
                    '{{WRAPPER}} .button1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'button1_typography',
                'label'    => __( 'تایپوگرافی متن دکمه اول', 'mytube' ),
                'selector' => '{{WRAPPER}} .button1',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 16, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 700 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_responsive_control(
            'button2_bg_color',
            [
                'label'     => __( 'رنگ پس‌زمینه دکمه دوم', 'mytube' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .button2' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button2_text_color',
            [
                'label'     => __( 'رنگ متن دکمه دوم', 'mytube' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#493A3A',
                'selectors' => [
                    '{{WRAPPER}} .button2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'button2_typography',
                'label'    => __( 'تایپوگرافی متن دکمه دوم', 'mytube' ),
                'selector' => '{{WRAPPER}} .button2',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 16, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 500 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->end_controls_section();

        // ------------------ Main Image ------------------
        $this->start_controls_section(
            'style_image_section',
            [
                'label' => __( 'تصویر اصلی', 'mytube' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'image_width',
            [
                'label' => __( 'عرض تصویر', 'mytube' ),
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
                    'size' => 515,
                ],
                'selectors' => [
                    '{{WRAPPER}} .main-image' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_height',
            [
                'label' => __( 'ارتفاع تصویر', 'mytube' ),
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
                    '{{WRAPPER}} .main-image' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // ------------------ Counters ------------------

        $this->start_controls_section(
            'style_counters_section',
            [
                'label' => __( 'شمارش گرها', 'mytube' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'counter_number_color',
            [
                'label'     => __( 'رنگ عدد شمارش گر', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .counter-number' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'counter_number_typography',
                'label'    => __( 'تایپوگرافی عدد شمارش گر', 'mytube' ),
                'selector' => '{{WRAPPER}} .counter-number',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 24, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 700 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_responsive_control(
            'counter_suffix_color',
            [
                'label'     => __( 'رنگ پسوند شمارش گر', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .counter-suffix' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'counter_suffix_typography',
                'label'    => __( 'تایپوگرافی پسوند شمارش گر', 'mytube' ),
                'selector' => '{{WRAPPER}} .counter-suffix',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 24, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 700 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_responsive_control(
            'counter_text_color',
            [
                'label'     => __( 'رنگ متن شمارش گر', 'mytube' ),
                'default'   => '#ffffff85',
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'counter_text_typography',
                'label'    => __( 'تایپوگرافی متن شمارش گر', 'mytube' ),
                'selector' => '{{WRAPPER}} .counter-text',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 14, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 500 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->end_controls_section();
    }

    public function render() {
        $settings = $this->get_settings_for_display();
        $default_icon = get_template_directory_uri() . '/assets/icon/calendar.svg';
        $counters = $settings['counters_list'];

        ?>
        <div class="main-banner-wrapper">
            <div class="first-layer"></div>
            <div class="second-layer"></div>
            <div class="main-banner">
                <img class="bg-shape" src="<?php echo get_template_directory_uri(); ?>/assets/img/main-banner/bg-shape.png" />
                <img class="bg-shape-mobile" src="<?php echo get_template_directory_uri(); ?>/assets/img/main-banner/bg-mobile.png" />
                <div class="content-section">
                    <h1 class="main-title">
                        <?php echo esc_html($settings['mb_heading_text']); ?>
                    </h1>
                    <div class="description">
                        <?php echo $settings['mb_description'] ?>
                    </div>
                    <div class="buttons">
                        <a href="<?php echo esc_url($settings['mb_button1_link']['url']); ?>" class="button1">
                            <?php echo esc_html($settings['mb_button1_text']); ?>
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/icon/arrow.svg') ?>" alt="arrow-icon" />
                        </a>
                        <a href="<?php echo esc_url($settings['mb_button2_link']['url']); ?>" class="button2">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/icon/crooked-arrow.svg') ?>" alt="crooked-arrow" />
                            <?php echo esc_html($settings['mb_button2_text']); ?>
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/icon/youtube.svg') ?>" alt="youtube" />
                        </a>
                    </div>
                </div>
                <?php if ( ! empty( $settings['mb_main_image']['url'] ) ) : ?>
                    <div class="main-image">
                        <img src="<?php echo esc_url( $settings['mb_main_image']['url'] ); ?>" alt="">
                    </div>
                <?php endif; ?>
                <?php if (!empty($counters)) : ?>
                    <div class="counters-section">
                        <img class="frame" src="<?php echo get_template_directory_uri(); ?>/assets/img/main-banner/frame.svg" />
                        <?php foreach ($counters as $counter) : ?>
                            <div class="counter">
                                <div class="counter-icon-wrapper">
                                    <?php if (!empty($counter['mb_counter_icon']['url'])) : ?>
                                        <?php
                                            $image_url = !empty($counter['mb_counter_icon']['url']) 
                                            ? $counter['mb_counter_icon']['url'] 
                                            : $default_icon;
                                        ?>
                                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($counter['mb_counter_text']); ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="text-wrapper">
                                    <div class="number-suffix">
                                        <span class="counter-number" data-target="<?php echo esc_attr($counter['mb_counter_number']); ?>">0</span>
                                        <span class="counter-suffix">
                                            <?php echo esc_attr($counter['mb_counter_suffix']); ?>
                                        </span>
                                    </div>
                                    <div class="counter-text">
                                        <?php echo esc_attr($counter['mb_counter_text']); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }
}