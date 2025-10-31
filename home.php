<?php get_header(); ?>

<div class="blog-archive">
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
    <div class="blog-section">
        <div class="blog-sidebar">
            <div class="blog-heading-wrapper">
                <img class="shape" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/video-category/shape.svg') ?>" alt="" />
                <div class="blog-title-wrap"> 
                    <div class="blog-icon-wrapper"> 
                        <img class="main-icon" src="<?php echo get_template_directory_uri() . '/assets/img/blog/blog.svg' ?>" alt="" /> 
                    </div> 
                    <span class="blog-heading"> مقــــالات مـــــــــــــــا </span>
                </div>
            </div>
            <ul class="blog-tabs">
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
                    'number'     => 5,
                ]);

                if ( ! empty($categories) ) :
                    foreach ($categories as $category) :
                ?>
                    <li class="blog-tab" data-cat="<?php echo esc_attr($category->slug); ?>">
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
            <div id="blog-posts-section" class="blog-posts-section">
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
                                get_template_part('template-parts/blog_widgets/blog-card/blog-card_widget.php');
                            endwhile;
                        else:
                            echo '<p>هیچ پستی یافت نشد.</p>';
                        endif;
                    ?>
                </div>

                <!-- 🔢 Pagination -->
                <div class="blog-pagination">
                    <?php
                        echo paginate_links([
                            'total'   => $query->max_num_pages,
                            'current' => max(1, get_query_var('paged')),
                            'prev_text' => '&lt;',
                            'next_text' => '&gt;',
                        ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>