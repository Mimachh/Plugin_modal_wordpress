<?php

function save_custom_field_values($post_id) {
    // Enregistrez les valeurs pour 'mpu_activate' et 'mpu_is_all_pages'
    $fields = array('mpu_activate', 'mpu_is_all_pages', 'mpu_is_all_articles','mpu_add_site_logo', 
    'mpu_add_user_default_logo', 'mpu_header_title', 'mpu_body_content', 'mpu_description',
    'mpu_overlay', 'mpu_overlay_color', 'mpu_overlay_blur_value', 'mpu_template_choice',
    'mpu_text_style', 'mpu_text_color', 'mpu_font_family', 'mpu_font_size', 'mpu_title_style',
    'mpu_title_weight', 'mpu_title_size', 'mpu_title_letter_spacing', 'mpu_title_align',
    'mpu_content_align', 'mpu_button_align', 'mpu_desktop_min_width', 'mpu_desktop_max_width',
    'mpu_desktop_min_height', 'mpu_desktop_max_height', 'mpu_mobile_max_width', 'mpu_mobile_max_height',
    'mpu_mobile_min_height', 'mpu_mobile_min_width', 'mpu_title_shadow_size', 'mpu_title_shadow_type',
    'mpu_inner_background', 'mpu_inner_background_color', 'mpu_inner_background_image_style',
    'mpu_border_style', 'mpu_border_weight', 'mpu_border_color', 'mpu_animation_opening'
    );
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            $value = sanitize_text_field($_POST[$field]);
            update_post_meta($post_id, $field, $value);
        } 
        else {
            delete_post_meta($post_id, $field);
        }
    }
    // Enregistrez les valeurs pour 'mpu_is_except' et 'mpu_is_include'
    $checkbox_fields = array('mpu_is_except', 'mpu_is_include');
    foreach ($checkbox_fields as $field) {
        if (isset($_POST[$field]) && is_array($_POST[$field])) {
            $values = array_map('sanitize_text_field', $_POST[$field]);
            update_post_meta($post_id, $field, $values);
        } 
        else {
            delete_post_meta($post_id, $field);
        }
    }

    // Gérez les fichiers téléchargés
    $file_fields = array('mpu_add_user_custom_logo');
    
        foreach ($file_fields as $field) {
            if (isset($_FILES[$field])) {
                $file = $_FILES[$field];
                
                // Vérifiez s'il y a des erreurs de téléchargement
                if ($file['error'] === UPLOAD_ERR_OK) {
                    $file_name = sanitize_file_name($file['name']);
                    
                    // Utilisez wp_handle_upload() pour traiter le téléchargement
                    $uploaded_file = wp_handle_upload($file, array('test_form' => false));
                    
                    if ($uploaded_file && !isset($uploaded_file['error'])) {
                        $upload_url = $uploaded_file['url'];
                        
                        // Enregistrez l'URL du fichier dans les métadonnées
                        update_post_meta($post_id, $field, $upload_url);
                    }
                }
            }
        }

    // Pour les number 
    $number_fields = array('mpu_overlay_opacity_value');
    foreach($number_fields as $number_field) {
        if (isset($_POST[$number_field])) {
            $value = sanitize_mpu_number($_POST[$number_field]);
            update_post_meta($post_id, $number_field, $value);
        }       
        else {
            delete_post_meta($post_id, $number_field);
        }
    }

    // Pour les switch
    $switch_fields = array('mpu_is_author_visible', 'mpu_is_title_visible', 'mpu_is_description_visible', 
    'mpu_is_desktop_full_screen', 'mpu_is_mobile_full_screen', 'mpu_is_title_shadow'
    );
    foreach($switch_fields as $switch_field) {
        if (isset($_POST[$switch_field])) {
            $value = ($_POST[$switch_field] === 'on') ? true : false;
            update_post_meta($post_id, $switch_field, $value);
        }       
        else {
            delete_post_meta($post_id, $switch_field);
        }
    }

    // Pour les couleurs
    $color_fields = array('mpu_title_shadow_color');
    foreach ($color_fields as $color_field) {
        if (isset($_POST[$color_field])) {
            $value = sanitize_hex_color($_POST[$color_field]);
            update_post_meta($post_id, $color_field, $value);
        } else {
            delete_post_meta($post_id, $color_field);
        }
    }

    // Images
    if (!empty($_FILES['mpu_inner_background_image']['tmp_name'])) {
        $file = $_FILES['mpu_inner_background_image'];
        $upload_overrides = array('test_form' => false);
        $uploaded_file = wp_handle_upload($file, $upload_overrides);
    
        if ($uploaded_file && !isset($uploaded_file['error'])) {
            $file_url = $uploaded_file['url'];
            update_post_meta($post_id, 'mpu_inner_background_image', $file_url);
        } else {
            // Gérer l'erreur de téléchargement du fichier
        }
    } else {
        // Aucun fichier n'a été téléchargé
        delete_post_meta($post_id, 'mpu_inner_background_image');
    }

}
add_action('save_post_mpu_shortcode', 'save_custom_field_values');