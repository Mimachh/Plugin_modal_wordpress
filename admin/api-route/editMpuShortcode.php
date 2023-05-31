<?php

function editMpuShortcode($data) {
    
    $shortcode_id = absint($data['id']);

    if ($shortcode_id > 0) {
        $shortcode = get_post($shortcode_id);
        if ($shortcode) {
            $mpu_post_title = sanitize_text_field($data['mpu_post_title']);


            return wp_update_post(array(
                'ID' => $shortcode_id,
                'post_title' => $mpu_post_title,
            ));
        } else {
            wp_send_json_error('Un problème est survenu !');
        }
    } else {
        wp_send_json_error('ID de shortcode invalide');
    }
}