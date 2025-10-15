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
}