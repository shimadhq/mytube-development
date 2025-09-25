<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Playlist extends Widget_Base{
    public function get_name() {
        return 'playlist';
    }

    public function get_title() {
        return 'لیست های پخش';
    }

    public function get_icon() {
        return 'eicon-gallery-grid';
    }

    public function get_style_depends() {
        return ['playlist'];
    }

    public function get_categories() {
        return [ 'mytube-category' ];
    }

    protected function register_controls(){
        $this->start_controls_section(
            'content_section',
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
                    'url' => get_template_directory_uri() . '/assets/img/playlist/list.svg',
                ],
            ]
        );

        $this->add_control(
            'heading',
            [
                'label' => __( 'عنوان', 'mytube' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'لیــــســـــت های پخــش', 'mytube' ),
            ]
        );

        $this->add_control(
            'heading_image',
            [
                'label' => __( 'تصویر عنوان', 'mytube' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/img/playlist/camera.png',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'items_section',
            [
                'label' => 'آیتم ها',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'item_icon',
            [
                'label' => __( 'آیکن آیتم', 'mytube' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'item_title',
            [
                'label' => __( 'عنوان آیتم', 'mytube' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'عنوان آیتم', 'mytube' ),
            ]
        );

        $repeater->add_control(
            'item_text',
            [
                'label' => __( 'محتوای آیتم', 'mytube' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'تعداد ویدیو', 'mytube' ),
            ]
        );

        $this->add_control(
            'items',
            [
                'label' => __( 'محتوای آیتم', 'mytube' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ item_title }}}',
                'default' => [
                    [
                        'item_icon' => ['url' => get_template_directory_uri() . '/assets/img/playlist/puzzle.svg'],
                        'item_title' => __( 'چالش های امسال', 'mytube' ),
                        'item_text' => __('۱ ویدیو', 'mytube'),
                    ],
                    [
                        'item_icon' => ['url' => get_template_directory_uri() . '/assets/img/playlist/smile.svg'],
                        'item_title' => __( 'میم هایی که شما فرستادید', 'mytube' ),
                        'item_text' => __('۳۴ ویدیو', 'mytube'),
                    ],
                    [
                        'item_icon' => ['url' => get_template_directory_uri() . '/assets/img/playlist/puzzle.svg'],
                        'item_title' => __( 'یه هفته زندگی تو جنگل', 'mytube' ),
                        'item_text' => __('۹ ویدیو', 'mytube'),
                    ],
                    [
                        'item_icon' => ['url' => get_template_directory_uri() . '/assets/img/playlist/handle.svg'],
                        'item_title' => __( 'آموزش بازی WOW', 'mytube' ),
                        'item_text' => __('۳۴ ویدیو', 'mytube'),
                    ],
                    [
                        'item_icon' => ['url' => get_template_directory_uri() . '/assets/img/playlist/puzzle.svg'],
                        'item_title' => __( 'سعی کن نخندی', 'mytube' ),
                        'item_text' => __('۲ ویدیو', 'mytube'),
                    ],
                    [
                        'item_icon' => ['url' => get_template_directory_uri() . '/assets/img/playlist/handle.svg'],
                        'item_title' => __( 'گیم پلی و استریم بازی', 'mytube' ),
                        'item_text' => __('۳۴ ویدیو', 'mytube'),
                    ],
                ],
            ]
        );

        $this->end_controls_section();

        // ------------------ Title Background ------------------
        $this->start_controls_section(
            'style_background_section',
            [
                'label' => __( 'بک گراند', 'mytube' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            ' title_bg_color',
            [
                'label'     => __( 'رنگ پس‌زمینه', 'mytube' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#EEEEEE',
                'selectors' => [
                    '{{WRAPPER}} .title-container' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // ------------------ Title Typography ------------------
        $this->start_controls_section(
            'style_title_section',
            [
                'label' => __( 'عنوان اصلی', 'mytube' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'title_color',
            [
                'label'     => __( 'رنگ عنوان', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493A3A',
                'selectors' => [
                    '{{WRAPPER}} .playlist-main-heading' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typography',
                'label'    => __( 'تایپوگرافی عنوان', 'mytube' ),
                'selector' => '{{WRAPPER}} .playlist-main-heading',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 16, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 900 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->end_controls_section();

        // ------------------ Title Icon ------------------
        $this->start_controls_section(
            'style_title_icon_section',
            [
                'label' => __( 'آیکن اصلی', 'mytube' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'tab_icon_width',
            [
                'label' => __( 'اندازه آیکن', 'mytube' ),
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
                    '{{WRAPPER}} .main-icon' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'main_icon_bg',
            [
                'label'     => __( 'رنگ پس‌زمینه آیکن', 'mytube' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#FF4545',
                'selectors' => [
                    '{{WRAPPER}} .main-icon-wrapper' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // ------------------ Main image ------------------
        $this->start_controls_section(
            'style_image_section',
            [
                'label' => __( 'تصویر اصلی', 'mytube' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'main_image_width',
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
                    'size' => 200,
                ],
                'selectors' => [
                    '{{WRAPPER}} .main-image' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'main_image_height',
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

        // ------------------ Items ------------------
        $this->start_controls_section(
            'style_items_section',
            [
                'label' => __( 'آیتم ها', 'mytube' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'item_title_color',
            [
                'label'     => __( 'رنگ عنوان آیتم', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493A3A',
                'selectors' => [
                    '{{WRAPPER}} .item-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'item_title_typography',
                'label'    => __( 'تایپوگرافی عنوان آیتم', 'mytube' ),
                'selector' => '{{WRAPPER}} .item-title',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 16, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 700 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_responsive_control(
            'item_description_color',
            [
                'label'     => __( 'رنگ محتوای آیتم', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493a3a79',
                'selectors' => [
                    '{{WRAPPER}} .item-description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'item_description_typography',
                'label'    => __( 'تایپوگرافی محتوای آیتم', 'mytube' ),
                'selector' => '{{WRAPPER}} .item-description',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 14, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 500 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_responsive_control(
            'item_icon_width',
            [
                'label' => __( 'اندازه آیکن آیتم', 'mytube' ),
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
                    '{{WRAPPER}} .item-icon' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    public function render() {
        $settings = $this->get_settings_for_display();
        $items = $settings['items'];
        $current = 0;

        ?>
        <div class="playlist">
            <div class="title-container">
                <img class="shape" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/video-category/shape.svg') ?>" alt="" />
                <div class="title-wrap">
                    <div class="main-icon-wrapper">
                        <img class="main-icon" src="<?php echo esc_url( $settings['heading_icon']['url'] ) ?>" alt="" />
                    </div>
                    <span class="playlist-main-heading">
                        <?php echo esc_html($settings['heading']); ?>
                    </span>
                </div>
                <div class="title-image-wrapper">
                    <img class="playlist-main-image" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/playlist/camera.png') ?>" />
                </div>
                <img class="gray-shape" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/playlist/gray-shape.svg') ?>" />
                <img class="traingle-shape" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/playlist/traingle-shape.svg') ?>" />
            </div>
            <div class="items-container">
                <?php foreach ($items as $item) : ?>
                    <?php $current++; ?>
                    <div class="item-content">
                        <svg class="custom-shape" viewBox="0 0 145 58" xmlns="http://www.w3.org/2000/svg">
                            <path d="M145 5.11268C145 31.449 145 44.6171 137.238 51.749C135.902 52.9757 134.433 54.0472 132.856 54.9429C123.691 60.1503 111.155 56.1205 86.0817 48.0608L24.2397 28.1817C16.984 25.8494 13.3561 24.6832 10.4915 22.7325C5.90957 19.6123 2.54902 15.0021 0.980703 9.68519C0.000203665 6.36106 0.00018874 2.55036 0.00014363 -5.07103C9.87432e-05 -15.2489 8.39293e-05 -20.3378 1.51867 -24.4014C3.95176 -30.912 9.08785 -36.0482 15.5985 -38.4813C19.6621 -39.9999 24.751 -39.9999 34.9289 -39.9999L99.8875 -39.9999C119.721 -39.9999 129.637 -39.9999 136.294 -34.4959C137.46 -33.5318 138.532 -32.4596 139.496 -31.2935C145 -24.6371 145 -14.7205 145 5.11268Z" 
                            fill="currentColor"/>
                        </svg>
                        <div class="text-content">
                            <?php if (!empty($item['item_icon']['url'])) : ?>
                                <img class="item-icon" src="<?php echo esc_url($item['item_icon']['url']); ?>" />
                            <?php endif; ?>
                            <span class="item-description"><?php echo esc_html($item['item_text']); ?></span>
                        </div>
                        <div class="title-content">
                            <div class="playlist-title-wrapper">
                                <span class="item-title"><?php echo esc_html($item['item_title']); ?></span>
                                <span class="mobile-item-description"><?php echo esc_html($item['item_text']); ?></span>
                            </div>
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/playlist/red-arrow.svg') ?>" alt="arrow-icon" />
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
}