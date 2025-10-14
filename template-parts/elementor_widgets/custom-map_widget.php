<?php
namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Custom_Map extends Widget_Base {

    public function get_name() {
        return 'custom-map';
    }

    public function get_title() {
        return 'نقشه اختصاصی';
    }

    public function get_icon() {
        return 'eicon-map-pin';
    }

    public function get_style_depends() {
        return ['map'];
    }

    public function get_script_depends() {
        return ['custom-map'];
    }

    public function get_categories() {
        return [ 'mytube-category' ];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'map_settings',
            [
                'label' => 'تنظیمات نقشه',
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'latitude',
            [
                'label' => 'عرض جغرافیایی (Latitude)',
                'type' => Controls_Manager::TEXT,
                'default' => '35.6892',
            ]
        );

        $this->add_control(
            'longitude',
            [
                'label' => 'طول جغرافیایی (Longitude)',
                'type' => Controls_Manager::TEXT,
                'default' => '51.3890',
            ]
        );

        $this->add_control(
            'zoom',
            [
                'label' => 'میزان زوم',
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ '' ],
                'range' => [
                    '' => [ 'min' => 5, 'max' => 20, 'step' => 1 ],
                ],
                'default' => [ 'size' => 14 ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div id="custom-map" 
             data-lat="<?php echo esc_attr( $settings['latitude'] ); ?>" 
             data-lng="<?php echo esc_attr( $settings['longitude'] ); ?>" 
             data-zoom="<?php echo esc_attr( $settings['zoom']['size'] ); ?>">
        </div>
        <?php
    }
}
