<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Short_Videos extends Widget_Base{
    public function get_name() {
        return 'short-videos';
    }

    public function get_title() {
        return 'ویدیوهای کوتاه';
    }

    public function get_icon() {
        return 'eicon-play-o';
    }

    public function get_style_depends() {
        return ['short-videos'];
    }

    public function get_categories() {
        return [ 'mytube-category' ];
    }

    protected function register_controls(){
        $this->start_controls_section(
            'content_section',
            [
                'label' => 'عنوان',
            ]
        );

        $this->add_control(
            'heading_icon',
            [
                'label' => __( 'آیکن عنوان', 'mytube' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/img/short-videos/short-videos.svg',
                ],
            ]
        );

        $this->add_control(
            'heading',
            [
                'label' => __( 'عنوان', 'mytube' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'ویـــدیــــــو های کــــــــوتـــــــــــــاه', 'mytube' ),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'counters_section',
            [
                'label' => 'شمارش گرها'
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'counter_icon',
            [
                'label' => 'آیکن شمارش گر',
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'counter_number',
            [
                'label' => 'عدد شمارش گر',
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 0,
                'placeholder' => 'عدد نهایی را وارد کنید',
            ]
        );

        $repeater->add_control(
            'counter_text',
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
                'title_field' => '{{{ counter_text }}}',
                'default' => [
                    [
                        'counter_icon' => ['url' => get_template_directory_uri() . '/assets/img/short-videos/play.svg'],
                        'counter_number' => __('۶۷', 'mytube'),
                        'counter_text' => __('ویدیوی کوتاه', 'mytube'),
                    ],
                    [
                        'counter_icon' => ['url' => get_template_directory_uri() . '/assets/img/short-videos/film.svg'],
                        'counter_number' => __('۲۴۸', 'mytube'),
                        'counter_text' => __('همه ویدیو ها', 'mytube'),
                    ],
                    [
                        'counter_icon' => ['url' => get_template_directory_uri() . '/assets/img/short-videos/playlist.svg'],
                        'counter_number' => __('۲۳', 'mytube'),
                        'counter_text' => __('لیست های پخش', 'mytube'),
                    ]
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'button_section',
            [
                'label' => 'دکمه'
            ]
        );

        $this->add_control(
            'button_title',
            [
                'label' => 'عنوان دکمه',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'همه ویدیو ها', 'mytube' ),
            ]
        );

        $this->add_control(
            'button_url',
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
            'videos_section',
            [
                'label' => 'ویدیوها'
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'video_url',
            [
                'label' => 'لینک ویدیو',
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['video'],
                'default' => [
                    'url' => '',
                ],
            ]
        );

        $repeater->add_control(
            'video_thumbnail',
            [
                'label' => 'تصویر کاور (Thumbnail)',
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['image'],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'video_puzzle_icon',
            [
                'label' => 'آیکن بالای ویدیو',
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'video_title',
            [
                'label' => 'عنوان ویدیو',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'عنوان نمونه',
                'placeholder' => 'عنوان نمونه را وارد کنید',
            ]
        );

        $repeater->add_control(
            'video_text',
            [
                'label' => 'متن ویدیو',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'متن نمونه',
                'placeholder' => 'متن نمونه را وارد کنید',
            ]
        );

        $this->add_control(
            'videos_list',
            [
                'label' => 'لیست ویدیوها',
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ video_title }}}',
                'default' => [
                    [
                        'video_thumbnail' =>  ['url' => get_template_directory_uri() . '/assets/img/short-videos/video1.png'],
                        'video_url' => '',
                        'video_title' => __( 'برای چالش ماشین جدید گرفتیم !', 'mytube' ),
                        'video_text' => __( 'بریم بینیم استقامت این ماشین چقدره!', 'mytube' ),
                        'video_puzzle_icon' => ['url' => get_template_directory_uri() . '/assets/img/short-videos/puzzle-icon.svg'],
                    ],
                    [
                        'video_thumbnail' =>  ['url' => get_template_directory_uri() . '/assets/img/short-videos/video2.png'],
                        'video_url' => '',
                        'video_title' => __( 'مصاحبه با یوتیوبر ها پارت اول', 'mytube' ),
                        'video_text' => __( 'مصاحبه با معروفترین یوتیوبر ها', 'mytube' ),
                        'video_puzzle_icon' => ['url' => get_template_directory_uri() . '/assets/img/short-videos/puzzle-icon.svg'],
                    ]
                ],
            ]
        );

        $this->end_controls_section();

        // ------------------ Title & decs ------------------
        $this->start_controls_section(
            'style_heading_section',
            [
                'label' => __( 'عنوان', 'mytube' ),
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
                    '{{WRAPPER}} .short-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typography',
                'label'    => __( 'تایپوگرافی عنوان', 'mytube' ),
                'selector' => '{{WRAPPER}} .short-title',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 16, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 900 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->end_controls_section();
    }

    public function render() {
        $settings = $this->get_settings_for_display();
    }
}