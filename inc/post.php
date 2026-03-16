<?php
function get_posts_page() {
    if (get_option('show_on_front') !== 'page') {
        return null;
    }

    $page_id = get_option('page_for_posts');
    if (!$page_id) {
        return null;
    }
 
    return get_post($page_id);
}