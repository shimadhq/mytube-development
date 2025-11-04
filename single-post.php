<?php
/**
 * Template for single post
 */

get_header(); 
?>

<div class="single-blog">
    <nav class="breadcrumb">
        <a class="main-page" href="<?php echo esc_url( home_url('/') ); ?>">MYTUBE</a>

        <?php
            // Separator icon
            $separator_icon = get_template_directory_uri() . '/assets/img/widgets/breadcrumb/arrow.svg';

            // Check page type
            if ( is_404() ) {
                // --- 404 page ---
                ?>
                    <span class="separator">
                        <img src="<?php echo esc_url( $separator_icon ); ?>" alt="separator" />
                    </span>
                    <span class="current-page">404</span>

                <?php
            } elseif ( is_single() && 'post' === get_post_type() ) {
                // --- Blog posts ---
                $categories = get_the_category();
                if ( ! empty( $categories ) ) {
                    $category = $categories[0];
                    ?>
                        <span class="separator">
                            <img src="<?php echo esc_url( $separator_icon ); ?>" alt="separator" />
                        </span>
                        <a class="previous-page" href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>">
                            <?php echo esc_html( $category->name ); ?>
                        </a>
                    <?php 
                } 
                ?>
                    <span class="separator">
                        <img src="<?php echo esc_url( $separator_icon ); ?>" alt="separator" />
                    </span>
                    <span class="current-page"><?php echo esc_html( get_the_title() ); ?></span>

                <?php
            } elseif ( is_page() ) {
                // --- For pages ---
                global $post;
                $ancestors = get_post_ancestors( $post );

                if ( ! empty( $ancestors ) ) {
                    $ancestors = array_reverse( $ancestors );
                    foreach ( $ancestors as $ancestor ) {
                        ?>
                            <span class="separator">
                                <img src="<?php echo esc_url( $separator_icon ); ?>" alt="separator" />
                            </span>
                            <a class="previous-page" href="<?php echo esc_url( get_permalink( $ancestor ) ); ?>">
                                <?php echo esc_html( get_the_title( $ancestor ) ); ?>
                            </a>
                        <?php
                    }
                }
                ?>
                    <span class="separator">
                        <img src="<?php echo esc_url( $separator_icon ); ?>" alt="separator" />
                    </span>
                    <span class="current-page"><?php echo esc_html( get_the_title() ); ?></span>

                <?php
            } else {
                // --- Other items (such as archives, categories, search results, etc.)---
                ?>
                    <span class="separator">
                        <img src="<?php echo esc_url( $separator_icon ); ?>" alt="separator" />
                    </span>
                    <span class="current-page"><?php echo wp_get_document_title(); ?></span>
                <?php 
            } 
        ?>
    </nav>
    <div class="single-blog-sections">
        <div class="single-blog-content-wrapper">
            <div class="single-blog-title-wrapper">
                <?php 
                    $title = get_the_title(); 
                ?>
                <div class="single-blog-title">
                    <?php echo esc_html($title); ?>
                </div>
                <div class="single-blog-buttons">
                    <button class="blog-share-button">
                        <img src="<?php echo get_template_directory_uri() . '/assets/img/blog/share.svg' ?>" />
                    </button>
                    <div class="blog-separator"></div>
                    <div class="wishlist">
                        <span class="wishlist-text">
                            افزودن به علاقمندی ها
                        </span>
                        <div class="wishlist-button">
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/blog/heart.svg' ?>" class="wishlist-icon" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-blog-thumbnail">
                <?php 
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail('large');
                    } else {
                        echo '<img src="' . get_template_directory_uri() . '/assets/img/blog/blog1.webp" alt="<?php echo esc_html($title); ?>">';
                    }
                ?>
            </div>
            <div class="single-blog-summary">
                <!-- Background Layers -->
                <img src="<?php echo get_template_directory_uri() . '/assets/img/blog/layer1.svg' ?>" class="blog-layer1" />
                <img src="<?php echo get_template_directory_uri() . '/assets/img/blog/layer2.svg' ?>" class="blog-layer2" />
                <img src="<?php echo get_template_directory_uri() . '/assets/img/blog/layer3.svg' ?>" class="blog-layer3" />

                <!-- Content Section -->
                <div class="summery-section">
                    <div class="views-section">
                        <img src="<?php echo get_template_directory_uri() . '/assets/img/blog/views.svg' ?>" />
                        <div class="views-wrapper">
                            <span class="views-text">
                                بازدید
                            </span>
                            <div class="views-count-wrapper">
                                <span class="views-count">
                                    <?php
                                        $count_key = 'post_views_count';
                                        $count = get_post_meta(get_the_ID(), $count_key, true);
                                        echo $count ? esc_html($count) : '0';
                                    ?>
                                </span>
                                <span class="views-count">
                                    بازدید
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="post-date-section">
                        <img src="<?php echo get_template_directory_uri() . '/assets/img/blog/date.svg' ?>" />
                        <div class="post-date-wrapper">
                            <span class="post-date-text">
                                تاریخ انتشار
                            </span>
                            <span class="post-date">
                                <?php echo function_exists('jdate') 
                                    ? jdate('Y/m/d', strtotime(get_the_date())) 
                                    : get_the_date('Y/m/d'); 
                                ?>
                            </span>
                        </div>
                    </div>
                    <div class="author-section">
                        <img src="<?php echo get_template_directory_uri() . '/assets/img/blog/writer.svg' ?>" />
                        <div class="author-wrapper">
                            <span class="author-text">
                                نویسنده
                            </span>
                            <a class="post-author" href="<?php echo esc_url($author_url); ?>">
                                <?php echo esc_html($author_name); ?>
                            </a>
                        </div>
                    </div>
                    <div class="category-section">
                        <img src="<?php echo get_template_directory_uri() . '/assets/img/blog/category.svg' ?>" />
                        <div class="category-wrapper">
                            <span class="category-text">
                                دسته بندی
                            </span>
                            <span class="post-category">
                                <?php
                                    $categories = get_the_category();
                                    if ( ! empty( $categories ) ) {
                                        echo esc_html( $categories[0]->name );
                                    }
                                ?>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Additional Background Layers -->
                <img src="<?php echo get_template_directory_uri() . '/assets/img/blog/layer1.svg' ?>" class="blog-layer4" />
                <img src="<?php echo get_template_directory_uri() . '/assets/img/blog/layer2.svg' ?>" class="blog-layer5" />
                <img src="<?php echo get_template_directory_uri() . '/assets/img/blog/layer4.svg' ?>" class="blog-layer6" />
            </div>
            <div class="single-blog-content">
                <?php
                    $content = apply_filters('the_content', get_the_content());

                    // تقسیم محتوا بر اساس h2 یا h3
                    $pattern = '/(<h2[^>]*>.*?<\/h2>|<h3[^>]*>.*?<\/h3>)/is';
                    $parts = preg_split($pattern, $content, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);

                    $blocks = [];
                    $current_heading = null;

                    foreach ($parts as $part) {
                        if (preg_match('/<h[23][^>]*>(.*?)<\/h[23]>/', $part, $heading)) {
                            if ($current_heading !== null) {
                                $blocks[] = $current_heading;
                            }

                            $current_heading = [
                                'title' => trim($heading[1]),
                                'content' => ''
                            ];
                        } else {
                            if ($current_heading !== null) {
                                $current_heading['content'] .= $part;
                            }
                        }
                    }

                    if ($current_heading !== null) {
                        $blocks[] = $current_heading;
                    }
                ?>

                <?php if (!empty($blocks)): ?>
                    <?php foreach ($blocks as $block): ?>
                        <div class="content-block">
                            <div class="title-bg">
                                <img class="blog-frame" src="<?php echo get_template_directory_uri(); ?>/assets/img/blog/frame.svg" alt="title background" />
                            </div>
                            <div class="block-title">
                                <h2 class="block-heading"><?php echo esc_html($block['title']); ?></h2>
                            </div>

                            <div class="block-text">
                                <?php echo wp_kses_post($block['content']); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="post-tags-section">
                <?php
                    $post_tags = get_the_tags();

                    if ( $post_tags ) : 
                ?>
                    <ul class="post-tags">
                        <?php foreach ( $post_tags as $tag ) : ?>
                            <li class="post-tag">
                                <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>">
                                    #<?php echo esc_html( $tag->name ); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
        <div class="single-blog-category-wrapper">
            <ul class="single-blog-categories-list">
                <?php 
                    $all_posts_count = wp_count_posts('post')->publish;
                ?>
                <li data-cat="all" class="category-item active">
                    همه
                </li>
                <?php
                    $categories = get_categories([
                        'taxonomy' => 'category',
                        'hide_empty' => false,
                        'orderby' => 'name',
                        'order' => 'ASC',
                    ]);

                    if ($categories) :
                        foreach ($categories as $cat) : ?>
                            <li class="category-item" data-cat="<?php echo esc_attr($cat->term_id); ?>">
                                <?php echo esc_html($cat->name); ?>
                            </li>
                        <?php endforeach;
                    endif;
                ?>
            </ul>
            <div class="single-blog-posts-wrapper" id="single-blog-posts-wrapper">
                <?php
                    $default_posts = new WP_Query([
                        'post_type' => 'post',
                        'posts_per_page' => 2,
                    ]);

                    if ($default_posts->have_posts()) :
                        while ($default_posts->have_posts()) : $default_posts->the_post();
                            get_template_part('template-parts/blog_widgets/blog-card/blog-card_widget');
                        endwhile;
                        wp_reset_postdata();
                    endif;
                ?>
            </div>
        </div>
    </div>
</div>