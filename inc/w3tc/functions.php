<?php
$is_active_w3tc = null;
function is_active_w3tc() {
    global $is_active_w3tc;
    if (null === $is_active_w3tc) {
        $is_active_w3tc = defined('W3TC_VERSION');
    }
    return $is_active_w3tc;
}