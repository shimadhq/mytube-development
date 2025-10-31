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
            'google_api_key',
            [
                'label' => 'Google Map API Key',
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => 'مثلاً: AIzaSyBf....',
            ]
        );

        $this->add_control(
            'map_address',
            [
                'label' => 'آدرس نقشه',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'برج میلاد، تهران',
                'placeholder' => 'مثلاً: Tehran, Milad Tower',
            ]
        );

        $this->add_control(
            'map_zoom',
            [
                'label' => 'میزان زوم نقشه',
                'type' => Controls_Manager::SLIDER,
                'size_units' => [''],
                'range' => [
                    '' => [
                        'min' => 1,
                        'max' => 20,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'size' => 14,
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $api_key = esc_attr($settings['google_api_key']);
        $address = esc_js($settings['map_address']);
        $zoom    = isset($settings['map_zoom']['size']) ? (int)$settings['map_zoom']['size'] : 14;
        ?>

        <div id="custom-map-wrapper" style="width:100%; height:200px; position:relative;">
            <?php if (empty($api_key)): ?>
                <!-- تصویر پیش فرض -->
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/widgets/custom-map/map.webp" 
                    alt="Map Placeholder" 
                    style="width:100%; height:100%; object-fit:cover;" 
                />
                <p style="position:absolute; bottom:5px; left:5px; color:red; background:white; padding:5px; font-size: 13px;">
                    برای مشاهده نقشه، لطفاً Google Maps API Key وارد کنید.
                </p>
            <?php else: ?>
                <!-- نقشه واقعی -->
                <div id="custom-map" style="width:100%; height:100%;"></div>
                <script>
                    function initMap() {
                        const customStyle = [
                            // زمین / زمین بازی
                            { elementType: "geometry", stylers: [{ color: "#f5f5f5" }] },

                            // معابر اصلی
                            { featureType: "road.arterial", elementType: "geometry", stylers: [{ color: "#C4C4C4" }] },

                            // بزرگراه
                            { featureType: "road.highway", elementType: "geometry", stylers: [{ color: "#C4C4C4" }] },

                            // معابر فرعی / کوچه
                            { featureType: "road.local", elementType: "geometry", stylers: [{ color: "#ffffff" }] },

                            // پیاده‌رو و سایر جاده‌ها
                            { featureType: "road", elementType: "geometry", stylers: [{ color: "#C4C4C4" }] },
                            { featureType: "road.local", elementType: "geometry", stylers: [{ color: "#ffffff" }] },

                            // پارک و فضای سبز
                            { featureType: "poi.park", elementType: "geometry", stylers: [{ color: "#e0e0e0" }] },

                            // آب
                            { featureType: "water", elementType: "geometry", stylers: [{ color: "#c9c9c9" }] },

                            // لیبل‌ها
                            { elementType: "labels.text.fill", stylers: [{ color: "#EEEEEE" }] },
                            { elementType: "labels.text.stroke", stylers: [{ color: "#f5f5f5" }] },

                            // نقاط مهم، اما کم رنگ
                            { featureType: "poi", elementType: "geometry", stylers: [{ color: "#eeeeee" }] },
                            { featureType: "poi.business", elementType: "geometry", stylers: [{ color: "#eeeeee" }] },

                            // مسیرهای سبز و زرد
                            { featureType: "landscape.natural", elementType: "geometry", stylers: [{ color: "#e8e8e8" }] },
                        ];

                        const map = new google.maps.Map(document.getElementById("custom-map"), {
                            zoom: <?php echo $zoom; ?>,
                            center: { lat: 35.7448, lng: 51.3756 }, // fallback center
                           styles: customStyle
                        }); 

                        const marker = new google.maps.Marker({
                            map: map,
                            position: { lat: 35.7448, lng: 51.3756 },
                            icon: "<?php echo get_template_directory_uri(); ?>/assets/img/widgets/custom-map/marker.svg"
                        });

                        const geocoder = new google.maps.Geocoder();
                        geocoder.geocode({ address: "<?php echo $address; ?>" }, (results, status) => {
                            if (status === "OK" && results[0]) {
                                map.setCenter(results[0].geometry.location);
                                marker.setPosition(results[0].geometry.location);
                            } else {
                                const info = document.createElement('p');
                                info.style.color = 'red';
                                info.innerText = "Geocode ناموفق: " + status;
                                document.getElementById("custom-map").appendChild(info);
                            }
                        });
                    }
                </script>

                <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $api_key; ?>&callback=initMap" async defer></script>
            <?php endif; ?>
        </div>
        <?php
    }
}
