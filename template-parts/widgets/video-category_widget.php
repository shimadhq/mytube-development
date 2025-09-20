<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Video_Category extends Widget_Base{
    public function get_name() {
        return 'video-category';
    }

    public function get_title() {
        return 'دسته بندی ویدیوها';
    }

    public function get_icon() {
        return 'eicon-thumbnails-right';
    }

    public function get_style_depends() {
        return ['video-category'];
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
                'label' => 'آیکن عنوان',
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/img/video-category/video-list.svg',
                ],
            ]
        );

        $this->add_control(
            'heading',
            [
                'label' => 'عنوان',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'دســتـه بــنـــدی ویــــدیـــو ها',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_tabs',
            [
                'label' => __( 'تب‌ها', 'mytube' ),
            ]
        );

        // Inner repeater for tab content
        $inner_repeater = new \Elementor\Repeater();

        $inner_repeater->add_control(
            'image',
            [
                'label' => __( 'تصویر', 'mytube' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $inner_repeater->add_control(
            'icon_image',
            [
                'label' => __( 'آیکن تصویر', 'mytube' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $inner_repeater->add_control(
            'title',
            [
                'label' => __( 'عنوان', 'mytube' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'عنوان ویدیو', 'mytube' ),
            ]
        );

        $inner_repeater->add_control(
            'text',
            [
                'label' => __( 'توضیحات', 'mytube' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'توضیح کوتاه ویدیو', 'mytube' ),
            ]
        );

        $inner_repeater->add_control(
            'icon',
            [
                'label' => __( 'آیکن', 'mytube' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        // Main repeater for tabs
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'tab_title',
            [
                'label' => __( 'عنوان تب', 'mytube' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'عنوان تب', 'mytube' ),
            ]
        );

        $repeater->add_control(
            'tab_description',
            [
                'label' => __('توضیحات تب', 'mytube'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'متن نمونه', 'mytube' ),
            ]
        );

        $repeater->add_control(
            'tab_icon',
            [
                'label' => __('آیکن تب', 'mytube'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'tab_header_title',
            [
                'label' => __( 'عنوان بالای محتوا', 'mytube' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'جـــدیدتـــریــــن ویــــــدیــــو ها', 'mytube' ),
            ]
        );

        $repeater->add_control(
            'tab_header_text',
            [
                'label' => __( 'دکمه بالای محتوا', 'mytube' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'همه ویدیو ها', 'mytube' ),
            ]
        );

        $repeater->add_control(
            'tab_header_link',
            [
                'label' => 'لینک دکمه',
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $repeater->add_control(
            'tab_content',
            [
                'label' => __( 'محتوای تب', 'mytube' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $inner_repeater->get_controls(),
                'title_field' => '{{{ title }}}',
                'default' => [
                    [
                        'image' => ['url' => get_template_directory_uri() . '/assets/img/video-category/video1.png'],
                        'icon_image' => ['url' => get_template_directory_uri() . '/assets/icon/puzzle.svg'],
                        'title' => __( 'هفت روز ماجراجویی توی شهر زیرزمینی', 'mytube' ),
                        'text' => __( 'با دو تا از دوستای یوتیوبرمون قراره هفت روز بریم ...', 'mytube' ),
                        'icon' => ['url' => get_template_directory_uri() . '/assets/img/video-category/youtube.svg'],

                    ],
                    [
                        'image' => ['url' => get_template_directory_uri() . '/assets/img/video-category/video2.png'],
                        'icon_image' => ['url' => get_template_directory_uri() . '/assets/icon/smily.svg'], 
                        'title' => __( 'دعوای یوتیوبرا سر ۱ میلیون دلار', 'mytube' ),
                        'text' => __('پنجاه تا یوتیوبر برتر جهان رو جمع کردیم یه جا که ...', 'mytube'),
                        'icon' => ['url' => get_template_directory_uri() . '/assets/img/video-category/youtube.svg'],
                    ],
                ],
            ]
        );

        $this->add_control(
            'tabs',
            [
                'label' => __( 'لیست تب‌ها', 'mytube' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ tab_title }}}',
                'default' => [
                    [
                        'tab_title' => __( 'معرفی بازی و گیم پلی', 'mytube' ),
                        'tab_description' => __('۳۴ ویدیو', 'mytube'),
                        'tab_icon' => ['url' => get_template_directory_uri() . '/assets/icon/handle.svg'],
                    ],
                    [
                        'tab_title' => __( 'ویدیو های طنز', 'mytube' ),
                        'tab_description' => __('۷۰ ویدیو', 'mytube'),
                        'tab_icon' => ['url' => get_template_directory_uri() . '/assets/icon/smily-face.svg'],
                    ],
                    [
                        'tab_title' => __( 'چالش ها', 'mytube' ),
                        'tab_description' => __('۱۲ ویدیو', 'mytube'),
                        'tab_icon' => ['url' => get_template_directory_uri() . '/assets/icon/red-puzzle.svg'],
                    ],
                ],
            ]
        );

        $this->end_controls_section();


        // ------------------ Tabs Background ------------------
        $this->start_controls_section(
            'style_background_section',
            [
                'label' => __( 'بک گراند', 'mytube' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'main_bg',
                'label'    => __( 'رنگ پس زمینه', 'mytube' ),
                'types'    => [ 'gradient' ], 
                'selector' => '{{WRAPPER}} .tabs-section',
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


        // ------------------ Tabs List ------------------
        $this->start_controls_section(
            'style_tabs_list_section',
            [
                'label' => __( 'لیست تب ها', 'mytube' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'tab_title_color',
            [
                'label'     => __( 'رنگ عنوان تب', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493A3A',
                'selectors' => [
                    '{{WRAPPER}} .tab-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'tab_title_typography',
                'label'    => __( 'تایپوگرافی عنوان تب', 'mytube' ),
                'selector' => '{{WRAPPER}} .tab-title',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 16, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 700 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_responsive_control(
            'tab_description_color',
            [
                'label'     => __( 'رنگ متن توضیحات', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493a3a79',
                'selectors' => [
                    '{{WRAPPER}} .tab-description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'tab_description_typography',
                'label'    => __( 'تایپوگرافی متن توضیحات', 'mytube' ),
                'selector' => '{{WRAPPER}} .tab-description',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 14, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 500 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_responsive_control(
            'tab_icon_width',
            [
                'label' => __( 'اندازه آیکن تب', 'mytube' ),
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
                    '{{WRAPPER}} .tab-icon' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'top_title_color',
            [
                'label'     => __( 'رنگ عنوان بالای محتوا', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493A3A',
                'selectors' => [
                    '{{WRAPPER}} .top-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'top_title_typography',
                'label'    => __( 'تایپوگرافی عنوان بالای محتوا', 'mytube' ),
                'selector' => '{{WRAPPER}} .top-title',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 16, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 900 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_responsive_control(
            'tab_button_color',
            [
                'label'     => __( 'رنگ دکمه', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493A3A',
                'selectors' => [
                    '{{WRAPPER}} .tab-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'tab_button_bg_color',
            [
                'label'     => __( 'رنگ پس‌زمینه دکمه', 'mytube' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#EEEEEE',
                'selectors' => [
                    '{{WRAPPER}} .tab-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'tab_button_typography',
                'label'    => __( 'تایپوگرافی متن دکمه', 'mytube' ),
                'selector' => '{{WRAPPER}} .tab-button',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 16, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 700 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->end_controls_section();

        // ------------------ Tabs Content ------------------
        $this->start_controls_section(
            'style_tabs_content_section',
            [
                'label' => __( 'محتوای تب ها', 'mytube' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'tab_column_bg_color',
            [
                'label'     => __( 'رنگ پس‌زمینه هر ستون', 'mytube' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#EEEEEE',
                'selectors' => [
                    '{{WRAPPER}} .tab-column' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'tab_column_image_width',
            [
                'label' => __( 'عرض تصویر هر ستون', 'mytube' ),
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
                    'size' => 408,
                ],
                'selectors' => [
                    '{{WRAPPER}} .tab-column-image' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'tab_column_image_height',
            [
                'label' => __( 'ارتفاع تصویر هر ستون', 'mytube' ),
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
                    '{{WRAPPER}} .tab-column-image' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'tab_column_title_color',
            [
                'label'     => __( 'رنگ عنوان هر ستون', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493A3A',
                'selectors' => [
                    '{{WRAPPER}} .tab-column-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'tab_column_title_typography',
                'label'    => __( 'تایپوگرافی عنوان هر ستون', 'mytube' ),
                'selector' => '{{WRAPPER}} .tab-column-title',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 18, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 900 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_responsive_control(
            'tab_column_text_color',
            [
                'label'     => __( 'رنگ متن هر ستون', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493a3a69',
                'selectors' => [
                    '{{WRAPPER}} .tab-column-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'tab_column_text_typography',
                'label'    => __( 'تایپوگرافی متن هر ستون', 'mytube' ),
                'selector' => '{{WRAPPER}} .tab-column-text',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 14, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 500 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );
    }
    

    public function render() {
        $settings = $this->get_settings_for_display();
        $tabs = $settings['tabs'];
        $current = 0;

        ?>
        <div class="video-category">
            <div class="tabs-section">
                <div class="tab">
                    <img class="shape" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/video-category/shape.svg') ?>" alt="" />
                    <div class="title-section">
                        <div class="image-wrapper">
                            <img class="heading-icon" src="<?php echo esc_url( $settings['heading_icon']['url'] ) ?>" alt="" />
                        </div>
                        <span class="main-heading">
                            <?php echo esc_html($settings['heading']); ?>
                        </span>
                    </div>
                    <div class="mytube-titles-wrapper">
                        <?php foreach ($tabs as $index => $tab) : ?>
                            <?php $current++; ?>
                            <div class="title-wrapper <?php echo $index === 0 ? 'active' : ''; ?>" data-tab="<?php echo $index; ?>">
                                <div class="title-image">
                                    <div class="tab-icon-wrapper">
                                    <?php if ( !empty($tab['tab_icon']['url']) ) : ?>
                                        <img src="<?php echo esc_url($tab['tab_icon']['url']); ?>" alt="<?php echo esc_attr($tab['tab_title']); ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="text-wrapper">
                                    <span class="tab-title">
                                        <?php echo esc_html($tab['tab_title']); ?>
                                    </span>
                                    <span class="tab-description">
                                        <?php echo esc_html($tab['tab_description']); ?>
                                    </span>
                                </div>
                                </div>
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/icon/arrow.svg') ?>" alt="arrow-icon" />
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="button-section">
                    <span class="categories-link">
                        همه دسته بندی ها
                    </span>
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/icon/arrow.svg') ?>" alt="arrow-icon" />
                </div>
            </div>
            <div class="tabs-content">
                <?php foreach ($tabs as $tab_index => $tab) : ?>
                    <?php $current++; ?>
                    <div class="tab-pane <?php echo $tab_index === 0 ? 'active' : ''; ?>" data-tab="<?php echo $tab_index; ?>">
                        <img class="shape2" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/video-category/shape2.svg') ?>" alt="" />
                        <div class="tab-header">
                            <div class="top-title">
                                <div class="top-icon-wrapper">
                                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/icon/video.svg') ?>" />
                                </div>
                                <span class="tab-main-title"><?php echo esc_html($tab['tab_header_title']); ?></span>
                            </div>
                            <a href="<?php echo esc_url($tab['tab_header_link']['url']) ?>" class="tab-button">
                                <?php echo esc_html($tab['tab_header_text']); ?>
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/icon/arrow.svg') ?>" alt="arrow-icon" />
                            </a>
                        </div>
                        <img class="shape3" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/video-category/shape3.svg') ?>" alt="" />
                        <div class="tab-body">
                            <div class="tab-columns">
                                <?php if (!empty($tab['tab_content'])) : ?>
                                    <?php foreach ($tab['tab_content'] as $column) : ?>
                                        <div class="tab-column">
                                            <div class="column-image-wrapper">
                                                <?php if (!empty($column['image']['url'])) : ?>
                                                    <img class="tab-column-image" src="<?php echo esc_url($column['image']['url']); ?>" alt="">
                                                <?php endif; ?>

                                                <?php if (!empty($column['icon_image']['url'])) : ?>
                                                    <div class="image-icon-wrapper">
                                                        <img src="<?php echo esc_url($column['icon_image']['url']); ?>" alt="">
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="tab-column-content">
                                                <div class="tab-column-text">
                                                    <span class="tab-column-title"><?php echo esc_html($column['title']); ?></span>
                                                    <span class="tab-column-text"><?php echo esc_html($column['text']); ?></span>
                                                </div>
                                                <?php if (!empty($column['icon']['url'])) : ?>
                                                    <img src="<?php echo esc_url($column['icon']['url']); ?>" alt="youtube-icon" />
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
}