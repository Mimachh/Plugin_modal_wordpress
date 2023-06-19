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
            
            // Visuel
                // Logo
            $mpu_add_site_logo = isset($data['mpu_add_site_logo']) && $data['mpu_add_site_logo'] === 'on' ? true : false;
            $mpu_add_site_logo = sanitize_text_field($data['mpu_add_site_logo']);

            
            $mpu_base_site_logo = isset($data['mpu_base_site_logo']) && $data['mpu_base_site_logo'] === 'on' ? true : false;
            $mpu_base_site_logo = sanitize_text_field($data['mpu_base_site_logo']);
            
            $mpu_custom_logo = sanitize_text_field($data['mpu_custom_logo']);

                // Titre
            $mpu_is_title_visible = isset($data['mpu_is_title_visible']) && $data['mpu_is_title_visible'] === 'on' ? true : false;
            $mpu_is_title_visible = sanitize_text_field($data['mpu_is_title_visible']);
            $mpu_header_title = sanitize_text_field($data['mpu_header_title']);


            return wp_update_post(array(
                'ID' => $shortcode_id,
                'post_title' => $mpu_post_title,
                'meta_input' => array(
                    'mpu_activate' => $mpu_activate,
                    'mpu_is_all_pages' => $mpu_is_all_pages,
                    'mpu_is_except' => $mpu_is_except,
                    'mpu_is_all_articles' => $mpu_is_all_articles,

                    // Visuel
                   'mpu_add_site_logo' => $mpu_add_site_logo,
                   'mpu_base_site_logo' => $mpu_base_site_logo,
                   'mpu_custom_logo' => $mpu_custom_logo,
                   'mpu_is_title_visible' => $mpu_is_title_visible,
                   'mpu_header_title' => $mpu_header_title,
                ),
            ));
        } else {
            wp_send_json_error('Un problème est survenu !');
        }
    } else {
        wp_send_json_error('ID de shortcode invalide');
    }
}