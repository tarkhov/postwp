<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <main id="main" role="main" <?php post_class('container-xxl py-5'); ?>>
        <article role="article" class="row justify-content-lg-center pt-3">
            <div class="col-12 col-lg-9 col-xl-8 col-xxl-7">
                <h1 class="h2-sm fw-normal text-center mb-4"><?php the_title(); ?></h1>
                <?php if (has_excerpt()) : ?>
                    <p class="text-light-contrast text-center mb-5"><?php echo get_the_excerpt(); ?></p>
                <?php endif; ?>
                <div class="article-content">
                    <?php the_content(); ?>
                </div>
            </div>
        </article>
    </main>
<?php endwhile; endif; ?>

<?php get_footer(); ?>