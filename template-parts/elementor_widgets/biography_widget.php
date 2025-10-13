<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Biography extends Widget_Base{
    public function get_name() {
        return 'biography';
    }

    public function get_title() {
        return 'بیوگرافیم';
    }

    public function get_icon() {
        return 'eicon-image-box';
    }

    public function get_style_depends() {
        return ['biography'];
    }

    public function get_categories() {
        return [ 'mytube-category' ];
    }

    protected function register_controls(){
        $this->start_controls_section(
            'bio_title_section',
            [
                'label' => 'عنوان',
            ]
        );

        $this->add_control(
            'bio_heading_icon',
            [
                'label' => __( 'آیکن عنوان', 'mytube' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/img/biography/information.svg',
                ],
            ]
        );

        $this->add_control(
            'bio_heading_text',
            [
                'label' => __( 'عنوان', 'mytube' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'بــیــوگـــرافــیـــم', 'mytube' ),
            ]
        );

        $this->add_control(
            'bio_button_text',
            [
                'label' => 'متن دکمه',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'درباره ما',
            ]
        );

        $this->add_control(
            'bio_button_link',
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
            'bio_content_section',
            [
                'label' => 'بیوگرافی',
            ]
        );

        $this->add_control(
            'biography_heading',
            [
                'label' => __( 'عنوان بیوگرافی', 'mytube' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'مــــــــــــــن کـــــــیَم؟', 'mytube' ),
            ]
        );

        $this->add_control(
            'biography_description',
            [
                'label' => 'متن بیوگرافی',
                'type' =>  \Elementor\Controls_Manager::WYSIWYG,
                'default' => 'سلاااام! به وبسایت چنل یوتیوبمون خوش اومدین. اینجا میتونید ویدیو های چنل رو دنبال کنید و از محتواهای خفنمون لذت ببرید! یادتون نره که حتما چنل اصلیمون رو سابسکرایب کنید!'            
            ]
        );

        $this->add_control(
            'biography_image',
            [
                'label' => 'تصویر بیوگرافی',
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/img/biography/image.webp',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'bio_items_section',
            [
                'label' => 'آیتم ها',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'item_icon',
            [
                'label' => 'تصویر آیتم',
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => '',
                ],
            ]
        );

        $repeater->add_control(
            'item_number',
            [
                'label' => 'عدد آیتم',
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 0,
                'placeholder' => 'عدد نهایی را وارد کنید',
            ]
        );

        $repeater->add_control(
            'item_suffix',
            [
                'label' => 'پسوند آیتم',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
                'placeholder' => 'پسوند نمونه را وارد کنید',
            ]
        );

        $repeater->add_control(
            'item_text',
            [
                'label' => 'متن آیتم',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'متن نمونه',
                'placeholder' => 'متن نمونه را وارد کنید',
            ]
        );

        $this->add_control(
            'items_list',
            [
                'label' => 'لیست آیتم ها',
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ item_text }}}',
                'default' => [
                    [
                        'item_icon' => ['url' => get_template_directory_uri() . '/assets/img/biography/calendar.svg'],
                        'item_number' => __( '10', 'mytube' ),
                        'item_suffix' => __( 'سال', 'mytube' ),
                        'item_text' => __( 'سابــقه فعالیت', 'mytube' ),
                    ],
                    [
                        'item_icon' => ['url' => get_template_directory_uri() . '/assets/img/biography/group.svg'],
                        'item_number' => __( '1', 'mytube' ),
                        'item_suffix' => __( 'میلیون', 'mytube' ),
                        'item_text' => __( 'دنبال کننــــده', 'mytube' ),
                    ],
                    [
                        'item_icon' => ['url' => get_template_directory_uri() . '/assets/img/biography/eye.svg'],
                        'item_number' => __( '3', 'mytube' ),
                        'item_suffix' => __( 'میلیون', 'mytube' ),
                        'item_text' => __( 'بازدید ماهانه', 'mytube' ),
                    ],
                ],
            ]
        );

        $this->end_controls_section();


        // ------------------ Title & decs ------------------
        $this->start_controls_section(
            'bio_style_heading_section',
            [
                'label' => __( 'عنوان', 'mytube' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'bio_heading_color',
            [
                'label'     => __( 'رنگ عنوان', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .bio-heading' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'bio_heading_typography',
                'label'    => __( 'تایپوگرافی عنوان', 'mytube' ),
                'selector' => '{{WRAPPER}} .bio-heading',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 18, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 900 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_responsive_control(
            'bio_button_text_color',
            [
                'label'     => __( 'رنگ متن دکمه', 'mytube' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#493A3A',
                'selectors' => [
                    '{{WRAPPER}} .bio-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'bio_button_text_typography',
                'label'    => __( 'تایپوگرافی متن دکمه', 'mytube' ),
                'selector' => '{{WRAPPER}} .bio-button',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 16, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 700 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'biography_style_section',
            [
                'label' => __( 'عنوان و متن بیوگرافی', 'mytube' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'biography_title_color',
            [
                'label'     => __( 'رنگ عنوان', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#1D1616',
                'selectors' => [
                    '{{WRAPPER}} .biography-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'biography_title_typography',
                'label'    => __( 'تایپوگرافی عنوان', 'mytube' ),
                'selector' => '{{WRAPPER}} .biography-title',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 14, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 600 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_responsive_control(
            'biography_description_color',
            [
                'label'     => __( 'رنگ متن', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#1D1616',
                'selectors' => [
                    '{{WRAPPER}} .biography-description' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Description typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'biography_description_typography',
                'label'    => __( 'تایپوگرافی متن', 'mytube' ),
                'selector' => '{{WRAPPER}} .biography-description',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 16, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 400 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_responsive_control(
            'biography_image_width',
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
                    '{{WRAPPER}} .bio-image' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'biography_image_height',
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
                    '{{WRAPPER}} .bio-image' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'bio_style_items_section',
            [
                'label' => __( 'آیتم ها', 'mytube' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'bio_item_bg_color',
            [
                'label'     => __( 'رنگ پس‌زمینه', 'mytube' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .bio-item' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'bio_item_number_color',
            [
                'label'     => __( 'رنگ عدد', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .item-number' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'bio_item_number_typography',
                'label'    => __( 'تایپوگرافی عدد', 'mytube' ),
                'selector' => '{{WRAPPER}} .item-number',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 16, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 700 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_responsive_control(
            'bio_item_suffix_color',
            [
                'label'     => __( 'رنگ پسوند', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493A3A',
                'selectors' => [
                    '{{WRAPPER}} .item-suffix' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'bio_item_suffix_typography',
                'label'    => __( 'تایپوگرافی پسوند شمارش گر', 'mytube' ),
                'selector' => '{{WRAPPER}} .item-suffix',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 16, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 700 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_responsive_control(
            'bio_item_text_color',
            [
                'label'     => __( 'رنگ متن شمارش گر', 'mytube' ),
                'default'   => '#493A3A',
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .item-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'bio_item_text_typography',
                'label'    => __( 'تایپوگرافی متن شمارش گر', 'mytube' ),
                'selector' => '{{WRAPPER}} .item-text',
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
        $items = $settings['items_list'];
        $current = 0;

        ?>
        <div class="biography">
            <div class="bio-title-section">
                <img class="bio-layer1" src="<?php echo get_template_directory_uri(); ?>/assets/img/biography/layer1.svg" />
                <img class="bio-layer2" src="<?php echo get_template_directory_uri(); ?>/assets/img/biography/layer2.svg" />
                <div class="main-layer" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/biography/main-bg.svg');">
                    <img class="bio-shape1" src="<?php echo get_template_directory_uri(); ?>/assets/img/biography/shape.svg" />
                    <div class="bio-title-wrapper">
                        <?php if ( ! empty( $settings['bio_heading_icon']['url'] ) ) : ?>
                            <div class="bio-title-icon">
                                <img src="<?php echo esc_url( $settings['bio_heading_icon']['url'] ); ?>" alt="">
                            </div>
                        <?php endif; ?>
                        <span class="bio-heading">
                            <?php echo esc_html($settings['bio_heading_text']); ?>
                        </span>
                    </div>
                    <div href="<?php echo esc_url($settings['bio_button_link']['url']); ?>" class="bio-button">
                            <?php echo esc_html($settings['bio_button_text']); ?>
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/icon/arrow.svg') ?>" alt="arrow-icon" />
                    </div>
                </div>
                <div class="mobile-bio-image-section">
                    <img class="mobile-bio-image" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/biography/image.svg') ?>" />
                </div>
            </div>
            <div class="bio-content-section">
                <div class="bio-content-wrapper">
                    <img class="bio-shape2" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/video-category/shape.svg') ?>" alt="" />
                    <img class="info" src="<?php echo get_template_directory_uri(); ?>/assets/img/biography/information.svg" />
                    <span class="biography-title">
                        <?php echo esc_html($settings['biography_heading']); ?>
                    </span>
                    <div class="biography-description">
                        <?php echo $settings['biography_description'] ?>
                    </div>
                    <div class="bio-items">
                        <?php if (!empty($items)) : ?>
                            <?php foreach ($items as $item) : ?>
                                <?php $current++; ?>
                                <div class="bio-item">
                                    <div class="bio-item-icon">
                                        <?php if (!empty($item['item_icon']['url'])) : ?>
                                            <?php
                                                $image_url = $item['item_icon']['url']
                                            ?>
                                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($item['item_text']); ?>">
                                        <?php endif; ?>
                                    </div>
                                    <div class="bio-item-text">
                                        <div class="bio-text-wrapper">
                                            <span class="item-number" data-target="<?php echo esc_attr($item['item_number']); ?>">0</span>
                                            <span class="item-suffix">
                                                <?php echo esc_attr($item['item_suffix']); ?>
                                            </span>
                                        </div>
                                        <div class="item-text">
                                            <?php echo esc_attr($item['item_text']); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="bio-image-section">
                <img class="bio-image" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/biography/image.webp') ?>" />
            </div>
        </div>
        <?php
    }
}