<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Short_Videos extends Widget_Base{
    public function get_name() {
        return 'short-videos';
    }

    public function get_title() {
        return 'ویدیوهای کوتاه';
    }

    public function get_icon() {
        return 'eicon-play-o';
    }

    public function get_style_depends() {
        return ['short-videos'];
    }

    public function get_script_depends() {
        return ['counter'];
    }

    public function get_categories() {
        return [ 'mytube-category' ];
    }

    protected function register_controls(){
        $this->start_controls_section(
            'sv_content_section',
            [
                'label' => 'عنوان',
            ]
        );

        $this->add_control(
            'sv_heading_icon',
            [
                'label' => __( 'آیکن عنوان', 'mytube' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/img/short-videos/short-videos.svg',
                ],
            ]
        );

        $this->add_control(
            'sv_heading_text',
            [
                'label' => __( 'عنوان', 'mytube' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'ویـــدیــــــو های کــــــــوتـــــــــــــاه', 'mytube' ),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'sv_counters_section',
            [
                'label' => 'شمارش گرها'
            ]
        );

        $counter_repeater = new \Elementor\Repeater();

        $counter_repeater->add_control(
            'sv_counter_icon',
            [
                'label' => 'آیکن شمارش گر',
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $counter_repeater->add_control(
            'sv_counter_number',
            [
                'label' => 'عدد شمارش گر',
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 0,
                'placeholder' => 'عدد نهایی را وارد کنید',
            ]
        );

        $counter_repeater->add_control(
            'sv_counter_text',
            [
                'label' => 'متن شمارش گر',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'متن نمونه',
                'placeholder' => 'متن نمونه را وارد کنید',
            ]
        );

        $this->add_control(
            'counters_list',
            [
                'label' => 'لیست شمارش گرها',
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $counter_repeater->get_controls(),
                'title_field' => '{{{ sv_counter_text }}}',
                'default' => [
                    [
                        'sv_counter_icon' => ['url' => get_template_directory_uri() . '/assets/img/short-videos/play.svg'],
                        'sv_counter_number' => __('۶۷', 'mytube'),
                        'sv_counter_text' => __('ویدیوی کوتاه', 'mytube'),
                    ],
                    [
                        'sv_counter_icon' => ['url' => get_template_directory_uri() . '/assets/img/short-videos/film.svg'],
                        'sv_counter_number' => __('۲۴۸', 'mytube'),
                        'sv_counter_text' => __('همه ویدیو ها', 'mytube'),
                    ],
                    [
                        'sv_counter_icon' => ['url' => get_template_directory_uri() . '/assets/img/short-videos/playlist.svg'],
                        'sv_counter_number' => __('۲۳', 'mytube'),
                        'sv_counter_text' => __('لیست های پخش', 'mytube'),
                    ]
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'sv_button_section',
            [
                'label' => 'دکمه'
            ]
        );

        $this->add_control(
            'sv_button_title',
            [
                'label' => 'عنوان دکمه',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'همه ویدیو ها', 'mytube' ),
            ]
        );

        $this->add_control(
            'sv_button_url',
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
            'sv_videos_section',
            [
                'label' => 'ویدیوها'
            ]
        );

        $video_repeater = new \Elementor\Repeater();

        $video_repeater->add_control(
            'sv_video_url',
            [
                'label' => 'لینک ویدیو',
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['video'],
                'default' => [
                    'url' => '',
                ],
            ]
        );

        $video_repeater->add_control(
            'sv_video_thumbnail',
            [
                'label' => 'تصویر کاور (Thumbnail)',
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['image'],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $video_repeater->add_control(
            'sv_video_puzzle_icon',
            [
                'label' => 'آیکن بالای ویدیو',
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $video_repeater->add_control(
            'sv_video_title',
            [
                'label' => 'عنوان ویدیو',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'عنوان نمونه',
                'placeholder' => 'عنوان نمونه را وارد کنید',
            ]
        );

        $video_repeater->add_control(
            'sv_video_text',
            [
                'label' => 'متن ویدیو',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'متن نمونه',
                'placeholder' => 'متن نمونه را وارد کنید',
            ]
        );

        $this->add_control(
            'videos_list',
            [
                'label' => 'لیست ویدیوها',
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $video_repeater->get_controls(),
                'title_field' => '{{{ sv_video_title }}}',
                'default' => [
                    [
                        'sv_video_thumbnail' =>  ['url' => get_template_directory_uri() . '/assets/img/short-videos/video1.webp'],
                        'sv_video_url' => '',
                        'sv_video_title' => __( 'برای چالش ماشین جدید گرفتیم !', 'mytube' ),
                        'sv_video_text' => __( 'بریم بینیم استقامت این ماشین چقدره!', 'mytube' ),
                        'sv_video_puzzle_icon' => ['url' => get_template_directory_uri() . '/assets/img/short-videos/puzzle-icon.svg'],
                    ],
                    [
                        'sv_video_thumbnail' =>  ['url' => get_template_directory_uri() . '/assets/img/short-videos/video2.webp'],
                        'sv_video_url' => '',
                        'sv_video_title' => __( 'مصاحبه با یوتیوبر ها پارت اول', 'mytube' ),
                        'sv_video_text' => __( 'مصاحبه با معروفترین یوتیوبر ها', 'mytube' ),
                        'sv_video_puzzle_icon' => ['url' => get_template_directory_uri() . '/assets/img/short-videos/puzzle-icon.svg'],
                    ]
                ],
            ]
        );

        $this->end_controls_section();

        // ------------------ Title & decs ------------------
        $this->start_controls_section(
            'style_heading_section',
            [
                'label' => __( 'عنوان', 'mytube' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'title_color',
            [
                'label'     => __( 'رنگ عنوان', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493A3A',
                'selectors' => [
                    '{{WRAPPER}} .short-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typography',
                'label'    => __( 'تایپوگرافی عنوان', 'mytube' ),
                'selector' => '{{WRAPPER}} .short-title',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 16, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 900 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_counters_section',
            [
                'label' => __( 'شمارش گرها', 'mytube' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'counters_bg_color',
            [
                'label'     => __( 'رنگ بک گراند شمارش گر', 'mytube' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#EEEEEE',
                'selectors' => [
                    '{{WRAPPER}} .short-counter' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'counter_number_color',
            [
                'label'     => __( 'رنگ عدد شمارش گر', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493A3A',
                'selectors' => [
                    '{{WRAPPER}} .short-counter-number' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'counter_number_typography',
                'label'    => __( 'تایپوگرافی عدد شمارش گر', 'mytube' ),
                'selector' => '{{WRAPPER}} .short-counter-number',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 24, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 700 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );


        $this->add_responsive_control(
            'counter_description_color',
            [
                'label'     => __( 'رنگ متن شمارش گر', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#493a3a99',
                'selectors' => [
                    '{{WRAPPER}} .short-counter-description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'counter_description_typography',
                'label'    => __( 'تایپوگرافی متن شمارش گر', 'mytube' ),
                'selector' => '{{WRAPPER}} .short-counter-description',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 14, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 500 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_button_section',
            [
                'label' => __( 'دکمه', 'mytube' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'button_bg_color',
            [
                'label'     => __( 'رنگ بک گراند دکمه', 'mytube' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .short-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_text_color',
            [
                'label'     => __( 'رنگ متن دکمه', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#FF4545',
                'selectors' => [
                    '{{WRAPPER}} .short-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'button_text_typography',
                'label'    => __( 'تایپوگرافی متن دکمه', 'mytube' ),
                'selector' => '{{WRAPPER}} .short-button',
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
            'style_videos_section',
            [
                'label' => __( 'ویدیوها', 'mytube' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'video_width',
            [
                'label' => __( 'عرض ویدیو', 'mytube' ),
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
                    'size' => 270,
                ],
                'selectors' => [
                    '{{WRAPPER}} .short-video' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'video_height',
            [
                'label' => __( 'ارتفاع ویدیو', 'mytube' ),
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
                    '{{WRAPPER}} .short-video' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'video_title_color',
            [
                'label'     => __( 'رنگ عنوان ویدیو', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .video-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'video_title_typography',
                'label'    => __( 'تایپوگرافی عنوان ویدیو', 'mytube' ),
                'selector' => '{{WRAPPER}} .video-title',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 16, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 700 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );

        $this->add_responsive_control(
            'video_description_color',
            [
                'label'     => __( 'رنگ متن ویدیو', 'mytube' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#ffffffa4',
                'selectors' => [
                    '{{WRAPPER}} .video-description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'video_description_typography',
                'label'    => __( 'تایپوگرافی متن ویدیو', 'mytube' ),
                'selector' => '{{WRAPPER}} .video-description',
                'fields_options' => [
                    'typography' => [ 'default' => 'default' ], 
                    'font_size'  => [ 'default' => [ 'size' => 14, 'unit' => 'px' ] ],
                    'font_weight'=> [ 'default' => 400 ],
                    'font_family'=> [ 'default' => 'IRANYekanX' ],
                ]
            ]
        );
    }

    public function render() {
        $settings  = $this->get_settings_for_display();
        $counters  = $settings['counters_list'];
        $videos    = $settings['videos_list'];
        $current   = 0;
        ?>
        <div class="short-videos">
            <!-- Background Layers -->
            <div class="short-layer1"></div>
            <div class="short-layer2"></div>
            <div class="short-layer3"></div>

            <!-- Title Section -->
            <div class="short-title-section">
                <img class="short-shape" src="<?php echo get_template_directory_uri(); ?>/assets/img/short-videos/shape.svg" />

                <div class="short-title-wrapper">
                    <?php if (!empty($settings['sv_heading_icon']['url'])) : ?>
                        <div class="short-title-icon">
                            <img src="<?php echo esc_url($settings['sv_heading_icon']['url']); ?>" alt="">
                        </div>
                    <?php endif; ?>
                    <span class="short-title">
                        <?php echo esc_html($settings['sv_heading_text']); ?>
                    </span>
                </div>

                <!-- Counters -->
                <div class="short-counters">
                    <?php if (!empty($counters)) : ?>
                        <?php foreach ($counters as $counter) : $current++; ?>
                            <div class="short-counter">
                                <div class="short-counter-icon">
                                    <?php if (!empty($counter['sv_counter_icon']['url'])) : ?>
                                        <img src="<?php echo esc_url($counter['sv_counter_icon']['url']); ?>" alt="<?php echo esc_attr($counter['sv_counter_text']); ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="short-counter-text">
                                    <span class="short-counter-number" data-target="<?php echo esc_attr($counter['sv_counter_number']); ?>">0</span>
                                    <div class="short-counter-description">
                                        <?php echo esc_attr($counter['sv_counter_text']); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <!-- Button -->
                <div href="<?php echo esc_url($settings['sv_button_url']['url']); ?>" class="short-button">
                    <?php echo esc_html($settings['sv_button_title']); ?>
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/playlist/red-arrow.svg'); ?>" alt="arrow-icon" />
                </div>
            </div>

            <!-- Videos Section -->
            <div class="short-videos-section">
                <?php if (!empty($videos)) : ?>
                    <?php foreach ($videos as $video) : 
                        $video_id = 'video_' . uniqid();
                        $thumbnail = $video['sv_video_thumbnail']['url'] ?? '';
                    ?>
                        <div class="short-video">
                            <img class="white-shape" src="<?php echo get_template_directory_uri(); ?>/assets/img/short-videos/white-shape.svg" />
                            <!-- Video Puzzle Icon -->
                            <div class="short-video-icon">
                                <?php if (!empty($video['sv_video_puzzle_icon']['url'])) : ?>
                                    <img src="<?php echo esc_url($video['sv_video_puzzle_icon']['url']); ?>" alt="Puzzle Icon">
                                <?php endif; ?>
                            </div>

                            <!-- Video Thumbnail -->
                            <?php if ($thumbnail) : ?>
                                <div class="video-thumbnail" onclick="
                                    const videoEl = document.getElementById('<?php echo esc_attr($video_id); ?>');
                                    videoEl.style.display = 'block';
                                    videoEl.play();
                                    this.style.display='none';
                                ">
                                    <img src="<?php echo esc_url($thumbnail); ?>" />
                                    <div class="play-button">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/short-videos/play-icon.svg" />
                                    </div>
                                </div>
                            <?php endif; ?>

                            <!-- Video Element -->
                            <?php if (!empty($video['sv_video_url']['url'])) : ?>
                                <video 
                                    id="<?php echo esc_attr($video_id); ?>" 
                                    class="video" 
                                    src="<?php echo esc_url($video['sv_video_url']['url']); ?>" 
                                    controls 
                                    style="display:<?php echo $thumbnail ? 'none' : 'block'; ?>;">
                                </video>
                            <?php endif; ?>

                            <!-- Video Content -->
                            <div class="short-video-content">
                                <?php if (!empty($video['sv_video_title'])) : ?>
                                    <h3 class="video-title">
                                        <?php echo esc_html($video['sv_video_title']); ?>
                                    </h3>
                                <?php endif; ?>

                                <?php if (!empty($video['sv_video_text'])) : ?>
                                    <p class="video-description">
                                        <?php echo esc_html($video['sv_video_text']); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <!-- Additional Background Layers -->
            <div class="short-layer4"></div>
            <div class="short-layer5"></div>
            <div class="short-layer6"></div>

            <!-- Mobile Button -->
            <a href="<?php echo esc_url($settings['sv_button_url']['url']); ?>" class="short-button-mobile">
                <?php echo esc_html($settings['sv_button_title']); ?>
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/playlist/red-arrow.svg'); ?>" alt="arrow-icon" />
            </a>
        </div>
    <?php
    }
}