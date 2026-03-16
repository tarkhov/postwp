<?php get_header(); ?>

<main id="main" role="main" itemscope itemtype="http://schema.org/Blog" class="container-xxl py-5">
    <div class="row justify-content-lg-center py-5">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                get_template_part('parts/post/content', 'single');
            }
        }
        ?>
    </div>
</main>

<?php get_footer(); ?>