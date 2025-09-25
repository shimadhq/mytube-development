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
            'content_section',
            [
                'label' => 'عنوان',
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
                'label' => __( 'عنوان اصلی', 'mytube' ),
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
    }
}