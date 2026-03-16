<?php
$is_active_acf = null;
function is_active_acf() {
    global $is_active_acf;
    if (null === $is_active_acf) {
        $is_active_acf = defined('ACF_VERSION');
    }
    return $is_active_acf;
}
