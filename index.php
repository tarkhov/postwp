<?php get_header(); ?>

<main id="main" role="main" itemscope itemtype="http://schema.org/Blog" class="pt-5">
    <article role="article" class="container-xxl py-3">
        <?php
        if (!get_query_var('paged')) :
            $title = null;
            $description = null;
            if (is_archive()) {
                $title = get_the_archive_title();
                $description = get_the_archive_description();
            } elseif (is_home()) {
                $posts_page = get_posts_page();
                if ($posts_page) {
                    $title = $posts_page->post_title;
                    $description = "<p>{$posts_page->post_excerpt}</p>";
                }
            } ?>
            <h1 class="h2-sm fw-normal mb-4 text-center" style="letter-spacing: 1px;"><?php echo $title; ?></h1>
            <?php if ($description) : ?>
                <div class="row justify-content-lg-center text-center mb-5 pb-3">
                    <div class="col-12 col-lg-9 col-xl-8 col-xxl-7 text-secondary" style="line-height: 1.8;">
                        <?php echo $description; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <?php if (have_posts()) : ?>
            <div class="row gx-xxl-5">
                <?php while (have_posts()) : the_post(); ?>
                    <div <?php post_class('col-12 col-md-6 col-xl-4 text-center mb-5'); ?> itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting">
                        <?php get_template_part('parts/post/content'); ?>
                        <a class="d-flex align-items-center justify-content-center text-decoration-none text-primary text-uppercase fw-medium post-more" href="<?php the_permalink(); ?>" rel="bookmark">
                            <span><?php _e('Continue', 'fast-html'); ?></span>&nbsp;
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                            </svg>
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </article>
</main>

<?php if (have_posts() && $wp_query->max_num_pages > 1) : ?>
    <div class="container-xxl">
        <div class="d-flex justify-content-center mb-5">
            <?php
            $pagination = str_replace(
                [
                    "<ul class='page-numbers'>",
                    '<li>'
                ],
                [
                    '<ul class="pagination mb-5">',
                    '<li class="page-item">'
                ],
                get_the_posts_pagination([
                    'prev_text' => '&larr;',
                    'next_text' => '&rarr;',
                    'type'      => 'list',
                ])
            );
            $pagination = str_replace(
                ['page-numbers', 'current'],
                ['page-link', 'active'],
                $pagination
            );
            echo $pagination;
            ?>
        </div>
    </div>
<?php endif; ?>

<?php get_footer(); ?>