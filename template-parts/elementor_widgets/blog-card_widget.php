<article class="blog-card">
    <a href="<?php the_permalink(); ?>" class="blog-card-link">
        <div class="blog-card-thumb">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('medium_large'); ?>
            <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/default-thumb.jpg" alt="<?php the_title(); ?>">
            <?php endif; ?>
        </div>

        <div class="blog-card-content">
            <div class="blog-card-meta">
                <?php
                $categories = get_the_category();
                if ($categories) {
                    echo '<span class="blog-card-category">' . esc_html($categories[0]->name) . '</span>';
                }
                ?>
                <span class="blog-card-date">
                    <?php echo get_the_date('j F Y'); ?>
                </span>
            </div>

            <h2 class="blog-card-title"><?php the_title(); ?></h2>

            <p class="blog-card-excerpt">
                <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
            </p>

            <span class="blog-card-readmore">مطالعه مقاله</span>
        </div>
    </a>
</article>
