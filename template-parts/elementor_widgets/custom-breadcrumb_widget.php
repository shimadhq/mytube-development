<?php
namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Custom_Breadcrumb extends Widget_Base {

    public function get_name() {
        return 'breadcrumb';
    }

    public function get_title() {
        return 'نقشه راه';
    }

    public function get_icon() {
        return 'eicon-navigation-horizontal';
    }

    public function get_style_depends() {
        return ['custom-breadcrumb']; // اسم فایل CSS خودت
    }

    public function get_categories() {
        return ['mytube-category'];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'mytube'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'separator',
            [
                'label' => __('Separator', 'mytube'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/img/widgets/breadcrumb/arrow.svg',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $separator = $settings['separator'];

        global $post;
        $ancestors = [];

        if ( is_page() && $post->post_parent ) {
            $ancestors = array_reverse( get_post_ancestors( $post->ID ) );
        }
        ?>
        <nav class="breadcrumb">
            <a class="main-page" href="<?php echo esc_url( home_url('/') ); ?>">MYTUBE</a>

            <?php if ( ! empty($ancestors) ): ?>
                <?php foreach ( $ancestors as $ancestor ): ?>
                    <span class="separator">
                        <?php if (!empty($separator['url'])): ?>
                            <img src="<?php echo esc_url($separator['url']); ?>" alt="separator" />
                        <?php endif; ?>
                    </span>
                    <a class="previous-page" href="<?php echo esc_url( get_permalink($ancestor) ); ?>">
                        <?php echo esc_html( get_the_title($ancestor) ); ?>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if ( ! is_front_page() ): ?>
                <span class="separator">
                    <?php if (!empty($separator['url'])): ?>
                        <img src="<?php echo esc_url($separator['url']); ?>" alt="separator" />
                    <?php endif; ?>
                </span>
                <span class="current-page"><?php echo esc_html( get_the_title() ); ?></span>
            <?php endif; ?>
        </nav>
        <?php
    }
}
