<article class="blog-card">
    <a href="<?php the_permalink(); ?>" class="blog-card-link">
        <div class="blog-card-thumb-wrapper">
            <div class="blog-card-thumb">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('medium_large'); ?>
                <?php else : ?>
                    <img class="thumbnail" src="<?php echo get_template_directory_uri(); ?>/assets/img/blog/blog1.webp" alt="<?php the_title(); ?>">
                <?php endif; ?>
            </div>
            <div class="blog-card-title-excerpt-wrapper">
                <h2 class="blog-card-title"><?php the_title(); ?></h2>
                <p class="blog-card-excerpt">
                    <?php echo wp_trim_words(get_the_excerpt(), 3, '...'); ?>
                </p>
            </div>
        </div>

        <div class="blog-card-content">
            <div class="blog-card-meta">
                <img src="<?php echo get_template_directory_uri() . '/assets/img/blog/clock.svg' ?>" />
                <span class="blog-card-date">
                    <?php
                        $post_time = get_the_time('U'); // Post publishing time in seconds
                        $current_time = current_time('timestamp'); // Current time
                        $time_diff = $current_time - $post_time;

                        if ($time_diff < 60 * 60 * 24) {
                            echo 'امـروز';
                        } elseif ($time_diff < 60 * 60 * 48) {
                            echo 'دیـروز';
                        } elseif ($time_diff < 60 * 60 * 24 * 7) {
                            echo 'یـک هفـته پـیـش';
                        } elseif ($time_diff < 60 * 60 * 24 * 30) {
                            echo 'یـک مـاه پـیـش';
                        } elseif ($time_diff < 60 * 60 * 24 * 90) {
                            echo 'سـه مـاه پـیـش';
                        } elseif ($time_diff < 60 * 60 * 24 * 180) {
                            echo 'شـش مـاه پـیـش';
                        } elseif ($time_diff < 60 * 60 * 24 * 365) {
                            echo 'کـمـتر از یـک سـال پـیـش';
                        } else {
                            echo 'بـیـش از یـک سـال پـیـش';
                        }
                    ?>
                </span>
            </div>
            <div class="blog-card-readmore">
                <a>
                    <span class="readmore">
                        مطالعه مقاله
                    </span>
                    <div class="readmore-icon">
                        <img src="<?php echo get_template_directory_uri() . '/assets/img/blog/readmore.svg' ?>" />
                    </div>
                </a>
            </div>
        </div>
    </a>
</article>
