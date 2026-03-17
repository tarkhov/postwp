<article <?php post_class('col-12 col-lg-10 col-xl-9 col-xxl-8'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
    <header>
        <?php $time = get_the_time('Y-m-d'); ?>
        <div class="mb-3 d-flex justify-content-center text-uppercase fw-medium post-meta">
            <time pubdate datetime="<?php echo $time; ?>" class="text-body opacity-50 me-2">
                <span itemprop="datePublished" content="<?php echo $time; ?>">
                    <?php the_time(get_option('date_format')); ?>
                </span>
            </time>
            <?php $categories = get_the_category(); if (!empty($categories)) : ?>
                <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>" class="text-body text-opacity-50 text-decoration-none">
                    <?php echo $categories[0]->name; ?>
                </a>
            <?php endif; ?>
        </div>

        <h1 class="h4 fw-normal mb-3 text-black text-center" itemprop="headline">
            <?php the_title(); ?>
        </h1>

        <?php if (has_excerpt()) : ?>
            <p itemprop="description" class="post-excerpt text-light-contrast fs-7 text-center mb-5">
                <?php echo get_the_excerpt(); ?>
            </p>
        <?php endif; ?>
    </header>

    <div itemprop="articleBody" class="article-content">
        <?php the_content(); ?>
    </div>

    <?php $tags = get_the_tags(); if (!empty($tags)) : ?>
        <div class="pt-1">
            <?php foreach ($tags as $tag) : ?>
                <a class="btn btn-sm btn-tag me-1 mb-2 text-uppercase" href="<?php echo get_tag_link($tag->term_id); ?>" rel="tag">
                    <span itemprop="keywords"><?php echo esc_attr($tag->name); ?></span>
                </a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php //if (comments_open()) : ?>
        <?php //comments_template(); ?>
    <?php //endif; ?>
</article>