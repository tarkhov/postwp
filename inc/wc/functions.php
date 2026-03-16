<?php
$is_active_wc = null;
function is_active_wc() {
    global $is_active_wc;
    if (null === $is_active_wc) {
        $is_active_wc = defined('WC_VERSION');
    }
    return $is_active_wc;
}