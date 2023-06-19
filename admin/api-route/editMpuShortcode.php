<?php

function editMpuShortcode($data) {
    
    $shortcode_id = absint($data['id']);

    if ($shortcode_id > 0) {
        $shortcode = get_post($shortcode_id);
        if ($shortcode) {

            // Activation
            $mpu_post_title = sanitize_text_field($data['mpu_post_title']);
            $mpu_activate = sanitize_text_field($data['mpu_activate']);
            $mpu_is_all_pages = sanitize_text_field($data['mpu_is_all_pages']);
            $mpu_is_except = array_map('sanitize_text_field', $data['mpu_is_except']);
            $mpu_is_all_articles = sanitize_text_field($data['mpu_is_all_articles']);


            return wp_update_post(array(
                'ID' => $shortcode_id,
                'post_title' => $mpu_post_title,
                'meta_input' => array(
                    'mpu_activate' => $mpu_activate,
                    'mpu_is_all_pages' => $mpu_is_all_pages,
                    'mpu_is_except' => $mpu_is_except,
                    'mpu_is_all_articles' => $mpu_is_all_articles,
                ),
            ));
        } else {
            wp_send_json_error('Un problème est survenu !');
        }
    } else {
        wp_send_json_error('ID de shortcode invalide');
    }
}