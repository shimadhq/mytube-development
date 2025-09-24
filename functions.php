<?php
/**
 * Theme Functions
 * 
 * @package mytube
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

require_once get_template_directory() . '/inc/class-mytube-walker/class-mytube-walker.php';

/**
 * Uploading CSS & JS files
*/

function mytube_enqueue_scripts() {
    $version = date('YmdHis'); // Theme version for caching

    // Main style (style.css)
    wp_enqueue_style( 'mytube-style', get_stylesheet_uri(), [], $version );

    // Customized styles
    wp_enqueue_style( 'mytube-header-style', get_template_directory_uri() . '/assets/css/header/header.css', [], $version );
    wp_enqueue_style( 'mytube-fonts', get_template_directory_uri() . '/assets/css/custom-fonts.css', [], $version );
    wp_enqueue_style('main-banner', get_template_directory_uri() . '/assets/css/main-banner/main-banner.css', [], $version);
    wp_enqueue_style('video-category', get_template_directory_uri() . '/assets/css/video-category/video-category.css', [], $version);
    wp_enqueue_style('playlist', get_template_directory_uri() . '/assets/css/playlist/playlist.css', [], $version);
    wp_enqueue_style('most-visited-slider', get_template_directory_uri() . '/assets/css/most-visited-slider/most-visited-slider.css', [], $version);
    wp_enqueue_style('biography', get_template_directory_uri() . '/assets/css/biography/biography.css', [], $version);
    wp_enqueue_style('short-videos', get_template_directory_uri() . '/assets/css/short-videos/short-videos.css', [], $version);

    // Scripts
    wp_enqueue_script('mega-menu', get_template_directory_uri() . '/inc/js/mega-menu/mega-menu.js', array(), $version, true);
    wp_enqueue_script('video-category-tabs', get_template_directory_uri() . '/inc/js/widgets/video-category-tabs.js', array(), $version, true);
    wp_enqueue_script('slider', get_template_directory_uri() . '/inc/js/widgets/slider.js', array(), $version, true);
}
add_action( 'wp_enqueue_scripts', 'mytube_enqueue_scripts' );

/**
 * Adding settings menu & setting default items
*/
add_action('after_switch_theme', function() {
    // لوگوی دسکتاپ پیش‌فرض
    if ( ! get_option('mytube_logo_desktop') ) {
        update_option('mytube_logo_desktop', get_template_directory_uri() . '/assets/img/logo.png');
    }

    // لوگوی موبایل پیش‌فرض
    if ( ! get_option('mytube_logo_mobile') ) {
        update_option('mytube_logo_mobile', get_template_directory_uri() . '/assets/img/logo-mobile.svg');
    }

    // شماره تماس پشتیبانی پیش‌فرض
    if ( ! get_option('mytube_support_phone') ) {
        update_option('mytube_support_phone', '۰۹۳۰ ۹۹۱ ۰۹۰۵');
    }
});

add_action('admin_menu', function() {
    add_menu_page(
        'هدر', 
        'هدر', 
        'manage_options', 
        'mytube-header-settings', 
        'mytube_header_settings_page', 
        'dashicons-admin-customizer', 
        60
    );
});

add_action('admin_init', function() {
    register_setting('mytube_header_settings_group', 'mytube_logo_desktop');
    register_setting('mytube_header_settings_group', 'mytube_logo_mobile');
    register_setting('mytube_header_settings_group', 'mytube_support_phone');
});

function mytube_header_settings_page() {
    ?>
    <div class="wrap">
        <h1>تنظیمات هدر</h1>
        <form method="post" action="options.php" enctype="multipart/form-data">
            <?php settings_fields('mytube_header_settings_group'); ?>
            <table class="form-table">
                <tr>
                    <th>لوگوی دسکتاپ</th>
                    <td>
                        <input type="text" name="mytube_logo_desktop" value="<?php echo esc_attr(get_option('mytube_logo_desktop')); ?>" style="width:60%;" />
                        <input type="button" class="button" value="آپلود لوگو" id="upload_logo_desktop">
                        <?php if(get_option('mytube_logo_desktop')): ?>
                            <div><img src="<?php echo esc_url(get_option('mytube_logo_desktop')); ?>" style="max-width:200px;"></div>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th>لوگوی موبایل</th>
                    <td>
                        <input type="text" name="mytube_logo_mobile" value="<?php echo esc_attr(get_option('mytube_logo_mobile')); ?>" style="width:60%;" />
                        <input type="button" class="button" value="آپلود لوگو" id="upload_logo_mobile">
                        <?php if(get_option('mytube_logo_mobile')): ?>
                            <div><img src="<?php echo esc_url(get_option('mytube_logo_mobile')); ?>" style="max-width:200px;"></div>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th>شماره تماس پشتیبانی</th>
                    <td>
                        <input type="text" name="mytube_support_phone" value="<?php echo esc_attr(get_option('mytube_support_phone')); ?>" style="width:60%;" />
                    </td>
                </tr>
            </table>
            <?php submit_button('ذخیره تغییرات'); ?>
        </form>
    </div>

    <script>
    jQuery(document).ready(function($){
        var mediaUploader;

        $('#upload_logo_desktop').click(function(e){
            e.preventDefault();
            mediaUploader = wp.media({ title: 'انتخاب لوگو دسکتاپ', multiple: false });
            mediaUploader.on('select', function() {
                var attachment = mediaUploader.state().get('selection').first().toJSON();
                $('input[name="mytube_logo_desktop"]').val(attachment.url);
            });
            mediaUploader.open();
        });

        $('#upload_logo_mobile').click(function(e){
            e.preventDefault();
            mediaUploader = wp.media({ title: 'انتخاب لوگو موبایل', multiple: false });
            mediaUploader.on('select', function() {
                var attachment = mediaUploader.state().get('selection').first().toJSON();
                $('input[name="mytube_logo_mobile"]').val(attachment.url);
            });
            mediaUploader.open();
        });
    });
    </script>
    <?php
}

/**
 * Registering nav menu after theme setup
*/
function mytube_theme_setup() {
    // registering menu
    register_nav_menus([
        'primary-menu' => __('منوی اصلی', 'mytube'),
    ]);
}
add_action('after_setup_theme', 'mytube_theme_setup');

function mytube_create_default_menu(){
    if (wp_get_nav_menu_object('Main Menu')) {
        return;
    }

    // Creating menu
    $menu_id = wp_create_nav_menu('Main Menu');

    $locations = get_theme_mod('nav_menu_locations');
    $locations['primary-menu'] = $menu_id;
    set_theme_mod('nav_menu_locations', $locations);

    $videos = wp_update_nav_menu_item($menu_id, 0, [
        'menu-item-title' => __('ویـدیـوهـا', 'mytube'),
        'menu-item-url'   => '#',
        'menu-item-status'=> 'publish'
    ]);

    $cat1 = wp_update_nav_menu_item($menu_id, 0, [
        'menu-item-title'  => __('دسته بندی ویدیوها', 'mytube'),
        'menu-item-desc' => '16 دسته بندی',
        'menu-item-url'    => '#',
        'menu-item-status' => 'publish',
        'menu-item-parent-id' => $videos
    ]);
    foreach (['ویدیوهای طنز', 'چالش ها', 'معرفی بازی', 'گیم پلی', 'آموزشی', 'آموزشی', 'ماجراجویی', 'موزیک', 'داستانی', 
    'کسب و کار', 'ترسناک', 'مصاحبه', 'علمی', 'زندگینامه', 'درباره خودم', 'سفر', 'تدوین و موشن'] as $item) {
        wp_update_nav_menu_item($menu_id, 0, [
            'menu-item-title'  => $item,
            'menu-item-url'    => '#',
            'menu-item-status' => 'publish',
            'menu-item-parent-id' => $cat1
        ]);
    }

    $cat2 = wp_update_nav_menu_item($menu_id, 0, [
        'menu-item-title'  => __('ویدیوهای کوتاه', 'mytube'),
        'menu-item-desc' => '67 ویدیو',
        'menu-item-url'    => '#',
        'menu-item-status' => 'publish',
        'menu-item-parent-id' => $videos
    ]);
    foreach (['ویدیوهای طنز', 'چالش ها', 'معرفی بازی', 'گیم پلی', 'آموزشی'] as $item) {
        wp_update_nav_menu_item($menu_id, 0, [
            'menu-item-title'  => $item,
            'menu-item-url'    => '#',
            'menu-item-status' => 'publish',
            'menu-item-parent-id' => $cat2
        ]);
    }

    $cat3 = wp_update_nav_menu_item($menu_id, 0, [
        'menu-item-title'  => __('لیست های پخش', 'mytube'),
        'menu-item-desc' => '12 لیست پخش',
        'menu-item-url'    => '#',
        'menu-item-status' => 'publish',
        'menu-item-parent-id' => $videos
    ]);
    foreach (['MySQL', 'MongoDB', 'PostgreSQL'] as $item) {
        wp_update_nav_menu_item($menu_id, 0, [
            'menu-item-title'  => $item,
            'menu-item-url'    => '#',
            'menu-item-status' => 'publish',
            'menu-item-parent-id' => $cat3
        ]);
    }

    wp_update_nav_menu_item($menu_id, 0, [
        'menu-item-title' => __('صفحه اصلی', 'mytube'),
        'menu-item-url' => '/',
        'menu-item-status' => 'publish'
    ]);

    $courses = wp_update_nav_menu_item($menu_id, 0, [
        'menu-item-title' => __('دوره‌ها', 'mytube'),
        'menu-item-url'   => '#',
        'menu-item-status'=> 'publish'
    ]);

    $sub_items = ['دوره مقدماتی', 'دوره متوسط', 'دوره پیشرفته', 'دوره پروژه محور'];
    foreach ($sub_items as $item) {
        wp_update_nav_menu_item($menu_id, 0, [
            'menu-item-title'  => $item,
            'menu-item-url'    => '#',
            'menu-item-status' => 'publish',
            'menu-item-parent-id' => $courses
        ]);
    }

    wp_update_nav_menu_item($menu_id, 0, [
        'menu-item-title' => __('بیوگرافی', 'mytube'),
        'menu-item-url'   => '#',
        'menu-item-status'=> 'publish'
    ]);

    wp_update_nav_menu_item($menu_id, 0, [
        'menu-item-title' => __('وبلاگ', 'mytube'),
        'menu-item-url'   => '#',
        'menu-item-status'=> 'publish'
    ]);

    wp_update_nav_menu_item($menu_id, 0, [
        'menu-item-title' => __('تماس با من', 'mytube'),
        'menu-item-url'   => '#',
        'menu-item-status'=> 'publish'
    ]);
}
add_action('after_switch_theme', 'mytube_create_default_menu');

/**
 * Adding custom elementor category
 */
add_action( 'elementor/elements/categories_registered', function( $elements_manager ) {
    $elements_manager->add_category(
        'mytube-category',
        [
            'title' => __( 'My Tube', 'mytube' ),
            'icon'  => 'eicon-youtube',
        ]
    );
}, 10 );

/**
 * Adding elementor widgets
 */

function register_mytube_widgets(){
    $widgets = [
        [
            'path' => '/template-parts/widgets/main-banner_widget.php',
            'class' => 'WPC\Widgets\Main_Banner',
        ],
        [
            'path' => '/template-parts/widgets/video-category_widget.php',
            'class' => 'WPC\Widgets\Video_Category',
        ],
        [
            'path' => '/template-parts/widgets/playlist_widget.php',
            'class' => 'WPC\Widgets\Playlist',
        ],
        [
            'path' => '/template-parts/widgets/most-visited-slider_widget.php',
            'class' => 'WPC\Widgets\Most_Visited_Slider',
        ],
        [
            'path' => '/template-parts/widgets/biography_widget.php',
            'class' => 'WPC\Widgets\Biography',
        ],
        [
            'path' => '/template-parts/widgets/short-videos_widget.php',
            'class' => 'WPC\Widgets\Short_Videos',
        ],
    ];

    foreach ($widgets as $widget) {
        $full_path = get_template_directory() . $widget['path'];
        if (file_exists($full_path)) {
            require_once $full_path;

            if (class_exists($widget['class'])) {
                \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new $widget['class']);
            } else {
                error_log("Class {$widget['class']} not found in {$full_path}");
            }
        } else {
            error_log("Widget file not found: {$full_path}");
        }
    }
}
add_action('elementor/widgets/register', 'register_mytube_widgets');

?>