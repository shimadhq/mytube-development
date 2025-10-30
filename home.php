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
        <div id="blog-posts">
            <?php
                $args = ['post_type' => 'post', 'posts_per_page' => 6];
                $query = new WP_Query($args);
                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        get_template_part('template-parts/elementor_widgets/blog-card_widget.php');
                    endwhile;
                endif;
            ?>
        </div>
        <div class="blog-sidebar">
            <ul class="blog-tabs">
                <li data-cat="all" class=" active"></li>
                <li data-cat="آموزش تولید محتوا">آموزش تولید محتوا</li>
                <li data-cat="رشد و توسعه کانال">رشد و توسعه کانال</li>
            </ul>
        </div>
    </div>
</div>