<?php

require_once __DIR__ . '/custom-fields-form.php';

function mpu_register_custom_field_visuel() {
    // LOGO
    register_meta('mpu_shortcode', 'mpu_add_site_logo', array(
        'type' => 'boolean',
        'single' => true,
        'show_in_rest' => true,
    ));
    register_meta('mpu_shortcode', 'mpu_add_user_default_logo', array(
        'type' => 'boolean',
        'single' => true,
        'show_in_rest' => true,
    ));
    register_meta('mpu_shortcode', 'mpu_add_user_custom_logo', array(
        'type' => 'file',
        'single' => true,
        'show_in_rest' => true,
    ));

}
add_action('init', 'mpu_register_custom_field_visuel');


function mpu_add_custom_field_visuel_meta_box() {

    // Boîte méta pour 'mpu_add_site_logo'
    add_meta_box(
        'mpu-add-site-logo-meta-box',
        'Visuel',
        'render_mpu_add_site_logo_meta_box',
        'mpu_shortcode',
        'normal',
        'default'
    );
    add_meta_box(
        'mpu-add-user-default-logo-meta-box',
        'Visuel',
        'render_mpu_add_user_default_logo_meta_box',
        'mpu_shortcode',
        'normal',
        'default'
    );
    add_meta_box(
        'mpu-add-user-custom-logo-meta-box',
        'Visuel',
        'render_mpu_add_user_custom_logo_meta_box',
        'mpu_shortcode',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'mpu_add_custom_field_visuel_meta_box');