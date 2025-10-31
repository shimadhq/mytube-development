<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Most_Visited_Slider extends Widget_Base{
    public function get_name() {
        return 'most-visited-slider';
    }

    public function get_title() {
        return 'پربازدید ترین اسلایدر';
    }

    public function get_icon() {
        return 'eicon-slider-3d';
    }

    public function get_style_depends() {
        return ['most-visited-slider'];
    }

    public function get_categories() {
        return [ 'mytube-category' ];
    }

    protected function register_controls(){
        $this->start_controls_section(
            'mvs_content_section',
            [
                'label' => 'محتوا',
            ]
        );

        $this->add_control(
            'heading_icon',
            [
                'label' => __( 'آیکن عنوان', 'mytube' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/img/widgets/most-visited-slider/glow.svg',
                ],
            ]
        );

        $this->add_control(
            'heading',
            [
                'label' => __( 'عنوان', 'mytube' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'پربــــازدیــــد تــــریـن ها', 'mytube' ),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'mvs_slides_section',
            [
                'label' => 'اسلاید ها',
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'slide_image',
            [
                'label' => __( 'تصویر اسلاید', 'mytube' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'slide_title',
            [
                'label' => __( 'عنوان اسلاید', 'mytube' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'عنوان اسلاید', 'mytube' ),
            ]
        );

        $repeater->add_control(
            'slide_text',
            [
                'label' => __( 'توضیحات اسلاید', 'mytube' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'توضیحات اسلاید', 'mytube' ),
            ]
        );

        $repeater->add_control(
            'slide_icon',
            [
                'label' => __( 'آیکن اسلاید', 'mytube' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'category_title',
            [
                'label' => __( 'عنوان کتگوری', 'mytube' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'عنوان اسلاید', 'mytube' ),
            ]
        );

        $repeater->add_control(
            'category_icon',
            [
                'label' => __( 'آیکن کتگوری', 'mytube' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'time',
            [
                'label' => __( 'زمان انتشار', 'mytube' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'زمان انتشار', 'mytube' ),
            ]
        );

        $repeater->add_control(
            'time_icon',
            [
                'label' => __( 'آیکن انتشار', 'mytube' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'slides',
            [
                'label' => __( 'اسلاید ها', 'mytube' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ slide_title }}}',
                'default' => [
                    [
                        'slide_image' => ['url' => get_template_directory_uri() . '/assets/img/widgets/most-visited-slider/image1.webp'],
                        'slide_title' => __( 'بهترین رپر ایران از نظر پیشرو', 'mytube' ),
                        'slide_text' =>  __( 'اینو دیگ واقعا نخندی میگم پوتک ...', 'mytube' ),
                        'slide_icon' => ['url' => get_template_directory_uri() . '/assets/img/widgets/video-category/youtube.svg'],
                        'category_icon' => ['url' => get_template_directory_uri() . '/assets/img/widgets/most-visited-slider/red-puzzle.svg'],
                        'category_title' => __( 'چالش ها', 'mytube' ),
                        'time_icon' => ['url' => get_template_directory_uri() . '/assets/img/widgets/most-visited-slider/clock.svg'],
                        'time' => __( '۳ ساعت پیش', 'mytube' ),
                    ],
                    [
                        'slide_image' => ['url' => get_template_directory_uri() . '/assets/img/widgets/most-visited-slider/image2.webp'],
                        'slide_title' => __( 'روز ۵۱م زندگی تو جنگل', 'mytube' ),
                        'slide_text' =>  __( 'با این وضع دیگ نمیشه ادامه داد...', 'mytube' ),
                        'slide_icon' => ['url' => get_template_directory_uri() . '/assets/img/widgets/video-category/youtube.svg'],
                        'category_icon' => ['url' => get_template_directory_uri() . '/assets/img/widgets/most-visited-slider/red-puzzle.svg'],
                        'category_title' => __( 'چالش ها', 'mytube' ),
                        'time_icon' => ['url' => get_template_directory_uri() . '/assets/img/widgets/most-visited-slider/clock.svg'],
                        'time' => __( '۳ ساعت پیش', 'mytube' ),
                    ],
                    [
                        'slide_image' => ['url' => get_template_directory_uri() . '/assets/img/widgets/most-visited-slider/image3.webp'],
                        'slide_title' => __( 'دعوای یوتیوبرا سر ۱ میلیون دلار', 'mytube' ),
                        'slide_text' =>  __( 'پنجاه تا یوتیوبر برتر جهان رو ...', 'mytube' ),
                        'slide_icon' => ['url' => get_template_directory_uri() . '/assets/img/widgets/video-category/youtube.svg'],
                        'category_icon' => ['url' => get_template_directory_uri() . '/assets/img/widgets/most-visited-slider/red-puzzle.svg'],
                        'category_title' => __( 'چالش ها', 'mytube' ),
                        'time_icon' => ['url' => get_template_directory_uri() . '/assets/img/widgets/most-visited-slider/clock.svg'],
                        'time' => __( '۳ ساعت پیش', 'mytube' ),
                    ],
                    [
                        'slide_image' => ['url' => get_template_directory_uri() . '/assets/img/widgets/most-visited-slider/image4.webp'],
                        'slide_title' => __( 'واکنش خود لامبورگینی دیدنیه', 'mytube' ),
                        'slide_text' =>  __( 'فک کنم کمپانی لامبورگینی دیگه ...', 'mytube' ),
                        'slide_icon' => ['url' => get_template_directory_uri() . '/assets/img/widgets/video-category/youtube.svg'],
                        'category_icon' => ['url' => get_template_directory_uri() . '/assets/img/widgets/most-visited-slider/red-puzzle.svg'],
                        'category_title' => __( 'چالش ها', 'mytube' ),
                        'time_icon' => ['url' => get_template_directory_uri() . '/assets/img/widgets/most-visited-slider/clock.svg'],
                        'time' => __( '۳ ساعت پیش', 'mytube' ),
                    ],
                    [
                        'slide_image' => ['url' => get_template_directory_uri() . '/assets/img/widgets/most-visited-slider/image5.webp'],
                        'slide_title' => __( 'دوباره یه ماشین دیگ', 'mytube' ),
                        'slide_text' =>  __( 'اینو دیگ واقعا نخندی میگم پوتک ...', 'mytube' ),
                        'slide_icon' => ['url' => get_template_directory_uri() . '/assets/img/widgets/video-category/youtube.svg'],
                        'category_icon' => ['url' => get_template_directory_uri() . '/assets/img/widgets/most-visited-slider/red-puzzle.svg'],
                        'category_title' => __( 'چالش ها', 'mytube' ),
                        'time_icon' => ['url' => get_template_directory_uri() . '/assets/img/widgets/most-visited-slider/clock.svg'],
                        'time' => __( '۳ ساعت پیش', 'mytube' ),
                    ],
                ],
            ]
        );

        $this->end_controls_section();

        // ------------------ Main Title ------------------
        $this->start_controls_section(
            'style_title_section',
            [
                'label' => __( 'عنوان اصلی', 'mytube' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'slider_title_color',
            [
                'label'     => __( 'رنگ عنوان', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493A3A',
                'selectors' => [
                    '{{WRAPPER}} .slider-main-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'slider_title_typography',
                'label'    => __( 'تایپوگرافی عنوان', 'mytube' ),
                'selector' => '{{WRAPPER}} .slider-main-title',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 16, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 900 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_slider_section',
            [
                'label' => __( 'اسلاید ها', 'mytube' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'slide_title_color',
            [
                'label'     => __( 'رنگ عنوان اسلاید', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493A3A',
                'selectors' => [
                    '{{WRAPPER}} .slide-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'slide_title_typography',
                'label'    => __( 'تایپوگرافی عنوان اسلاید', 'mytube' ),
                'selector' => '{{WRAPPER}} .slide-title',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 16, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 700 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_responsive_control(
            'slide_description_color',
            [
                'label'     => __( 'رنگ متن توضیحات', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493a3a79',
                'selectors' => [
                    '{{WRAPPER}} .slide-description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'slide_description_typography',
                'label'    => __( 'تایپوگرافی متن توضیحات', 'mytube' ),
                'selector' => '{{WRAPPER}} .slide-description',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 14, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 500 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_responsive_control(
            'slide_youtube_icon_width',
            [
                'label' => __( 'اندازه آیکن اسلاید', 'mytube' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 50,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 16,
                ],
                'selectors' => [
                    '{{WRAPPER}} .slide-youtube-icon' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'slide_image_width',
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
                    '{{WRAPPER}} .slide-image' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'slide_image_height',
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
                    '{{WRAPPER}} .slide-image' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();    
    }

    public function render() {
        $settings = $this->get_settings_for_display();
        $slides = $settings['slides'];
        $current = 0;

        ?>
        <div class="most-visited-slider">
            <!-- Header با عنوان و navigation/pagination -->
            <div class="slider-header">
                <img class="slider-shape" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/widgets/video-category/shape.svg') ?>" alt="" />
                <img class="slider-shape2" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/widgets/most-visited-slider/slider-shape.svg') ?>" alt="" />
                <div class="slider-title-wrapper">
                    <img class="slider-shape3" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/widgets/playlist/gray-shape.svg') ?>" />
                    <div class="slider-icon-wrapper">
                        <img class="main-icon" src="<?php echo esc_url( $settings['heading_icon']['url'] ); ?>" alt="" />
                    </div>
                    <span class="slider-main-title">
                        <?php echo esc_html($settings['heading']); ?>
                    </span>
                </div>

                <div class="slider-controls-wrapper desktop-controls">
                    <div class="pagination-wrapper">
                        <div class="custom-pagination"></div>
                    </div>
                    <div class="slider-navigation">
                        <button class="custom-prev">‹</button>
                        <button class="custom-next">›</button>
                    </div>
                </div>
            </div>

            <!-- Swiper اسلایدر پایین -->
            <div class="swiper custom-slider">
                <img class="right-corner" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/widgets/most-visited-slider/right-corner.svg') ?>" alt="" />
                <img class="left-corner" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/widgets/most-visited-slider/left-corner.svg') ?>" alt="" />
                <div class="swiper-wrapper">
                    <?php foreach($slides as $slide): ?>
                        <div class="swiper-slide">
                            <div class="slide-image-wrapper">
                                <?php if (!empty($slide['slide_image']['url'])) : ?>
                                    <img class="slide-image" src="<?php echo esc_url($slide['slide_image']['url']); ?>" alt="">
                                <?php endif; ?>
                            </div>
                            <div class="slide-content">
                                <div class="slide-text">
                                    <span class="slide-title"><?php echo esc_html($slide['slide_title']); ?></span>
                                    <span class="slide-description"><?php echo esc_html($slide['slide_text']); ?></span>
                                </div>
                                <?php if (!empty($slide['slide_icon']['url'])) : ?>
                                    <img src="<?php echo esc_url($slide['slide_icon']['url']); ?>" alt="youtube-icon" />
                                <?php endif; ?>
                            </div>
                            <div class="slide-boxes">
                                <div class="category-box">
                                    <?php if (!empty($slide['category_icon']['url'])) : ?>
                                        <img src="<?php echo esc_url($slide['category_icon']['url']); ?>" />
                                    <?php endif; ?>
                                    <span class="category-title"><?php echo esc_html($slide['category_title']); ?></span>
                                </div>
                                <div class="time-box">
                                    <?php if (!empty($slide['time_icon']['url'])) : ?>
                                        <img src="<?php echo esc_url($slide['time_icon']['url']); ?>" />
                                    <?php endif; ?>
                                    <span class="time-title"><?php echo esc_html($slide['time']); ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="mobile-controls-wrapper">
                <div class="mobile-controls">
                    <button class="custom-prev">‹</button>
                    <button class="custom-next">›</button>
                </div>
            </div>
            <div class="slider-layer1"></div>
            <div class="slider-layer2"></div>
            <div class="slider-layer3"></div>
        </div>
        <?php
    }
}