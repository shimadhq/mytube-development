<?php

namespace WPC\Widgets;

use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

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
            'content_section',
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
                'label' => __( 'تعداد ویدیو', 'mytube' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'تعداد ویدیو', 'mytube' ),
            ]
        );

        $this->add_control(
            'items',
            [
                'label' => __( 'محتوای آیتم', 'mytube' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $inner_repeater->get_controls(),
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
                    '{{WRAPPER}} .title-section' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .main-heading' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typography',
                'label'    => __( 'تایپوگرافی عنوان', 'mytube' ),
                'selector' => '{{WRAPPER}} .main-heading',
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
            'style_title_section',
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
            'style_title_section',
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

        
    }
}