<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Contact_Us extends Widget_Base{
    public function get_name() {
        return 'contact-us';
    }

    public function get_title() {
        return 'تماس با ما';
    }

    public function get_icon() {
        return 'eicon-mail';
    }

    public function get_style_depends() {
        return ['contact-us'];
    }

    public function get_categories() {
        return [ 'mytube-category' ];
    }

    protected function register_controls(){
        $this->start_controls_section(
            'cu_first_section',
            [
                'label' => 'سکشن اول',
            ]
        );

        $this->add_control(
            'contact_heading_icon',
            [
                'label' => __( 'آیکن عنوان', 'mytube' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/img/widgets/contact-us/rocket.svg',
                ],
            ]
        );

        $this->add_control(
            'contact_heading_text',
            [
                'label' => __( 'عنوان', 'mytube' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'راه هــــــــــای ارتبــاطی', 'mytube' ),
            ]
        );

        $this->add_control(
            'contact_address_icon',
            [
                'label' => __( 'آیکن آدرس', 'mytube' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/img/widgets/contact-us/location.svg',
                ],
            ]
        );

        $this->add_control(
            'contact_address_label',
            [
                'label' => __( 'عنوان آدرس', 'mytube' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'آدرس', 'mytube' ),
            ]
        );

        $this->add_control(
            'contact_address_text',
            [
                'label' => 'متن فیلد آدرس',
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => 'تهران، میدان آزادی، کوچه ۲۴ آزادی، پلاک ۳۰',
            ]
        );

        $this->add_control(
            'contact_phone_icon',
            [
                'label' => __( 'آیکن تماس', 'mytube' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/img/widgets/contact-us/phone.svg',
                ],
            ]
        );

        $this->add_control(
            'contact_phone_label',
            [
                'label' => __( 'عنوان تماس', 'mytube' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'شماره تماس', 'mytube' ),
            ]
        );

        $this->add_control(
            'contact_phone_text',
            [
                'label' => 'متن فیلد تماس',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '۰۹۳۸ ۹۳۸ ۸۱۸۱',
            ]
        );

        $this->add_control(
            'contact_whatsapp_icon',
            [
                'label' => __( 'آیکن واتساپ', 'mytube' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/img/widgets/contact-us/whatsapp.svg',
                ],
            ]
        );

        $this->add_control(
            'contact_whatsapp_label',
            [
                'label' => 'عنوان فیلد واتساپ',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'واتساپ',
            ]
        );

        $this->add_control(
            'contact_whatsapp_text',
            [
                'label' => 'متن فیلد واتساپ',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '۰۹۳۸ ۹۳۸ ۸۱۸۱',
            ]
        );

        $this->add_control(
            'contact_email_icon',
            [
                'label' => __( 'آیکن ایمیل', 'mytube' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/img/widgets/contact-us/email.svg',
                ],
            ]
        );

        $this->add_control(
            'contact_email_label',
            [
                'label' => 'عنوان فیلد ایمیل',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'ایمیل',
            ]
        );

        $this->add_control(
            'contact_email_text',
            [
                'label' => 'متن فیلد ایمیل',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'info@mytube.com',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'cu_second_section',
            [
                'label' => 'سکشن دوم',
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'contact_second_heading_icon',
            [
                'label' => __( 'آیکن عنوان', 'mytube' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/img/widgets/contact-us/contact.svg',
                ],
            ]
        );

        $this->add_control(
            'contact_second_heading',
            [
                'label' => __( 'عنوان', 'mytube' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'تماس با ما', 'mytube' ),
            ]
        );

        $this->add_control(
            'contact_second_image',
            [
                'label' => __( 'تصویر', 'mytube' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/img/widgets/contact-us/image.svg',
                ],
            ]
        );

        $this->add_control(
            'contact_second_button_text',
            [
                'label' => 'متن دکمه',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'تماس با ما',
            ]
        );

        $this->add_control(
            'contact_second_button_link',
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
            'cu_third_section',
            [
                'label' => 'سکشن سوم',
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'contact_third_heading_icon',
            [
                'label' => __( 'آیکن عنوان', 'mytube' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/img/widgets/contact-us/rocket.svg',
                ],
            ]
        );

        $this->add_control(
            'contact_third_heading',
            [
                'label' => __( 'عنوان', 'mytube' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'پــــــــــیـــــام بــــــــذار!', 'mytube' ),
            ]
        );

        $this->add_control(
            'fullname_label',
            [
                'label' => 'لیبل فیلد اول',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'نام و نام خانوادگی',
            ]
        );

        $this->add_control(
            'phone_label',
            [
                'label'       => 'لیبل فیلد دوم',
                'type'        => Controls_Manager::TEXT,
                'default'     => 'شماره تلفن',
            ]
        );

        $this->add_control(
            'message_label',
            [
                'label'       => 'لیبل فیلد سوم',
                'type'        => Controls_Manager::TEXT,
                'default'     => 'توضیحات',
            ]
        );

        $this->add_control(
            'contact_send_button_text',
            [
                'label' => 'متن دکمه ارسال',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'ارسال',
            ]
        );

        $this->add_control(
            'contact_send_button_link',
            [
                'label' => 'لینک دکمه ارسال',
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->end_controls_section();


        // ------------------ First section heading ------------------
        $this->start_controls_section(
            'style_first_section',
            [
                'label' => __( 'سکشن اول', 'mytube' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'first_section_title_color',
            [
                'label'     => __( 'رنگ عنوان اصلی', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#1D1616',
                'selectors' => [
                    '{{WRAPPER}} .first-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'first_section_title_typography',
                'label'    => __( 'تایپوگرافی عنوان اصلی', 'mytube' ),
                'selector' => '{{WRAPPER}} .first-title',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 14, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 600 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_responsive_control(
            'address_label_color',
            [
                'label'     => __( 'رنگ عنوان فیلد آدرس', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493A3A',
                'selectors' => [
                    '{{WRAPPER}} .address-label' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'address_label_typography',
                'label'    => __( 'تایپوگرافی عنوان فیلد آدرس', 'mytube' ),
                'selector' => '{{WRAPPER}} .address-label',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 14, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 500 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_responsive_control(
            'address_text_color',
            [
                'label'     => __( 'رنگ متن فیلد آدرس', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493a3a80',
                'selectors' => [
                    '{{WRAPPER}} .address-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'address_text_typography',
                'label'    => __( 'تایپوگرافی متن فیلد آدرس', 'mytube' ),
                'selector' => '{{WRAPPER}} .address-text',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 16, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 500 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_responsive_control(
            'phone_label_color',
            [
                'label'     => __( 'رنگ عنوان فیلد تماس', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493A3A',
                'selectors' => [
                    '{{WRAPPER}} .phone-label' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'phone_label_typography',
                'label'    => __( 'تایپوگرافی عنوان فیلد تماس', 'mytube' ),
                'selector' => '{{WRAPPER}} .phone-label',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 14, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 500 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_responsive_control(
            'phone_text_color',
            [
                'label'     => __( 'رنگ متن فیلد تماس', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493a3a80',
                'selectors' => [
                    '{{WRAPPER}} .phone-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'phone_text_typography',
                'label'    => __( 'تایپوگرافی متن فیلد تماس', 'mytube' ),
                'selector' => '{{WRAPPER}} .phone-text',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 16, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 500 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_responsive_control(
            'whatsapp_label_color',
            [
                'label'     => __( 'رنگ عنوان فیلد واتساپ', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493A3A',
                'selectors' => [
                    '{{WRAPPER}} .whatsapp-label' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'whatsapp_label_typography',
                'label'    => __( 'تایپوگرافی عنوان فیلد واتساپ', 'mytube' ),
                'selector' => '{{WRAPPER}} .whatsapp-label',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 14, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 500 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_responsive_control(
            'whatsapp_text_color',
            [
                'label'     => __( 'رنگ متن فیلد واتساپ', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493a3a80',
                'selectors' => [
                    '{{WRAPPER}} .whatsapp-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'whatsapp_text_typography',
                'label'    => __( 'تایپوگرافی متن فیلد واتساپ', 'mytube' ),
                'selector' => '{{WRAPPER}} .whatsapp-text',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 16, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 500 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_responsive_control(
            'email_label_color',
            [
                'label'     => __( 'رنگ عنوان فیلد ایمیل', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493A3A',
                'selectors' => [
                    '{{WRAPPER}} .email-label' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'email_label_typography',
                'label'    => __( 'تایپوگرافی عنوان فیلد ایمیل', 'mytube' ),
                'selector' => '{{WRAPPER}} .email-label',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 14, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 500 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_responsive_control(
            'email_text_color',
            [
                'label'     => __( 'رنگ متن فیلد ایمیل', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493a3a80',
                'selectors' => [
                    '{{WRAPPER}} .email-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'email_text_typography',
                'label'    => __( 'تایپوگرافی متن فیلد ایمیل', 'mytube' ),
                'selector' => '{{WRAPPER}} .email-text',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 16, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 500 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->end_controls_section();


        // ------------------ Second section heading ------------------
        $this->start_controls_section(
            'style_second_section',
            [
                'label' => __( 'سکشن دوم', 'mytube' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'second_section_title_color',
            [
                'label'     => __( 'رنگ عنوان اصلی', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493A3A',
                'selectors' => [
                    '{{WRAPPER}} .second-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'second_section_title_typography',
                'label'    => __( 'تایپوگرافی عنوان اصلی', 'mytube' ),
                'selector' => '{{WRAPPER}} .second-title',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 16, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 900 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_responsive_control(
            'second_section_image_width',
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
                    'size' => 170,
                ],
                'selectors' => [
                    '{{WRAPPER}} .second-image' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'second_section_image_height',
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
                    'size' => 90,
                ],
                'selectors' => [
                    '{{WRAPPER}} .second-image' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_bg_color',
            [
                'label'     => __( 'رنگ پس‌زمینه دکمه', 'mytube' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .second-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_text_color',
            [
                'label'     => __( 'رنگ متن دکمه', 'mytube' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#493A3A',
                'selectors' => [
                    '{{WRAPPER}} .second-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'button_text_typography',
                'label'    => __( 'تایپوگرافی متن دکمه', 'mytube' ),
                'selector' => '{{WRAPPER}} .second-button',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 16, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 700 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->end_controls_section();


        // ------------------ Third section heading ------------------
        $this->start_controls_section(
            'style_third_section',
            [
                'label' => __( 'سکشن سوم', 'mytube' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'third_section_title_color',
            [
                'label'     => __( 'رنگ عنوان اصلی', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#1D1616',
                'selectors' => [
                    '{{WRAPPER}} .third-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'third_section_title_typography',
                'label'    => __( 'تایپوگرافی عنوان اصلی', 'mytube' ),
                'selector' => '{{WRAPPER}} .third-title',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 14, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 600 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_responsive_control(
            'label_color',
            [
                'label'     => __( 'رنگ لیبل فیلد', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493A3A',
                'selectors' => [
                    '{{WRAPPER}} .field-label' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'label_typography',
                'label'    => __( 'تایپوگرافی لیبل فیلد', 'mytube' ),
                'selector' => '{{WRAPPER}} .field-label',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 14, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 500 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_control(
            'field_bg_color',
            [
                'label'     => 'رنگ پس‌زمینه فیلد',
                'type'      => Controls_Manager::COLOR,
                'default'   => '#EEEEEE',
                'selectors' => [
                    '{{WRAPPER}} .field-input' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'send_button_bg_color',
            [
                'label'     => 'رنگ پس‌زمینه دکمه ارسال',
                'type'      => Controls_Manager::COLOR,
                'default'   => '#ff454512',
                'selectors' => [
                    '{{WRAPPER}} .send-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'send_button_text_color',
            [
                'label'     => __( 'رنگ متن دکمه ارسال', 'mytube' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#FF4545',
                'selectors' => [
                    '{{WRAPPER}} .send-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'send_button_text_typography',
                'label'    => __( 'تایپوگرافی متن دکمه ارسال', 'mytube' ),
                'selector' => '{{WRAPPER}} .send-button',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 16, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 700 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->end_controls_section();
    }

    public function render() {
        $settings = $this->get_settings_for_display();

        ?>
        <div class="contact-us">
            <img class="right-shape" src="<?php echo get_template_directory_uri(); ?>/assets/img/widgets/contact-us/right-shape.svg" />
            <div class="contact-mobile">
                <img class="contact-bg" src="<?php echo get_template_directory_uri(); ?>/assets/img/widgets/contact-us/bg-mobile.svg" />
                <div class="contact-title-mobile">
                    <img class="contact-shape" src="<?php echo get_template_directory_uri(); ?>/assets/img/widgets/video-category/shape.svg" />
                    <div class="second-title-section">
                        <?php if ( ! empty( $settings['contact_second_heading_icon']['url'] ) ) : ?>
                            <div class="second-title-icon">
                                <img src="<?php echo esc_url( $settings['contact_second_heading_icon']['url'] ); ?>" alt="">
                            </div>
                        <?php endif; ?>
                        <span class="second-title">
                            <?php echo esc_html($settings['contact_second_heading']); ?>
                        </span>
                    </div>
                </div>
                <img class="contact-image-bg" src="<?php echo get_template_directory_uri(); ?>/assets/img/widgets/contact-us/contact-bg.svg" />
                <div class="second-image-mobile">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/widgets/contact-us/phone-mobile.svg" alt="">
                </div>
            </div>
            <div class="first-section">
                <div class="first-title-section">
                    <img class="contact-shape" src="<?php echo get_template_directory_uri(); ?>/assets/img/widgets/video-category/shape.svg" />
                    <span class="first-title">
                        <?php echo esc_html($settings['contact_heading_text']); ?>
                    </span>
                    <?php if ( ! empty( $settings['contact_heading_icon']['url'] ) ) : ?>
                        <div class="first-title-icon">
                            <img src="<?php echo esc_url( $settings['contact_heading_icon']['url'] ); ?>" alt="">
                        </div>
                    <?php endif; ?>
                </div>
                <div class="first-contact-section">
                    <div class="address-section">
                        <div class="label-section">
                            <?php if ( ! empty( $settings['contact_address_icon']['url'] ) ) : ?>
                                <div class="label-icon">
                                    <img src="<?php echo esc_url( $settings['contact_address_icon']['url'] ); ?>" alt="">
                                </div>
                            <?php endif; ?>
                            <span class="address-label">
                                <?php echo esc_html($settings['contact_address_label']); ?>
                            </span>
                        </div>
                        <div class="address-field-section">
                            <span class="address-text">
                                <?php echo wp_kses_post( $settings['contact_address_text'] ); ?>
                            </span>
                        </div>
                    </div>
                    <div class="phone-whatsapp">
                        <div class="phone-section">
                            <div class="label-section">
                                <?php if ( ! empty( $settings['contact_phone_icon']['url'] ) ) : ?>
                                    <div class="label-icon">
                                        <img src="<?php echo esc_url( $settings['contact_phone_icon']['url'] ); ?>" alt="">
                                    </div>
                                <?php endif; ?>
                                <span class="phone-label">
                                    <?php echo esc_html($settings['contact_phone_label']); ?>
                                </span>
                            </div>
                            <div class="field-section">
                                <span class="phone-text">
                                    <?php echo esc_html($settings['contact_phone_text']); ?>
                                </span>
                            </div>
                        </div>
                        <div class="whatsapp-section">
                            <div class="label-section">
                                <?php if ( ! empty( $settings['contact_whatsapp_icon']['url'] ) ) : ?>
                                    <div class="label-icon">
                                        <img src="<?php echo esc_url( $settings['contact_whatsapp_icon']['url'] ); ?>" alt="">
                                    </div>
                                <?php endif; ?>
                                <span class="whatsapp-label">
                                    <?php echo esc_html($settings['contact_whatsapp_label']); ?>
                                </span>
                            </div>
                            <div class="field-section">
                                <span class="whatsapp-text">
                                    <?php echo esc_html($settings['contact_whatsapp_text']); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="email-section">
                        <div class="label-section">
                            <?php if ( ! empty( $settings['contact_email_icon']['url'] ) ) : ?>
                                <div class="label-icon">
                                    <img src="<?php echo esc_url( $settings['contact_email_icon']['url'] ); ?>" alt="">
                                </div>
                            <?php endif; ?>
                            <span class="email-label">
                                <?php echo esc_html( $settings['contact_email_label'] ); ?>
                            </span>
                        </div>
                        <div class="field-section">
                            <span class="email-text">
                                <?php echo esc_html($settings['contact_email_text']); ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="second-section">
                <img class="bg-shape1" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/widgets/contact-us/bg-contact-shape.svg') ?>" />
                <div class="second-title-section">
                    <?php if ( ! empty( $settings['contact_second_heading_icon']['url'] ) ) : ?>
                        <div class="second-title-icon">
                            <img src="<?php echo esc_url( $settings['contact_second_heading_icon']['url'] ); ?>" alt="">
                        </div>
                    <?php endif; ?>
                    <span class="second-title">
                        <?php echo esc_html($settings['contact_second_heading']); ?>
                    </span>
                </div>
                <div class="second-image">
                    <img src="<?php echo esc_url( $settings['contact_second_image']['url'] ); ?>" alt="">
                </div>
                <div href="<?php echo esc_url($settings['contact_second_button_link']['url']); ?>" class="second-button">
                    <?php echo esc_html($settings['contact_second_button_text']); ?>
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/icon/arrow.svg') ?>" alt="arrow-icon" />
                </div>
                <img class="bg-shape2" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/widgets/contact-us/bg-contact-shape2.svg') ?>" />
            </div>
            <div class="third-section">
                <div class="third-title-section">
                    <img class="contact-shape" src="<?php echo get_template_directory_uri(); ?>/assets/img/widgets/biography/shape.svg" />
                    <span class="third-title">
                        <?php echo esc_html($settings['contact_third_heading']); ?>
                    </span>
                    <?php if ( ! empty( $settings['contact_third_heading_icon']['url'] ) ) : ?>
                        <div class="third-title-icon">
                            <img src="<?php echo esc_url( $settings['contact_third_heading_icon']['url'] ); ?>" alt="">
                        </div>
                    <?php endif; ?>
                </div>
                <div class="third-contact-section">
                    <img class="contact-shape" src="<?php echo get_template_directory_uri(); ?>/assets/img/widgets/video-category/shape.svg" />
                    <div class="name-phone">
                        <div class="fullname-field">
                            <label class="field-label">
                                <?php echo esc_html($settings['fullname_label']); ?>
                            </label>
                            <input type="text" class="field-input" />
                        </div>
                        <div class="phone-field">
                            <label class="field-label">
                                <?php echo esc_html($settings['phone_label']); ?>
                            </label>
                            <input type="text" class="field-input" />
                        </div>
                    </div>
                    <div class="message-button">
                        <div class="message-field">
                            <label class="field-label">
                                <?php echo esc_html($settings['message_label']); ?>
                            </label>
                            <input type="text" class="message-field-input" />
                        </div>
                        <div href="<?php echo esc_url($settings['contact_send_button_link']['url']); ?>" class="send-button">
                            <?php echo esc_html($settings['contact_send_button_text']); ?>
                        </div>
                    </div>
                </div>
            </div>
            <img class="left-shape" src="<?php echo get_template_directory_uri(); ?>/assets/img/widgets/contact-us/left-shape.svg" />
            <div class="mobile-button">
                <div href="<?php echo esc_url($settings['contact_button_link']['url']); ?>" class="second-button">
                    <?php echo esc_html($settings['contact_button_text']); ?>
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/icon/arrow.svg') ?>" alt="arrow-icon" />
                </div>
            </div>
            <img class="background" src="<?php echo get_template_directory_uri(); ?>/assets/img/widgets/contact-us/background.svg" />
        </div>
        <?php
    }
}