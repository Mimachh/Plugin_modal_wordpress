<?php 

require_once __DIR__ . '/editMpuShortcode.php';
require_once __DIR__ . '/createMpuShortcode.php';

add_action('rest_api_init', 'mpu_shortcode_create_route');


function mpu_shortcode_create_route() {
    register_rest_route('mpu-shortcodes/v1', 'manageShortcodes', array(
        'methods' => 'POST',
        'callback' => 'createMpuShortcode'
    ));

    register_rest_route('mpu-shortcodes/v1', 'manageShortcodes/(?P<id>\d+)', array(
        'methods' => 'PUT',
        'callback' => 'editMpuShortcode'
    ));
}

