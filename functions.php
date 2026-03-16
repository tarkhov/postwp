<?php
if (!is_admin()) {
    require __DIR__ . '/vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
}

$template_directory = get_template_directory();
$template_directory_uri = get_template_directory_uri();

require $template_directory . '/inc/post.php';
require $template_directory . '/inc/icons.php';

function admin_init_action() {
    wp_deregister_script('autosave');
    wp_deregister_script('heartbeat');

    // AISEO
    remove_action('category_edit_form', [aioseo()->postSettings, 'addTaxonomyUpsell']);
    remove_action('after-category-table', [aioseo()->postSettings, 'addTaxonomyUpsell']);
}
add_action('admin_init', 'admin_init_action');

function deferJs($name) {
    global $template_directory, $template_directory_uri;
    $appJs = "/assets/js/$name.js";
    wp_enqueue_script(
        $name,
        $template_directory_uri . $appJs,
        ['vendors'],
        filemtime($template_directory . $appJs),
        ['in_footer' => true, 'strategy' => 'defer']
    );
}

function wp_enqueue_scripts_action() {
    global $template_directory, $template_directory_uri;

    if (!is_admin_bar_showing() && !is_customize_preview()) {
        wp_dequeue_style('dashicons');
        wp_dequeue_style('wp-block-library');
    }

    if (!is_404()) {
        $vendorsJs = '/assets/js/vendors.js';
        wp_enqueue_script('vendors', $template_directory_uri . $vendorsJs, [], filemtime($template_directory . $vendorsJs), ['in_footer' => true, 'strategy' => 'defer']);
    }
    
    if (is_front_page()) {
        deferJs('home');
    } elseif (is_archive() || is_home()) {
        deferJs('page');
    } elseif (is_single()) {
        deferJs('post');
    } elseif (is_page_template('page-templates/app.php')) {
        deferJs('app');
    } elseif (is_page()) {
        deferJs('page');
    }

    if (is_page_template('page-templates/contact.php')) {
        wpcf7_enqueue_styles();
        wpcf7_enqueue_scripts();
    }
}
add_action('wp_enqueue_scripts', 'wp_enqueue_scripts_action');

function preloadCss($name) {
    global $template_directory, $template_directory_uri;

    $styles = '';
    if ($_ENV['APP_ENV'] === 'production') {
        $styles .= '<style type="text/css">%s</style>' . "\n";
    }

    $style = '<link rel="preload" href="%s" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">' . "\n"
            .'<noscript><link rel="stylesheet" href="%s"></noscript>' . "\n";
    $styles .= $style;

    $is_404 = is_404();
    if (!$is_404) {
        $styles .= $style;
    }

    $args = [$styles];
    if ($_ENV['APP_ENV'] === 'production') {
        $args[] = file_get_contents("$template_directory/assets/css/critical/$name.css");
    }

    if (!$is_404) {
        $vendorUri = '/assets/css/modules.css';
        $vendorCss = $template_directory_uri . $vendorUri  . '?ver=' . filemtime($template_directory . $vendorUri);
        $args[] = $vendorCss;
        $args[] = $vendorCss;
    }

    $appUri = "/assets/css/$name.css";
    $appCss = $template_directory_uri . $appUri . '?ver=' . filemtime($template_directory . $appUri);
    $args[] = $appCss;
    $args[] = $appCss;

    printf(...$args);
}

function wp_head_action() {
    global $template_directory_uri;

    if (is_front_page()) {
        $uri = '/assets/img/header/';
        $images = [
            [
                'name' => 'mobile.webp',
                'max'  => '767.98px',
            ],
            [
                'name' => 'tablet.webp',
                'min'  => '768px',
                'max'  => '1199.98px',
            ],
            [
                'name' => 'desktop.webp',
                'min'  => '1200px',
                'max'  => '1919.98px',
            ],
            [
                'name' => '2k.webp',
                'min'  => '1920px',
            ],
        ];
        $link = '<link rel="preload" href="%s" as="image" type="image/webp" media="%s" fetchpriority="high"/>' . "\n";
        foreach ($images as $image) {
            $media = '';
            if (isset($image['min'])) {
                $media .= "(min-width: {$image['min']})";
            }

            if (isset($image['min'], $image['max'])) {
                $media .= ' and ';
            }

            if (isset($image['max'])) {
                $media .= "(max-width: {$image['max']})";
            }

            printf($link, $template_directory_uri . $uri . $image['name'], $media);
        }
        preloadCss('home');
    } elseif (is_archive() || is_home()) {
        preloadCss('blog');
    } elseif (is_single()) {
        preloadCss('post');
    } elseif (is_page_template('page-templates/app.php')) {
        preloadCss('app');
    } elseif (is_page()) {
        preloadCss('page');
    } elseif (is_404()) {
        preloadCss('404');
    }
}
add_action('wp_head', 'wp_head_action');

function after_setup_theme_action() {
    add_theme_support('post-thumbnails');
    register_nav_menus([
        'top'    => __('Top', 'fasthtml'),
        'bottom' => __('Bottom', 'fasthtml'),
    ]);
}
add_action('after_setup_theme', 'after_setup_theme_action');

function init_action() {
    add_post_type_support('page', 'excerpt');
    remove_action('wp_head', 'wp_generator');

    // Contact Form 7
    add_filter('wpcf7_autop_or_not', '__return_false');
    add_filter('wpcf7_load_js', '__return_false');
    add_filter('wpcf7_load_css', '__return_false');

    // W3 Totacl Cache
    add_filter('w3tc_can_print_comment', '__return_false', 10, 1);
}
add_action('init', 'init_action');

function wp_nav_menu_filter($nav_menu, $args) {
    $class = 'dropdown-menu';
    if ($args->theme_location === 'bottom') {
        $class .= ' dropdown-menu-end';
    }
    return str_replace('sub-menu', $class, $nav_menu);
}
add_filter('wp_nav_menu', 'wp_nav_menu_filter', 10, 2);

function nav_menu_css_class_filter($classes, $item, $args, $depth) {
    $has_children = in_array('menu-item-has-children', $classes);
    if ($has_children === true) {
        $classes[] = 'dropdown-hover';
    }

    if ($depth === 0) {
        $classes[] = 'nav-item';

        if ($has_children === true) {
            $classes[] = ($args->theme_location == 'bottom') ? 'dropup' :'dropdown';
        }

        if ($item->current === true) {
            $classes[] = 'active';
        }
    }

    return $classes;
}
add_filter('nav_menu_css_class', 'nav_menu_css_class_filter', 10, 4);

function nav_menu_link_attributes_filter($atts, $item, $args, $depth) {
    if ($depth === 0) {
        $atts['class'] = 'nav-link';
    } elseif ($item->title) {
        $atts['class'] = 'dropdown-item';
    }

    $has_children = in_array('menu-item-has-children', $item->classes);
    if ($has_children === true) {
        $atts['class'] .= ' dropdown-toggle';
        $atts['data-bs-hover'] = $atts['data-bs-toggle'] = 'dropdown';
    }

    if ($item->current === true) {
        $atts['class'] .= ' active';
    }

    return $atts;
}
add_filter('nav_menu_link_attributes', 'nav_menu_link_attributes_filter', 10, 4);

function navigation_markup_template_filter($template, $class) {
    $template = '<nav role="navigation" aria-label="%4$s">%3$s</nav>';
    return $template;
}
add_filter('navigation_markup_template', 'navigation_markup_template_filter', 10, 2);

function get_the_archive_title_prefix_filter($prefix) {
    return (is_category() || is_tag()) ? '' : $prefix;
}
add_filter('get_the_archive_title_prefix', 'get_the_archive_title_prefix_filter');

function fast_features_shortcode($atts, $content) {
    $background = '';
    if (isset($atts['background'])) {
        $background = " bg-{$atts['background']}";
    }

    $content = do_shortcode($content);
    return <<<HTML
        <div class="py-5{$background}">
            <div class="container-xxl py-5">$content</div>            
        </div>
    HTML;
}
add_shortcode('fast_features', 'fast_features_shortcode');

function fast_features_header(string $title, string $description): string {
    return <<<HTML
        <div class="row justify-content-lg-center text-center mb-5 pb-3">
            <div class="col-12 col-lg-9 col-xl-8 col-xxl-7">
                <h2 class="h1 h2-sm fw-normal mb-4">$title</h2>
                <p class="text-light-contrast">$description</p>
            </div>
        </div>
    HTML;
}

function fast_features_header_shortcode($atts, $content) {
    return fast_features_header($atts['title'], $content);
}
add_shortcode('fast_features_header', 'fast_features_header_shortcode');

function fast_features_content_shortcode($atts, $content) {
    return '<div class="row">' . do_shortcode($content) . '</div>';
}
add_shortcode('fast_features_content', 'fast_features_content_shortcode');

function fast_feature1_shortcode($atts, $content) {
    $icon = fast_icon($atts['icon'], [44, 44]);
    return <<<HTML
        <div class="col-12 col-xl-4 mb-4 d-xl-flex">
            <div class="bg-white rounded-1 p-4 shadow-square w-100">
                <div class="text-primary mb-4">$icon</div>
                <h3 class="mb-3 h5">{$atts['title']}</h3>
                <p class="text-secondary mb-0">$content</p>
            </div>
        </div>
    HTML;
}
add_shortcode('fast_feature1', 'fast_feature1_shortcode');

function fast_feature2_shortcode($atts, $content) {
    $icon = fast_icon($atts['icon'], [44, 44]);
    return <<<HTML
        <div class="col-12 col-md-6 col-lg-4 text-center py-5">
            <div class="text-primary mb-3">$icon</div>
            <h3 class="h5">{$atts['title']}</h3>
            <p class="text-secondary">$content</p>
        </div>
    HTML;
}
add_shortcode('fast_feature2', 'fast_feature2_shortcode');

function formatBytes($bytes, $decimals = 0) {
    $sizes = ['B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB', 'RB', 'QB'];
    
    $kb = 1024;
    if ($bytes < $kb) {
        return [$bytes, $sizes[0]];
    }

    $i = floor(log($bytes) / log($kb));
    return [round($bytes / pow($kb, $i), $decimals), $sizes[$i]];
}

add_filter('intermediate_image_sizes', '__return_empty_array', 10, 1);