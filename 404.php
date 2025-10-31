<?php
/**
 * Template for displaying 404 pages (Not Found)
 */

get_header(); 
?>

<div class="erroe-404-page">
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
    <div class="error-content">
        <img src="<?php echo get_template_directory_uri() . '/assets/img/404/404.webp' ?>" />
        <div class="error-text">
            صفحه مورد نظر شما پیدا نشد.
        </div>
        <div class="return-buttons">
            <button class="previous-page-button" onclick="goBack()">
                صفحه قبل
            </button>
            <button class="homepage-button">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    صفحه اصلی
                </a>
            </button>
        </div>
    </div>
</div>
<script>
    function goBack() {
        // Returning to the page which user came from
        if (document.referrer) {
            window.history.back();
        } else {
            // If the referrer did not exist (e.g. went straight to 404)
            window.location.href = "<?php echo esc_url(home_url('/')); ?>";
        }
    }
</script>

<?php get_footer(); ?>