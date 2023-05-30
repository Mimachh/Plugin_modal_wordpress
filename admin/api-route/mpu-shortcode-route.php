<?php 

add_action('rest_api_init', 'mpu_shortcode_create_route');


function mpu_shortcode_create_route() {
    register_rest_route('mpu-shortcodes/v1', 'manageShortcodes', array(
        'methods' => 'POST',
        'callback' => 'createMpuShortcode'
    ));

    register_rest_route('mpu-shortcodes/v1', 'manageShortcodes', array(
        'methods' => 'PUT',
        'callback' => 'editMpuShortcode'
    ));
}
function createMpuShortcode($data) {
  
        $mpu_post_title = sanitize_text_field($data['mpu_post_title']);
        $mpu_activate = sanitize_text_field($data['mpu_activate']);
        $mpu_is_all_pages = sanitize_text_field($data['mpu_is_all_pages']);
        $mpu_is_except = array_map('sanitize_text_field', $data['mpu_is_except']);
        $mpu_is_include = array_map('sanitize_text_field', $data['mpu_is_include']);
        $mpu_is_all_articles = sanitize_text_field($data['mpu_is_all_articles']);


        // Visuel
        $mpu_add_site_logo = sanitize_text_field($data['mpu_add_site_logo']);
        // Pas encore bon
        $mpu_custom_logo = sanitize_text_field($data['mpu_custom_logo']);
        //

        $mpu_is_title_visible = sanitize_text_field($data['mpu_is_title_visible']);
        $mpu_header_title = sanitize_text_field($data['mpu_header_title']);
        $mpu_is_body_content_visible = sanitize_text_field($data['mpu_is_body_content_visible']);
        $mpu_body_content = sanitize_text_field($data['mpu_body_content']);
        $mpu_is_description_visible = sanitize_text_field($data['mpu_is_description_visible']);
        $mpu_description = sanitize_text_field($data['mpu_description']);
        $mpu_overlay = sanitize_text_field($data['mpu_overlay']);
        $mpu_overlay_opacity_value = sanitize_text_field($data['mpu_overlay_opacity_value']);
        $mpu_overlay_color = sanitize_text_field($data['mpu_overlay_color']);
        $mpu_overlay_blur_value = sanitize_text_field($data['mpu_overlay_blur_value']);
        $mpu_is_author_visible = sanitize_text_field($data['mpu_is_author_visible']);
        $mpu_template_choice = sanitize_text_field($data['mpu_template_choice']);




            // Vérifier si un fichier a été téléchargé
            // if (!empty($_FILES['mpu_file']['name'])) {
            //     $file = $_FILES['mpu_file'];
            //     $file_name = $file['name'];
            //     $file_tmp = $file['tmp_name'];

                // Déplacer le fichier temporaire vers l'emplacement souhaité
                // $upload_dir = wp_upload_dir();  // Récupérer le répertoire d'upload de WordPress
                // $target_dir = $upload_dir['path'];  // Utiliser le répertoire de base pour l'upload
                // $target_file = $target_dir . '/' . $file_name;
                // move_uploaded_file($file_tmp, $target_file);

                // Vous pouvez enregistrer le chemin du fichier dans votre base de données
                // en utilisant update_post_meta() ou toute autre méthode appropriée

                // Assurez-vous de valider et de sécuriser le fichier téléchargé selon vos besoins
            // }


        $existing_post_id = post_exists($mpu_post_title);

        if (!$existing_post_id) {
            return wp_insert_post(array(
                'post_type' => 'mpu_shortcode',
                'post_status' => 'publish',
                'post_title' => $mpu_post_title,
                'meta_input' => array(
                   'mpu_activate' => $mpu_activate,
                   'mpu_is_all_pages' => $mpu_is_all_pages,
                   'mpu_is_except' => $mpu_is_except,
                   'mpu_is_include' => $mpu_is_include,
                   'mpu_is_all_articles' => $mpu_is_all_articles,

                   // Visuel
                   'mpu_add_site_logo' => $mpu_add_site_logo,
                   'mpu_is_title_visible' => $mpu_is_title_visible,
                   'mpu_header_title' => $mpu_header_title,
                   'mpu_is_body_content_visible' => $mpu_is_body_content_visible,
                   'mpu_body_content' => $mpu_body_content,
                   'mpu_is_description_visible' => $mpu_is_description_visible,
                   'mpu_description' => $mpu_description,
                   'mpu_overlay' => $mpu_overlay,
                   'mpu_overlay_opacity_value' => $mpu_overlay_opacity_value,
                   'mpu_overlay_color' => $mpu_overlay_color,
                   'mpu_overlay_blur_value' => $mpu_overlay_blur_value,
                   'mpu_is_author_visible' => $mpu_is_author_visible,
                   'mpu_template_choice' => $mpu_template_choice

                ),
            ));
        } else {
            wp_send_json_error('Existe déjà');
           
        }
 
}
    
function editMpuShortcode() {
    // créer la logique de la fonction
}