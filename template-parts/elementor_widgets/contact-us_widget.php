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
            'first_section',
            [
                'label' => 'سکشن اول',
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'contact_heading_icon',
            [
                'label' => __( 'آیکن عنوان', 'mytube' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/img/contact-us/rocket.svg',
                ],
            ]
        );

        $this->add_control(
            'contact_heading',
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
                    'url' => get_template_directory_uri() . '/assets/img/contact-us/location.svg',
                ],
            ]
        );

        $this->add_control(
            'contact_address_title',
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
                'default' => '',
                'placeholder' => 'تهران، میدان آزادی، کوچه ۲۴ آزادی، پلاک ۳۰',
            ]
        );

        $this->add_control(
            'contact_phone_icon',
            [
                'label' => __( 'آیکن تماس', 'mytube' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/img/contact-us/phone.svg',
                ],
            ]
        );

        $this->add_control(
            'contact_phone_title',
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
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => '',
                'placeholder' => '۰۹۳۸ ۹۳۸ ۸۱۸۱',
            ]
        );

        $this->add_control(
            'contact_whatsapp_icon',
            [
                'label' => __( 'آیکن واتساپ', 'mytube' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/img/contact-us/whatsapp.svg',
                ],
            ]
        );

        $this->add_control(
            'contact_whatsapp_text',
            [
                'label' => 'عنوان فیلد واتساپ',
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => '',
                'placeholder' => 'واتساپ',
            ]
        );

        $this->add_control(
            'contact_whatsapp_text',
            [
                'label' => 'متن فیلد تماس',
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => '',
                'placeholder' => '۰۹۳۸ ۹۳۸ ۸۱۸۱',
            ]
        );

        $this->add_control(
            'contact_email_icon',
            [
                'label' => __( 'آیکن ایمیل', 'mytube' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/img/contact-us/email.svg',
                ],
            ]
        );

        $this->add_control(
            'contact_email_text',
            [
                'label' => 'عنوان فیلد ایمیل',
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => '',
                'placeholder' => 'ایمیل',
            ]
        );

        $this->add_control(
            'contact_email_text',
            [
                'label' => 'متن فیلد ایمیل',
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => '',
                'placeholder' => 'info@mytube.com',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'second_section',
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
                    'url' => get_template_directory_uri() . '/assets/img/contact-us/contact.svg',
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
            'contact_image',
            [
                'label' => __( 'تصویر', 'mytube' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/img/contact-us/image.svg',
                ],
            ]
        );

        $this->add_control(
            'contact_button_text',
            [
                'label' => 'متن دکمه',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'تماس با ما',
            ]
        );

        $this->add_control(
            'contact_button_link',
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
            'third_section',
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
                    'url' => get_template_directory_uri() . '/assets/img/contact-us/rocket.svg',
                ],
            ]
        );

        $this->add_control(
            'contact_third__heading',
            [
                'label' => __( 'عنوان', 'mytube' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'پــــــــــیـــــام بــــــــذار!', 'mytube' ),
            ]
        );

        $this->add_control(
            'fullname_placeholder',
            [
                'label'       => 'Placeholder',
                'type'        => Controls_Manager::TEXT,
                'default'     => 'نام و نام خانوادگی',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'phone_placeholder',
            [
                'label'       => 'Placeholder',
                'type'        => Controls_Manager::TEXT,
                'default'     => 'شماره تلفن',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'message_placeholder',
            [
                'label'       => 'Placeholder',
                'type'        => Controls_Manager::TEXT,
                'default'     => 'توضیحات',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'contact_button_text',
            [
                'label' => 'متن دکمه ارسال',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'ارسال',
            ]
        );

        $this->add_control(
            'contact_button_link',
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
            'address_title',
            [
                'label'     => __( 'رنگ عنوان فیلد آدرس', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493A3A',
                'selectors' => [
                    '{{WRAPPER}} .address-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'address_title_typography',
                'label'    => __( 'تایپوگرافی عنوان فیلد آدرس', 'mytube' ),
                'selector' => '{{WRAPPER}} .address-title',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 14, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 500 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_responsive_control(
            'address_text',
            [
                'label'     => __( 'رنگ متن فیلد آدرس', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493A3A',
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
            'phone_title',
            [
                'label'     => __( 'رنگ عنوان فیلد تماس', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493A3A',
                'selectors' => [
                    '{{WRAPPER}} .phone-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'phone_title_typography',
                'label'    => __( 'تایپوگرافی عنوان فیلد تماس', 'mytube' ),
                'selector' => '{{WRAPPER}} .phone-title',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 14, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 500 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_responsive_control(
            'phone_text',
            [
                'label'     => __( 'رنگ متن فیلد تماس', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493A3A',
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
            'whatsapp_title',
            [
                'label'     => __( 'رنگ عنوان فیلد واتساپ', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493A3A',
                'selectors' => [
                    '{{WRAPPER}} .whatsapp-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'whatsapp_title_typography',
                'label'    => __( 'تایپوگرافی عنوان فیلد واتساپ', 'mytube' ),
                'selector' => '{{WRAPPER}} .whatsapp-title',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 14, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 500 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_responsive_control(
            'whatsapp_text',
            [
                'label'     => __( 'رنگ متن فیلد واتساپ', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493A3A',
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
            'email_title',
            [
                'label'     => __( 'رنگ عنوان فیلد ایمیل', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493A3A',
                'selectors' => [
                    '{{WRAPPER}} .email-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'email_title_typography',
                'label'    => __( 'تایپوگرافی عنوان فیلد ایمیل', 'mytube' ),
                'selector' => '{{WRAPPER}} .email-title',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 14, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 500 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_responsive_control(
            'email_text',
            [
                'label'     => __( 'رنگ متن فیلد ایمیل', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493A3A',
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
                    'size' => 200,
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
                    'size' => 100,
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
                'name'     => 'button_typography',
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
    }
}