<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class MyTube_Walker_Nav_Menu extends Walker_Nav_Menu {

    private $is_mega = false; // وضعیت مگا منو
    private $current_item_id = 0; // آیتم مگا منو فعلی

    public function start_lvl( &$output, $depth = 0, $args = null ) {
        if ( $depth === 0 ) {
            // سطح اول
            $output .= $this->is_mega ? '<div class="mega-menu">' : '<ul class="simple-dropdown">';
        } elseif ( $depth === 1 && $this->is_mega ) {
            $output .= '<div class="submenu-level" data-subcat="cat-' . $this->parent_id . '">';
        }
    }

    public function end_lvl( &$output, $depth = 0, $args = null ) {
        if ( $depth === 0 ) {
            $output .= $this->is_mega ? '</div>' : '</ul>';
        } elseif ( $depth === 1 && $this->is_mega ) {
            $output .= '</div>';
        }
    }

    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $icons = include get_template_directory() . '/assets/icon/icons.php';
        $has_children = in_array( 'menu-item-has-children', $item->classes );
        $title = esc_html( $item->title );
        $url   = esc_url( $item->url );

        // === سطح اول ===
        if ( $depth === 0 ) {
            if ( $title === 'ویـدیـوهـا' && $has_children ) {
                $this->is_mega = true;
                $this->current_item_id = $item->ID;

                $output .= '<div class="category flex justify-between items-center" data-target="cat-' . $item->ID . '">';
                $output .= '<div class="video-wrapper">';
                $output .= '<div class="video">';
                $output .= '<span class="title-icon">' . $icons['video-icon1'] . '</span>';
                $output .= '<span class="title">' . $title . '</span>';
                $output .= '</div>';
                $output .= '<span class="right-icon">' . $icons['video-icon2'] . '</span>';
                $output .= '</div>'; // video-wrapper
            } elseif ( $has_children ) {
                $this->is_mega = false;
                $output .= '<div class="category menu-item-has-children">';
                $output .= '<a href="' . $url . '">' . $title . '</a>';
            } else {
                $this->is_mega = false;
                $output .= '<div class="category">';
                $output .= '<a href="' . $url . '">' . $title . '</a>';
            }
        }

        // === سطح دوم ===
        if ( $depth === 1 ) {
            if ( $this->is_mega ) {
                $this->parent_id = $item->ID;
                $output .= '<div class="subcategory-column" data-subcat="cat-' . $item->ID . '">';
                $output .= '<div class="subcategory-title">';
                $output .= '<div class="title-left">';
                $output .= '<div class="icon-wrapper">';
                // تعیین آیکن بر اساس عنوان
                switch ( $title ) {
                    case 'دسته بندی ویدیوها':
                        $output .= $icons['video'];
                        break;
                    case 'ویدیوهای کوتاه':
                        $output .= $icons['short'];
                        break;
                    case 'لیست های پخش':
                        $output .= $icons['list'];
                        break;
                }
                $output .= '</div>'; // icon-wrapper
                $output .= '<span class="title-text">' . $title . '</span>';
                $output .= '</div>'; // title-left
                $output .= '<div class="arrow-wrapper">' . $icons['arrow'] . '</div>';
                $output .= '</div>'; // subcategory-title
            } else {
                $output .= '<div class="submenu-item"><a href="' . $url . '">' . $title . '</a>';
                $output .= '<span class="arrow-wrapper">' . $icons['left-arrow'] . '</span></div>';
            }
        }

        // === سطح سوم ===
        if ( $depth === 2 && $this->is_mega ) {
            $output .= '<div class="subcategory-content"><a href="' . $url . '">' . $title . '</a></div>';
        }
    }

    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        // بستن div های باز
        if ( $depth === 0 ) {
            $output .= '</div>'; // بستن category
            if ( $item->ID === $this->current_item_id ) {
                $this->is_mega = false; // ریست وضعیت مگا بعد از "ویدیوها"
            }
        } elseif ( $depth === 1 && $this->is_mega ) {
            $output .= '</div>'; // بستن subcategory-column
        }
    }
}
