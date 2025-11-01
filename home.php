<?php get_header(); ?>

<div class="blog-archive">
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
    <div class="blog-section">
        <div class="blog-sidebar">
            <div class="blog-heading-wrapper">
                <img class="blog-frame2" src="<?php echo get_template_directory_uri(); ?>/assets/img/blog/frame.svg" alt="title background" />
                <div class="blog-title-wrap"> 
                    <div class="blog-icon-wrapper"> 
                        <img class="main-icon" src="<?php echo get_template_directory_uri() . '/assets/img/blog/blog.svg' ?>" alt="" /> 
                    </div> 
                    <span class="blog-heading"> مقــــالات مـــــــــــــــا </span>
                </div>
            </div>
            <ul class="single-blog-tabs">
                <?php 
                    $all_posts_count = wp_count_posts('post')->publish;
                ?>
                <li data-cat="all" class="blog-tab active">
                    <div class="blog-title-wrapper">
                        <div class="blog-tab-icon-wrapper">
                            <img class="blog-tab-icon" src="<?php echo get_template_directory_uri() . '/assets/img/blog/tab-icon.svg'; ?>" />
                        </div>
                        <div class="blog-tab-heading-wrapper">
                            <span class="blog-tab-heading">همه مقالات</span>
                            <span class="blog-tab-count"><?php echo $all_posts_count; ?></span>
                        </div>
                    </div>
                    <div class="tab-arrow-icon">
                        <img class="tab-arrow" src="<?php echo get_template_directory_uri() . '/assets/img/blog/arrow.svg'; ?>" />
                    </div>
                </li>

                <?php
                $categories = get_categories([
                    'taxonomy'   => 'category',
                    'hide_empty' => false,
                    'orderby'    => 'name',
                    'order'      => 'ASC',
                ]);

                if ( ! empty($categories) ) :
                    foreach ($categories as $category) :
                ?>
                    <li class="blog-tab" data-cat="<?php echo esc_attr($category->term_id); ?>">
                        <div class="blog-title-wrapper">
                            <div class="blog-tab-icon-wrapper">
                                <img class="blog-tab-icon" src="<?php echo get_template_directory_uri() . '/assets/img/blog/tab-icon.svg'; ?>" />
                            </div>
                            <div class="blog-tab-heading-wrapper">
                                <span class="blog-tab-heading"><?php echo esc_html($category->name); ?></span>
                                <span class="blog-tab-count"><?php echo $category->count; ?></span>
                            </div>
                        </div>
                        <div class="tab-arrow-icon">
                            <img class="tab-arrow" src="<?php echo get_template_directory_uri() . '/assets/img/blog/arrow.svg'; ?>" />
                        </div>
                    </li>
                <?php
                    endforeach;
                    endif;
                ?>
            </ul>
        </div>
        <div id="blog-posts-section" class="blog-posts-section" data-ajax-url="<?php echo esc_url( admin_url('admin-ajax.php') ); ?>">
                <!-- 🔽 Sorting section -->
                <ul class="sort-options">
                    <li class="sort-item active" data-sort="all">همه</li>
                    <li class="sort-item" data-sort="popular">محبوب‌ترین‌ها</li>
                    <li class="sort-item" data-sort="views">پربازدیدترین‌ها</li>
                    <li class="sort-item" data-sort="newest">جدیدترین‌ها</li>
                    <li class="sort-item" data-sort="oldest">قدیمی‌ترین‌ها</li>
                </ul>

                <!-- 🧱 Showing posts section -->
                <div id="blog-posts" class="blog-posts">
                    <?php
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $args = [
                            'post_type'      => 'post',
                            'posts_per_page' => 12,
                            'paged'          => $paged,
                            'orderby'        => 'date',
                            'order'          => 'DESC',
                        ];

                        $query = new WP_Query($args);
                        if ($query->have_posts()) :
                            while ($query->have_posts()) : $query->the_post();
                                get_template_part('template-parts/blog_widgets/blog-card/blog-card_widget');
                            endwhile;
                        else:
                            echo '<p>هیچ پستی یافت نشد.</p>';
                        endif;
                        wp_reset_postdata();
                    ?>
                </div>

                <!-- 🔢 Pagination -->
                <div class="blog-pagination-wrapper">
                    <div class="blog-pagination">
                    <?php
                        global $wp_query;

                        $big = 999999999;
                        $paged = max(1, get_query_var('paged'));
                        $total = $query->max_num_pages;

                        if ($total > 1) { // Only shows pagination if there is more than one page
                            echo '<div class="pagination-wrapper">';

                            // اعداد صفحات
                            echo paginate_links([
                                'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                                'format'    => '?paged=%#%',
                                'current'   => $paged,
                                'total'     => $total,
                                'mid_size'  => 1,
                                'end_size'  => 3,
                                'prev_next' => false,
                                'type'      => 'list',
                            ]);

                            // Arrows
                            echo '<div class="pagination-arrows">';
                            previous_posts_link('<span class="page-arrow prev"></span>');
                            next_posts_link('<span class="page-arrow next"></span>', $total);
                            echo '</div>';

                            echo '</div>';
                        } elseif ($total === 1) {
                            // If there is one page only, then ...
                            echo '<div class="pagination-single">1</div>';
                        }
                    ?>
                </div>
                </div>
            </div>
    </div>
</div>

<?php get_footer(); ?>