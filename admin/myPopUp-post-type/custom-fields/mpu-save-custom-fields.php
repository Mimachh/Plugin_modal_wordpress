<?php

function save_custom_field_values($post_id) {
    // Enregistrez les valeurs pour 'mpu_activate' et 'mpu_is_all_pages'
    $fields = array('mpu_activate', 'mpu_is_all_pages', 'mpu_is_all_articles','mpu_add_site_logo', 'mpu_add_user_default_logo');
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
}
add_action('save_post_mpu_shortcode', 'save_custom_field_values');