<?php
/**
 * Template for displaying 404 pages (Not Found)
 */

get_header(); 
?>

<div class="erroe-404-page">
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
            <span class="current-page">404</span>
        <?php endif; ?>
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