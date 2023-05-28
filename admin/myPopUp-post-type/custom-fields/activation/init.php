<?php

require_once __DIR__ . '/custom-fields-form.php';

function mpu_register_custom_field_activation() {
    register_meta('mpu_shortcode', 'mpu_activate', array(
        'type' => 'text',
        'single' => true,
        'show_in_rest' => true,
    ));

    register_meta('mpu_shortcode', 'mpu_is_all_pages', array(
        'type' => 'boolean',
        'single' => true,
        'show_in_rest' => true,
    ));

    register_meta('mpu_shortcode', 'mpu_is_all_articles', array(
        'type' => 'boolean',
        'single' => true,
        'show_in_rest' => true,
    ));

    register_meta('mpu_shortcode', 'mpu_is_except', array(
        'type' => 'array',
        'single' => false,
        'show_in_rest' => true,
    ));

    register_meta('mpu_shortcode', 'mpu_is_include', array(
        'type' => 'array',
        'single' => false,
        'show_in_rest' => true,
    ));
}
add_action('init', 'mpu_register_custom_field_activation');


function mpu_add_custom_field_activation_meta_box() {

    // Boîte méta pour 'mpu_activate'
    add_meta_box(
        'mpu-activate-meta-box',
        'Activation',
        'render_mpu_activate_meta_box',
        'mpu_shortcode',
        'normal',
        'default'
    );

    // Boîte méta pour 'mpu_is_all_pages'
    add_meta_box(
        'mpu-is-all-pages-meta-box',
        'Activation',
        'render_mpu_is_all_pages_meta_box',
        'mpu_shortcode',
        'normal',
        'default'
    );

    // Boîte méta pour 'mpu_is_all_articles'
    add_meta_box(
        'mpu-is-all-articles-meta-box',
        'Activation',
        'render_mpu_is_all_articles_meta_box',
        'mpu_shortcode',
        'normal',
        'default'
    );

    // Boîte méta pour 'mpu_is_except'
    add_meta_box(
        'mpu-is-except-meta-box',
        'Activation',
        'render_mpu_is_except_meta_box',
        'mpu_shortcode',
        'normal',
        'default'
    );

    // Boîte méta pour 'mpu_is_include'
    add_meta_box(
        'mpu-is-include-meta-box',
        'Activation',
        'render_mpu_is_include_meta_box',
        'mpu_shortcode',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'mpu_add_custom_field_activation_meta_box');