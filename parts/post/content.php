<?php $permalink = esc_url(get_the_permalink()); $title = get_the_title(); ?>
<?php if (has_post_thumbnail()) : ?>
    <a href="<?php echo $permalink; ?>" class="mb-4 d-block">
        <?php the_post_thumbnail('full', [
            'class'    => 'img-fluid',
            'alt'      => $title,
            'itemprop' => 'image'
        ]); ?>
    </a>
<?php endif; ?>

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

<a class="d-block text-decoration-none text-black mb-3 post-title" href="<?php echo $permalink; ?>" rel="bookmark">
    <span itemprop="headline"><?php echo $title; ?></span>
</a>

<?php if (has_excerpt()) : ?>
    <p itemprop="description" class="text-light-contrast">
        <?php echo get_the_excerpt(); ?>
    </p>
<?php endif; ?>