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
        
    }
}