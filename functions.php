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
require_once get_template_directory() . '/inc/class-mytube-mobile-walker/class-mytube-mobile-walker.php';

/**
 * Uploading CSS & JS files
*/

function mytube_enqueue_scripts() {
    $version = date('YmdHis'); // Theme version for caching

    // Main style (style.css)
    wp_enqueue_style( 'mytube-style', get_stylesheet_uri(), [], $version );

    // Customized styles
    wp_enqueue_style( 'mytube-header-style', get_template_directory_uri() . '/assets/css/header/header.css', [], $version );
    wp_enqueue_style('main-banner', get_template_directory_uri() . '/assets/css/elementor-widgets/main-banner/main-banner.css', [], $version);
    wp_enqueue_style('video-category', get_template_directory_uri() . '/assets/css/elementor-widgets/video-category/video-category.css', [], $version);
    wp_enqueue_style('playlist', get_template_directory_uri() . '/assets/css/elementor-widgets/playlist/playlist.css', [], $version);
    wp_enqueue_style('most-visited-slider', get_template_directory_uri() . '/assets/css/elementor-widgets/most-visited-slider/most-visited-slider.css', [], $version);
    wp_enqueue_style('biography', get_template_directory_uri() . '/assets/css/elementor-widgets/biography/biography.css', [], $version);
    wp_enqueue_style('short-videos', get_template_directory_uri() . '/assets/css/elementor-widgets/short-videos/short-videos.css', [], $version);
    wp_enqueue_style('contact-us', get_template_directory_uri() . '/assets/css/elementor-widgets/contact-us/contact-us.css', [], $version);
    wp_enqueue_style('courses', get_template_directory_uri() . '/assets/css/elementor-widgets/courses/courses.css', [], $version);
    wp_enqueue_style('comments', get_template_directory_uri() . '/assets/css/elementor-widgets/comments/comments.css', [], $version);
    wp_enqueue_style('contact-form', get_template_directory_uri() . '/assets/css/contact-us/contact-form/contact-form.css', [], $version);
    wp_enqueue_style('custom-breadcrumb', get_template_directory_uri() . '/assets/css/elementor-widgets/custom-breadcrumb/custom-breadcrumb.css', [], $version);
    wp_enqueue_style('blog-archive', get_template_directory_uri() . '/assets/blog/blog-archive.css', [], $version);
    wp_enqueue_style('blog-card', get_template_directory_uri() . '/assets/css/blog/blog-card.css', [], $version);

    // Scripts
    wp_enqueue_script('mega-menu', get_template_directory_uri() . '/inc/js/mega-menu/mega-menu.js', array(), $version, true);
    wp_enqueue_script('video-category-tabs', get_template_directory_uri() . '/inc/js/widgets/video-category-tabs.js', array(), $version, true);
    wp_enqueue_script('slider', get_template_directory_uri() . '/inc/js/widgets/slider.js', array(), $version, true);
    wp_enqueue_script('mobile-menu', get_template_directory_uri() . '/inc/js/mobile-menu/mobile-menu.js', array (), $version, true);
    wp_enqueue_script('cart-toggle', get_template_directory_uri() . '/inc/js/cart-toggle/cart-toggle.js', array (), $version, true);
    wp_enqueue_script('vertical-slider', get_template_directory_uri() . '/inc/js/widgets/vertical-slider.js', array (), $version, true);
    wp_enqueue_script('short-videos-counter', get_template_directory_uri() . '/inc/js/widget/short-videos-counter.js', array (), $version, true);
    wp_enqueue_script('main-banner-counter', get_template_directory_uri() . '/inc/js/widgets/main-banner-counter.js', array (), $version, true);
}
add_action( 'wp_enqueue_scripts', 'mytube_enqueue_scripts' );

function mytube_add_custom_fonts() {
    // Upload custom font CSS
    $version = date('YmdHis'); // cache buster
    wp_enqueue_style( 
        'IRANYekanX', 
        get_template_directory_uri() . '/assets/css/custom-fonts/custom-fonts.css', 
        [], 
        $version 
    );

    // Register custom font in Elementor
    if ( class_exists( '\Elementor\Plugin' ) ) {

        // Add custom group name to Elementor
        add_filter( 'elementor/fonts/groups', function( $groups ) {
            $groups['mytube_font'] = [
                'title' => __( 'My Tube Fonts', 'mytube' ),
            ];
            return $groups;
        });

        // Add font to Elementor list
        add_filter( 'elementor/fonts/additional_fonts', function( $fonts ) {
            $fonts['IRANYekanX'] = [
                'label' => 'IRAN Yekan Font',
                'stack' => 'IRANYekanX, sans-serif',
                'category' => 'sans-serif',
            ];
            return $fonts;
        });
    }
}
add_action( 'elementor/frontend/after_enqueue_styles', 'mytube_add_custom_fonts' );

/**
 * Enqueue the 404.css file separately
 */
function enqueue_404_styles() {
    if (is_404()) {
        wp_enqueue_style('style-404', get_template_directory_uri() . '/assets/css/404/404.css', array(), '1.0.0');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_404_styles');

/**
 * Localizing Ajax URL
 */
function mytube_blog_scripts() {
    wp_enqueue_script('mytube-blog-tabs', get_template_directory_uri() . '/inc/js/blog/blog-tabs.js', ['jquery'], null, true);

    wp_localize_script('mytube-blog-tabs', 'mytube_ajax', [
        'ajax_url' => admin_url('admin-ajax.php')
    ]);
}
add_action('wp_enqueue_scripts', 'mytube_blog_scripts');

/**
 * Blog sorting ajax
 */
function mytube_enqueue_blog_ajax_script() {
    wp_enqueue_script(
        'mytube-blog-ajax',
        get_template_directory_uri() . '/inc/js/blog/blog-ajax.js',
        ['jquery'],
        null,
        true
    );
}
add_action('wp_enqueue_scripts', 'mytube_enqueue_blog_ajax_script');

/**
 * Adding settings menu & setting default items
*/
add_action('after_switch_theme', function() {
    // Default desktop logo
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

    $blog_page = get_page_by_path( 'blog' );
    $blog_url  = $blog_page ? get_permalink( $blog_page->ID ) : home_url( '/blog/' );

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
       'menu-item-title'  => __('وبلاگ', 'mytube'),
       'menu-item-url'    => esc_url( $blog_url ),
       'menu-item-status' => 'publish'
    ]);

    wp_update_nav_menu_item($menu_id, 0, [
        'menu-item-title' => __('تماس با من', 'mytube'),
        'menu-item-url'   => '#',
        'menu-item-status'=> 'publish'
    ]);
}
add_action('after_switch_theme', 'mytube_create_default_menu');

/**
 * Create or get a page by title
 */
function mytheme_get_or_create_page( $title, $slug ) {
    // Query for a page with that title
    $query = new WP_Query( [
        'post_type'      => 'page',
        'title'          => $title,
        'posts_per_page' => 1,
        'post_status'    => [ 'publish', 'draft', 'pending' ],
        'fields'         => 'ids',
    ] );

    if ( $query->have_posts() ) {
        return $query->posts[0];
    }

    // If not found, create it
    return wp_insert_post( [
        'post_title'   => $title,
        'post_name'    => sanitize_title( $slug ),
        'post_content' => '',
        'post_status'  => 'publish',
        'post_type'    => 'page',
    ] );
}

/**
 * Import an Elementor template JSON file into a page
 */
function mytheme_import_elementor_template( $page_id, $template_file ) {
    if ( ! $page_id || ! class_exists( '\Elementor\Plugin' ) ) return;

    $template_path = get_template_directory() . '/template-parts/elementor_templates/' . $template_file;

    if ( ! file_exists( $template_path ) ) {
        error_log('❌ Template not found: ' . $template_path);
        return;
    }

    $json = file_get_contents( $template_path );
    $data = json_decode( $json, true );

    // Elementor export file structure
    $content = [];
    if ( isset( $data['content'] ) ) {
        $content = $data['content']; // normal export
    } elseif ( isset( $data[0]['elType'] ) ) {
        $content = $data; // raw elementor elements array
    } else {
        error_log('⚠️ Unknown Elementor JSON structure.');
        return;
    }

    // Encode properly
    $elementor_data = wp_slash( wp_json_encode( $content ) );

    // Save Elementor data correctly
    update_post_meta( $page_id, '_elementor_edit_mode', 'builder' );
    update_post_meta( $page_id, '_elementor_data', $elementor_data );
    update_post_meta( $page_id, '_elementor_template_type', 'wp-page' );
    update_post_meta( $page_id, '_wp_page_template', 'default' );

    // Force Elementor to rebuild CSS
    $files_manager = \Elementor\Plugin::$instance->files_manager;
    if ( method_exists( $files_manager, 'clear_cache' ) ) {
        $files_manager->clear_cache();
    }
    // regenerate_css() حذف شده، نیاز به فراخوانی مستقیم نیست

    error_log('✅ Elementor template imported successfully to page ID: ' . $page_id);
}

/**
 * Import multiple templates on Elementor init
 */
function mytheme_import_multiple_templates() {
    if ( get_option( 'mytheme_demo_pages_imported' ) ) return;

    // Define your pages here
    $pages = [
        [
            'title'    => 'MYTUBE',
            'slug'     => 'mytube',
            'template' => 'homepage.json',
            'front'    => true // Set as front page
        ],
    ];

    $front_page_id = null;

    foreach ( $pages as $page ) {
        $page_id = mytheme_get_or_create_page( $page['title'], $page['slug'] );
        if ( $page_id ) {
            mytheme_import_elementor_template( $page_id, $page['template'] );

            if ( $page['front'] ) {
                $front_page_id = $page_id;
            }
        }
    }

    // Set front page
    if ( $front_page_id ) {
        update_option( 'page_on_front', $front_page_id );
        update_option( 'show_on_front', 'page' );
    }

    update_option( 'mytheme_demo_pages_imported', true );
    error_log('🏁 All Elementor templates imported successfully.');
}
add_action( 'elementor/init', 'mytheme_import_multiple_templates' );

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
function register_mytube_widgets( $widgets_manager ){
    $widgets = [
        [
            'path' => '/template-parts/elementor_widgets/main-banner_widget.php',
            'class' => 'WPC\Widgets\Main_Banner',
        ],
        [
            'path' => '/template-parts/elementor_widgets/video-category_widget.php',
            'class' => 'WPC\Widgets\Video_Category',
        ],
        [
            'path' => '/template-parts/elementor_widgets/playlist_widget.php',
            'class' => 'WPC\Widgets\Playlist',
        ],
        [
            'path' => '/template-parts/elementor_widgets/most-visited-slider_widget.php',
            'class' => 'WPC\Widgets\Most_Visited_Slider',
        ],
        [
            'path' => '/template-parts/elementor_widgets/biography_widget.php',
            'class' => 'WPC\Widgets\Biography',
        ],
        [
            'path' => '/template-parts/elementor_widgets/short-videos_widget.php',
            'class' => 'WPC\Widgets\Short_Videos',
        ],
        [
            'path' => '/template-parts/elementor_widgets/contact-us_widget.php',
            'class' => 'WPC\Widgets\Contact_Us',
        ],
        [
            'path' => '/template-parts/elementor_widgets/courses_widget.php',
            'class' => 'WPC\Widgets\Courses',
        ],
        [
            'path' => '/template-parts/elementor_widgets/comments_widget.php',
            'class' => 'WPC\Widgets\Comments',
        ],
        [
            'path' => '/template-parts/elementor_widgets/custom-map_widget.php',
            'class' => 'WPC\Widgets\Custom_Map',
        ],
        [
            'path' => '/template-parts/elementor_widgets/contact-form_widget.php',
            'class' => 'WPC\Widgets\Contact_Form',
        ],
        [
            'path' => '/template-parts/elementor_widgets/custom-breadcrumb_widget.php',
            'class' => 'WPC\Widgets\Custom_Breadcrumb',
        ]
    ];

    foreach ($widgets as $widget) {
        $full_path = get_template_directory() . $widget['path'];

        if (file_exists($full_path)) {
            require_once $full_path;

            if (class_exists($widget['class'])) {
                $widgets_manager->register( new $widget['class'] );
            } else {
                error_log("Class {$widget['class']} not found in {$full_path}");
            }
        } else {
            error_log("Widget file not found: {$full_path}");
        }
    }
}
add_action('elementor/widgets/register', 'register_mytube_widgets');

/**
 * Checking if blog page exists or not, if not it should be created
 */
function mytheme_create_default_blog_page() {

    $existing_page = get_page_by_path( 'blog' );

    if ( ! $existing_page ) {
        // اگر وجود نداشت بسازش
        $blog_page_id = wp_insert_post( [
            'post_title'     => 'وبلاگ',
            'post_name'      => 'blog',
            'post_status'    => 'publish',
            'post_type'      => 'page',
            'post_content'   => '', // Blanck content because archive content is dynamic
        ] );

        // تنظیمش کن به عنوان صفحه‌ی نوشته‌ها
        update_option( 'page_for_posts', $blog_page_id );
        update_option( 'show_on_front', 'posts' );

        error_log('✅ صفحه وبلاگ ساخته شد با ID: ' . $blog_page_id);
    } else {
        error_log('ℹ️ صفحه وبلاگ از قبل وجود دارد.');
    }
}
add_action( 'after_switch_theme', 'mytheme_create_default_blog_page' );

/**
 * Setup default blog page, categories, and demo posts when theme is activated
 */
function mytube_setup_default_blog_content() {

    // 1️⃣ ساخت صفحه "وبلاگ" اگه وجود نداشت
    $existing_page = get_page_by_path('blog');
    if (!$existing_page) {
        $blog_page_id = wp_insert_post([
            'post_title'   => 'وبلاگ',
            'post_name'    => 'blog',
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_content' => '',
        ]);

        update_option('page_for_posts', $blog_page_id);
        error_log('✅ صفحه وبلاگ ساخته شد.');
    } else {
        $blog_page_id = $existing_page->ID;
        error_log('ℹ️ صفحه وبلاگ از قبل وجود دارد.');
    }

    // 2️⃣ ساخت دو دسته‌بندی پیش‌فرض
    $categories = [
        'آموزش تولید محتوا' => 'content-training',
        'رشد و توسعه کانال' => 'channel-growth',
    ];

    $created_terms = [];

    foreach ($categories as $cat_name => $cat_slug) {
        $term = term_exists($cat_name, 'category');
        if (!$term) {
            $new_term = wp_insert_term($cat_name, 'category', ['slug' => $cat_slug]);
            if (!is_wp_error($new_term)) {
                $created_terms[$cat_name] = $new_term['term_id'];
                error_log("✅ دسته‌بندی {$cat_name} ساخته شد.");
            }
        } else {
            $created_terms[$cat_name] = $term['term_id'];
            error_log("ℹ️ دسته‌بندی {$cat_name} از قبل وجود دارد.");
        }
    }

    $existing_posts = get_posts([
        'post_type'      => 'post',
        'posts_per_page' => 1,
        'fields'         => 'ids',
    ]);

    if (empty($existing_posts)) {
        $demo_posts = [
            [
                'post_title'  => 'چی شد که یوتوب رو شروع کردم؟',
                'slug'  => 'blog1',
                'cat'   => 'رشد و توسعه کانال',
                'image' => 'blog1.webp',
                'post_excerpt' => 'داستان شروع بدبختیامون ! بیاین تا داستانشو براتون بگم',
            ],
            [
                'post_title'  => 'معرفی 10 تا از بهترین موزیسین های رپ',
                'slug'  => 'blog2',
                'cat'   => 'آموزش تولید محتوا',
                'image' => 'blog2.webp',
                'post_excerpt' => 'سلام توی این پست بهترین رپرایی که همتون دوسشون دارین رو قراره معرفی کنم'
            ],
            [
                'title' => 'بهینه‌سازی سئو برای کانال یوتوب',
                'slug'  => 'blog3',
                'cat'   => 'رشد و توسعه کانال',
                'image' => 'blog3.webp',
                'post_excerpt' => 'بیا تا بهت بگم چطوری میتونی با رعایت یکسری نکات کانال یوتوبت رو سئو کنی'
            ],
            [
                'title' => 'ترفندهای تدوین سریع ویدیو برای مبتدی‌ها',
                'slug'  => 'blog4',
                'cat'   => 'آموزش تولید محتوا',
                'image' => 'blog4.webp',
                'post_excerpt' => 'تو این مقاله قراره یکسری ترفندهای سریع تدوین ویدیو رو بهتون یاد بدم'
            ],
        ];

        foreach ($demo_posts as $post_data) {
            $cat_id = $created_terms[$post_data['cat']] ?? null;
            $post_id = wp_insert_post([
                'post_title'   => $post_data['title'],
                'post_name'    => $post_data['slug'],
                'post_status'  => 'publish',
                'post_type'    => 'post',
                'post_excerpt' => $post_data['post_excerpt'],
                'post_category'=> $cat_id ? [$cat_id] : [],
            ]);

            // اگر عکس‌ها در پوشه‌ی قالب بودن، تنظیم به عنوان thumbnail
            $image_path = get_template_directory() . '/assets/img/blog/' . $post_data['image'];
            if (file_exists($image_path)) {
                $upload = wp_upload_bits(basename($image_path), null, file_get_contents($image_path));
                if (!$upload['error']) {
                    $wp_filetype = wp_check_filetype($upload['file'], null);
                    $attachment = [
                        'post_mime_type' => $wp_filetype['type'],
                        'post_title'     => sanitize_file_name($upload['file']),
                        'post_content'   => '',
                        'post_status'    => 'inherit',
                    ];
                    $attach_id = wp_insert_attachment($attachment, $upload['file'], $post_id);
                    require_once(ABSPATH . 'wp-admin/includes/image.php');
                    $attach_data = wp_generate_attachment_metadata($attach_id, $upload['file']);
                    wp_update_attachment_metadata($attach_id, $attach_data);
                    set_post_thumbnail($post_id, $attach_id);
                }
            }

            error_log('🆕 پست ساخته شد: ' . $post_data['title']);
        }
    } else {
        error_log('ℹ️ پست‌هایی از قبل وجود دارند، پست‌های نمونه ساخته نشدند.');
    }
}
add_action('after_switch_theme', 'mytube_setup_default_blog_content');

/**
 * Blog posts filter
 */
add_action('wp_ajax_filter_blog_posts', 'mytube_filter_blog_posts');
add_action('wp_ajax_nopriv_filter_blog_posts', 'mytube_filter_blog_posts');

function mytube_filter_blog_posts() {
  $cat = sanitize_text_field($_GET['cat']);

  $args = ['post_type' => 'post', 'posts_per_page' => 6];

  if ($cat !== 'all') {
    $args['tax_query'] = [
      [
        'taxonomy' => 'category',
        'field'    => 'name',
        'terms'    => $cat,
      ]
    ];
  }

  $query = new WP_Query($args);
  if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
      get_template_part('template-parts/elementor_widgets/blog-card_widget.php');
    endwhile;
  else :
    echo '<p>هیچ پستی یافت نشد.</p>';
  endif;

  wp_die();
}

/**
 * Setting blog post views
 */
function mytube_set_post_views($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);

    if ($count == '') {
        $count = 0;
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

/** 
 * Blog sorting filter
 */
add_action('wp_ajax_mytube_sort_posts', 'mytube_sort_posts');
add_action('wp_ajax_nopriv_mytube_sort_posts', 'mytube_sort_posts');

function mytube_sort_posts() {
    $sort = $_POST['sort'] ?? 'all';

    $args = [
        'post_type'      => 'post',
        'posts_per_page' => 12,
    ];

    switch ($sort) {
        case 'popular':
            $args['meta_key'] = 'post_likes';
            $args['orderby']  = 'meta_value_num';
            $args['order']    = 'DESC';
            break;

        case 'views':
            $args['meta_key'] = 'post_views_count';
            $args['orderby'] = 'meta_value_num';
            $args['order'] = 'DESC';
            break;

        case 'newest':
            $args['orderby'] = 'date';
            $args['order']   = 'DESC';
            break;

        case 'oldest':
            $args['orderby'] = 'date';
            $args['order']   = 'ASC';
            break;
    }

    $query = new WP_Query($args);

    ob_start();

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            get_template_part('template-parts/blog_widgets/blog-card/blog-card_widget.php');
        endwhile;
    else:
        echo '<p>هیچ پستی یافت نشد.</p>';
    endif;

    wp_reset_postdata();

    echo ob_get_clean();
    wp_die();
}

?>