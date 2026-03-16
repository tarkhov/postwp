<?php get_header(); ?>

<main role="main" class="container-xxl error404-container">
    <article role="article">
        <h1 class="error404-title">404</h1>
        <p class="error404-text"><?php _e('The page you are looking for might have been removed had its name changed or is temporarily', 'fast-html'); ?><br> <?php _e('unavailable', 'fast-html'); ?>. <a href="<?php echo esc_url(home_url('/')); ?>" class="icon-link"><?php _e('Return to homepage', 'fast-html'); ?></a></p>
    </article>
</main>

<?php get_footer(); ?>