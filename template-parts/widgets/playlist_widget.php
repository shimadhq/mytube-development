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
    }
}