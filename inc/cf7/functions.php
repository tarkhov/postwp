<?php
$is_active_cf7 = null;
function is_active_cf7() {
    global $is_active_cf7;
    if (null === $is_active_cf7) {
        $is_active_cf7 = defined('WPCF7_VERSION');
    }
    return $is_active_cf7;
}