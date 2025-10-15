<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Contact_Form extends Widget_Base{
    public function get_name() {
        return 'contact-form';
    }

    public function get_title() {
        return 'فرم تماس با ما';
    }

    public function get_icon() {
        return 'eicon-form-horizontal';
    }

    public function get_style_depends() {
        return ['contact-form'];
    }

    public function get_categories() {
        return [ 'mytube-category' ];
    }

    protected function register_controls(){
        $this->start_controls_section(
            'cf_title_section',
            [
                'label' => 'عنوان',
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'cf_heading_icon',
            [
                'label' => __( 'آیکن عنوان', 'mytube' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/img/contact-us/rocket.svg',
                ],
            ]
        );

        $this->add_control(
            'cf_heading_text',
            [
                'label' => __( 'عنوان', 'mytube' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'پــــــــــیـــــام بــــــــذار!', 'mytube' ),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'cf_form_section',
            [
                'label' => 'فرم تماس',
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'cf_fullname_label',
            [
                'label' => 'لیبل فیلد اول',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'نام و نام خانوادگی',
            ]
        );

        $this->add_control(
            'cf_phone_label',
            [
                'label'       => 'لیبل فیلد دوم',
                'type'        => Controls_Manager::TEXT,
                'default'     => 'شماره تلفن',
            ]
        );

        $this->add_control(
            'cf_message_label',
            [
                'label'       => 'لیبل فیلد سوم',
                'type'        => Controls_Manager::TEXT,
                'default'     => 'توضیحات',
            ]
        );

        $this->add_control(
            'cf_send_button_text',
            [
                'label' => 'متن دکمه ارسال',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'ارسال',
            ]
        );

        $this->add_control(
            'cf_send_button_link',
            [
                'label' => 'لینک دکمه ارسال',
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->end_controls_section();

        // ------------------ Title section ------------------
        $this->start_controls_section(
            'cf_title_style',
            [
                'label' => __( 'عنوان', 'mytube' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'cf_title_style_color',
            [
                'label'     => __( 'رنگ عنوان', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#1D1616',
                'selectors' => [
                    '{{WRAPPER}} .cf-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'cf_title_style_typography',
                'label'    => __( 'تایپوگرافی عنوان', 'mytube' ),
                'selector' => '{{WRAPPER}} .cf-title',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 14, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 600 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'cf_form_style',
            [
                'label' => __( 'فرم', 'mytube' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'cf_form_label_color',
            [
                'label'     => __( 'رنگ لیبل فیلد', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493A3A',
                'selectors' => [
                    '{{WRAPPER}} .cf-field-label' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'cf_form_label_typography',
                'label'    => __( 'تایپوگرافی لیبل فیلد', 'mytube' ),
                'selector' => '{{WRAPPER}} .cf-field-label',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 14, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 500 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_control(
            'cf_form_field_bg_color',
            [
                'label'     => 'رنگ پس‌زمینه فیلد',
                'type'      => Controls_Manager::COLOR,
                'default'   => '#EEEEEE',
                'selectors' => [
                    '{{WRAPPER}} .cf-field-input' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'cf_form_send_button_bg_color',
            [
                'label'     => 'رنگ پس‌زمینه دکمه ارسال',
                'type'      => Controls_Manager::COLOR,
                'default'   => '#ff454512',
                'selectors' => [
                    '{{WRAPPER}} .cf-send-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'cf_form_send_button_text_color',
            [
                'label'     => __( 'رنگ متن دکمه ارسال', 'mytube' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#FF4545',
                'selectors' => [
                    '{{WRAPPER}} .cf-send-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'cf_form_send_button_text_typography',
                'label'    => __( 'تایپوگرافی متن دکمه ارسال', 'mytube' ),
                'selector' => '{{WRAPPER}} .cf-send-button',
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
        <div class="contact-form">
            <div class="cf-title-section">
                <img class="contact-shape" src="<?php echo get_template_directory_uri(); ?>/assets/img/biography/shape.svg" />
                <span class="cf-title">
                    <?php echo esc_html($settings['cf_heading_text']); ?>
                </span>
                <?php if ( ! empty( $settings['cf_heading_icon']['url'] ) ) : ?>
                    <div class="cf-icon">
                        <img src="<?php echo esc_url( $settings['cf_heading_icon']['url'] ); ?>" alt="">
                    </div>
                <?php endif; ?>
            </div>
            <div class="cf-form-section">
                <img class="contact-shape" src="<?php echo get_template_directory_uri(); ?>/assets/img/video-category/shape.svg" />
                <div class="name-phone">
                    <div class="fullname-field">
                        <label class="cf-field-label">
                            <?php echo esc_html($settings['cf_fullname_label']); ?>
                        </label>
                        <input type="text" class="field-input" />
                    </div>
                    <div class="phone-field">
                        <label class="cf-field-label">
                            <?php echo esc_html($settings['cf_phone_label']); ?>
                        </label>
                        <input type="text" class="cf-field-input" />
                    </div>
                    <div class="message-button">
                        <div class="message-field">
                            <label class="cf-field-label">
                                <?php echo esc_html($settings['cf_message_label']); ?>
                            </label>
                            <input type="text" class="message-field-input" />
                        </div>
                        <div href="<?php echo esc_url($settings['cf_send_button_link']['url']); ?>" class="cf-send-button">
                            <?php echo esc_html($settings['cf_send_button_text']); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}