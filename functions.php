<?php
if (!is_admin()) {
    require __DIR__ . '/vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
}

define('POSTWP_DIRECTORY', get_template_directory());
define('POSTWP_DIRECTORY_URI', get_template_directory_uri());

require POSTWP_DIRECTORY . '/inc/acf/functions.php';
require POSTWP_DIRECTORY . '/inc/aioseo/functions.php';
require POSTWP_DIRECTORY . '/inc/cf7/functions.php';
require POSTWP_DIRECTORY . '/inc/w3tc/functions.php';
require POSTWP_DIRECTORY . '/inc/wc/functions.php';
require POSTWP_DIRECTORY . '/inc/post.php';
require POSTWP_DIRECTORY . '/inc/shortcodes.php';
require POSTWP_DIRECTORY . '/inc/icons.php';

function admin_init_action() {
    wp_deregister_script('autosave');
    wp_deregister_script('heartbeat');

    // AISEO
    if (is_active_aioseo()) {
        remove_action('category_edit_form', [aioseo()->postSettings, 'addTaxonomyUpsell']);
        remove_action('after-category-table', [aioseo()->postSettings, 'addTaxonomyUpsell']);
    }
}
add_action('admin_init', 'admin_init_action');

function init_action() {
    add_post_type_support('page', 'excerpt');
    remove_action('wp_head', 'wp_generator');

    // Contact Form 7
    if (is_active_cf7()) {
        add_filter('wpcf7_autop_or_not', '__return_false');
        add_filter('wpcf7_load_js', '__return_false');
        add_filter('wpcf7_load_css', '__return_false');
    }

    // W3 Totacl Cache
    if (is_active_w3tc()) {
        add_filter('w3tc_can_print_comment', '__return_false', 10, 1);
    }
}
add_action('init', 'init_action');

function after_setup_theme_action() {
    add_theme_support('post-thumbnails');

    if (is_active_wc()) {
        add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
    }

    register_nav_menus([
        'top'    => __('Top', 'postwp'),
        'bottom' => __('Bottom', 'postwp')
    ]);
}
add_action('after_setup_theme', 'after_setup_theme_action');

function deferJs($name, $deps = []) {
    $script_path = $_ENV['JS_PATH'] . "$name.js";
    wp_enqueue_script(
        $name,
        POSTWP_DIRECTORY_URI . $script_path,
        $deps,
        filemtime(POSTWP_DIRECTORY . $script_path),
        ['in_footer' => true, 'strategy' => 'defer']
    );
}

function wp_enqueue_scripts_action() {
    if (!is_admin_bar_showing() && !is_customize_preview()) {
        wp_dequeue_style('dashicons');
        wp_dequeue_style('wp-block-library');
    }

    $is_active_wc = is_active_wc();
    if (is_front_page()) {
        deferJs('home');
    } elseif ($is_active_wc && (is_shop() || is_product_taxonomy())) {
        deferJs('shop');
    } elseif ($is_active_wc && is_product()) {
        deferJs('product');
    } elseif (is_archive() || is_home()) {
        deferJs('blog');
    } elseif (is_single()) {
        deferJs('post');
    } elseif (is_page_template('page-templates/contacts.php')) {
        wpcf7_enqueue_styles();
        wpcf7_enqueue_scripts();
        deferJs('contacts');

        global $post;
        if ($post) {
            $point = get_field('point', $post->ID);
            if (!empty($point)) {
                wp_localize_script('contacts', 'point', $point);
            }
        }
    } elseif (is_page()) {
        deferJs('page');
    }
}
add_action('wp_enqueue_scripts', 'wp_enqueue_scripts_action');

function preloadCss($name) {
    $styles = '';
    if ($_ENV['NODE_ENV'] === 'production') {
        $styles .= '<style type="text/css">%s</style>' . "\n";
    }
    $link = '<link rel="preload" href="%s" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">' . "\n"
          . '<noscript><link rel="stylesheet" href="%s"></noscript>' . "\n";
    $styles .= $link;
    $args = [$styles];

    if ($_ENV['NODE_ENV'] === 'production') {
        $args[] = file_get_contents(POSTWP_DIRECTORY . $_ENV['CSS_PATH'] . "critical/$name.css"); // crititcal style url
    }

    $link_path = $_ENV['CSS_PATH'] . "$name.css";
    $link_url = POSTWP_DIRECTORY_URI . $link_path . '?ver=' . filemtime(POSTWP_DIRECTORY . $link_path);
    $args[] = $link_url; // link url
    $args[] = $link_url; // noscript url

    printf(...$args);
}

function wp_head_action() {
    $is_active_wc = is_active_wc();
    if (is_front_page()) {
        preloadCss('home');
    } elseif ($is_active_wc && (is_shop() || is_product_taxonomy())) {
        preloadCss('shop');
    } elseif ($is_active_wc && is_product()) {
        preloadCss('product');
    } elseif (is_archive() || is_home()) {
        preloadCss('blog');
    } elseif (is_single()) {
        preloadCss('post');
    } elseif (is_page_template('page-templates/contacts.php')) {
        preloadCss('contacts');
    } elseif (is_page()) {
        preloadCss('page');
    } elseif (is_404()) {
        preloadCss('404');
    }
}
add_action('wp_head', 'wp_head_action');

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

add_filter('intermediate_image_sizes', '__return_empty_array', 10, 1);

function array_insert_after(array $array, string $key, array $element) {
    if (!array_key_exists($key, $array)) {
        return $array;
    }
    $keys = array_keys($array);
    $start = (int) array_search($key, $keys, true) + 1; // Offset
    $splicedArray = array_splice($array, $start);
    $elementKey = key($element);
    $array[$elementKey] = $element[$elementKey];
    $result = array_merge($array, $splicedArray);
    return $result;
}

function manage_post_posts_columns_filter($columns) {
    $columns = array_insert_after($columns, 'cb', ['id' => __('ID')]);
    return $columns;
}
add_filter('manage_post_posts_columns', 'manage_post_posts_columns_filter');

function manage_posts_custom_column_action($column, $post_id) {
    if ($column === 'id') {
        echo $post_id;
    }
}
add_action('manage_posts_custom_column' , 'manage_posts_custom_column_action', 10, 2);

if (is_active_acf() && isset($_ENV['GOOGLE_MAPS_KEY'])) {
    function acf_google_map_api_filter($api){
        $api['key'] = $_ENV['GOOGLE_MAPS_KEY'];
        return $api;
    }
    add_filter('acf/fields/google_map/api', 'acf_google_map_api_filter');
}