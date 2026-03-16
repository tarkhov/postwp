<?php get_header(); ?>

<main id="main" role="main">
    <article role="article">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                get_template_part('parts/home/hero');
                get_template_part('parts/home/parse-form');
                the_content();
            }
            wp_reset_postdata();
        }
        ?>

        <?php $blog = new WP_Query(['posts_per_page' => 3]); ?>
        <?php if ($blog->have_posts()) : ?>
            <div class="container-xxl py-5">
                <div class="pt-5">
                    <?php echo fast_features_header(
                        __('Recent Blog', 'fast-html'),
                        __('Discover proven strategies from industry experts to optimize code and advanced techniques to achieve blazing-fast load times', 'fast-html')
                    ); ?>
                </div>
                <div class="row gx-xxl-5">
                    <?php while ($blog->have_posts()) : $blog->the_post(); ?>
                        <div class="col-12 col-md-6 col-xl-4 text-center mb-5">
                            <?php get_template_part('parts/post/content'); ?>
                        </div>
                    <?php endwhile; wp_reset_query(); ?>
                </div>
            </div>
        <?php endif; ?>
    </article>
</main>

<?php get_footer(); ?>