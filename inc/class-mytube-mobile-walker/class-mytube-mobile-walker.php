<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Mobile_Walker_Nav_Menu extends Walker_Nav_Menu {

    private $icons;

    public function __construct() {
        // فقط یک بار آیکن‌ها لود میشن
        $this->icons = include get_template_directory() . '/assets/icon/icons.php';
    }

    public function start_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu depth-$depth\">\n";
    }

    public function end_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $classes = empty( $item->classes ) ? [] : (array) $item->classes;
        $classes[] = 'depth-' . $depth;

        $class_names = implode( ' ', array_map( 'sanitize_html_class', $classes ) );

        $has_children = in_array( 'menu-item-has-children', $classes, true );
        $title = esc_html( $item->title );
        $url   = ! empty( $item->url ) ? esc_url( $item->url ) : '#';

        $output .= '<li class="' . esc_attr( $class_names ) . '">';
        $output .= '<a href="' . $url . '" class="menu-link">' . $title . '</a>';

        // اگر فرزند داشت، آیکن toggle اضافه کنیم
        if ( $has_children && ! empty( $this->icons['arrow'] ) ) {
            $output .= '<span class="toggle-submenu">' . $this->icons['arrow'] . '</span>';
        }
    }

    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= "</li>\n";
    }
}
