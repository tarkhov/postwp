<?php
$is_active_aioseo = null;
function is_active_aioseo() {
    global $is_active_aioseo;
    if (null === $is_active_aioseo) {
        $is_active_aioseo = defined('AIOSEO_VERSION');
    }
    return $is_active_aioseo;
}