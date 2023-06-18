<?php


function createMpuShortcode($data) {
  
        $mpu_post_title = sanitize_text_field($data['mpu_post_title']);
        $mpu_activate = sanitize_text_field($data['mpu_activate']);
        $mpu_is_all_pages = sanitize_text_field($data['mpu_is_all_pages']);
        $mpu_is_except = array_map('sanitize_text_field', $data['mpu_is_except']);
        $mpu_is_all_articles = sanitize_text_field($data['mpu_is_all_articles']);


        // Visuel
        $mpu_add_site_logo = isset($data['mpu_add_site_logo']) && $data['mpu_add_site_logo'] === 'on' ? true : false;
        $mpu_add_site_logo = sanitize_text_field($data['mpu_add_site_logo']);

        
        $mpu_base_site_logo = isset($data['mpu_base_site_logo']) && $data['mpu_base_site_logo'] === 'on' ? true : false;
        $mpu_base_site_logo = sanitize_text_field($data['mpu_base_site_logo']);
        
        $mpu_custom_logo = sanitize_text_field($data['mpu_custom_logo']);

        $mpu_is_title_visible = isset($data['mpu_is_title_visible']) && $data['mpu_is_title_visible'] === 'on' ? true : false;
        $mpu_is_title_visible = sanitize_text_field($data['mpu_is_title_visible']);
        $mpu_header_title = sanitize_text_field($data['mpu_header_title']);

        $mpu_is_body_content_visible = isset($data['mpu_is_body_content_visible']) && $data['mpu_is_body_content_visible'] === 'on' ? true : false;
        $mpu_is_body_content_visible = sanitize_text_field($data['mpu_is_body_content_visible']);

        $mpu_body_content = sanitize_text_field($data['mpu_body_content']);

        $mpu_is_description_visible = isset($data['mpu_is_description_visible']) && $data['mpu_is_description_visible'] === 'on' ? true : false;
        $mpu_is_description_visible = sanitize_text_field($data['mpu_is_description_visible']);

        $mpu_description = sanitize_text_field($data['mpu_description']);
        $mpu_overlay = sanitize_text_field($data['mpu_overlay']);
        $mpu_overlay_opacity_value = absint($data['mpu_overlay_opacity_value']);
        $mpu_overlay_color = sanitize_hex_color($data['mpu_overlay_color']);
        $mpu_overlay_blur_value = absint($data['mpu_overlay_blur_value']);

        $mpu_is_author_visible = isset($data['mpu_is_author_visible']) && $data['mpu_is_author_visible'] === 'on' ? true : false;
        $mpu_is_author_visible = sanitize_text_field($data['mpu_is_author_visible']);

        $mpu_template_choice = sanitize_text_field($data['mpu_template_choice']);

            // Sizes
        $mpu_is_desktop_full_screen = isset($data['mpu_is_desktop_full_screen']) && $data['mpu_is_desktop_full_screen'] === 'on' ? true : false;
        $mpu_is_desktop_full_screen = sanitize_text_field($data['mpu_is_desktop_full_screen']);

        $mpu_desktop_min_width = absint($data['mpu_desktop_min_width']);
        $mpu_desktop_max_width = absint($data['mpu_desktop_max_width']);
        $mpu_desktop_min_height = absint($data['mpu_desktop_min_height']);
        $mpu_desktop_max_height = absint($data['mpu_desktop_max_height']);

        $mpu_is_mobile_full_screen = isset($data['mpu_is_mobile_full_screen']) && $data['mpu_is_mobile_full_screen'] === 'on' ? true : false;
        $mpu_is_mobile_full_screen = sanitize_text_field($data['mpu_is_mobile_full_screen']);

        $mpu_mobile_min_width = absint($data['mpu_mobile_min_width']);
        $mpu_mobile_max_width = absint($data['mpu_mobile_max_width']);
        $mpu_mobile_min_height = absint($data['mpu_mobile_min_height']);
        $mpu_mobile_max_height = absint($data['mpu_mobile_max_height']);
       


            //Text style
        $mpu_text_style = sanitize_text_field($data['mpu_text_style']);
        $mpu_text_color = sanitize_hex_color($data['mpu_text_color']);
        $mpu_font_family = sanitize_text_field($data['mpu_font_family']);
        $mpu_font_size = absint($data['mpu_font_size']);
        $mpu_is_title_shadow = isset($data['mpu_is_title_shadow']) && $data['mpu_is_title_shadow'] === 'on' ? true : false;
        $mpu_is_title_shadow = sanitize_text_field($data['mpu_is_title_shadow']);
        
        $mpu_title_shadow_type = sanitize_text_field($data['mpu_title_shadow_type']);
        $mpu_title_shadow_size = sanitize_text_field($data['mpu_title_shadow_size']);
        $mpu_title_shadow_color = sanitize_hex_color($data['mpu_title_shadow_color']);
        $mpu_title_style = sanitize_text_field($data['mpu_title_style']);
        $mpu_title_weight = sanitize_text_field($data['mpu_title_weight']);
        $mpu_title_size = absint($data['mpu_title_size']);
        $mpu_title_letter_spacing = absint($data['mpu_title_letter_spacing']);
        $mpu_title_align = sanitize_text_field($data['mpu_title_align']);
        $mpu_content_align = sanitize_text_field($data['mpu_content_align']);
        $mpu_button_align = sanitize_text_field($data['mpu_button_align']);

            // Background PopUp
        $mpu_inner_background = sanitize_text_field($data['mpu_inner_background']); 
        $mpu_inner_background_color = sanitize_hex_color($data['mpu_inner_background_color']); 
        // Pas encore Fait
        $mpu_inner_background_image = sanitize_text_field($data['mpu_inner_background_image']);
        //

        $mpu_inner_background_image_style = sanitize_text_field($data['mpu_inner_background_image_style']);    

            // Border
        $mpu_border_style = sanitize_text_field($data['mpu_border_style']);
        $mpu_border_weight = absint($data['mpu_border_weight']);
        $mpu_border_color = sanitize_hex_color($data['mpu_border_color']);
      
            // Animation opening
        $mpu_animation_opening = sanitize_text_field($data['mpu_animation_opening']);




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
                   'mpu_is_all_articles' => $mpu_is_all_articles,

                   // Visuel
                   'mpu_add_site_logo' => $mpu_add_site_logo,
                   'mpu_base_site_logo' => $mpu_base_site_logo,
                   'mpu_custom_logo' => $mpu_custom_logo,
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
                   'mpu_template_choice' => $mpu_template_choice,

                        // Size
                    'mpu_is_desktop_full_screen' => $mpu_is_desktop_full_screen,
                    'mpu_desktop_min_width' => $mpu_desktop_min_width,
                    'mpu_desktop_max_width' => $mpu_desktop_max_width,
                    'mpu_desktop_min_height' => $mpu_desktop_min_height,
                    'mpu_desktop_max_height' => $mpu_desktop_max_height,
                    'mpu_is_mobile_full_screen' => $mpu_is_mobile_full_screen,
                    'mpu_mobile_min_width' => $mpu_mobile_min_width,
                    'mpu_mobile_max_width' => $mpu_mobile_max_width,
                    'mpu_mobile_min_height' => $mpu_mobile_min_height,
                    'mpu_mobile_max_height' => $mpu_mobile_max_height,

                        // Text style
                    'mpu_text_style' => $mpu_text_style,
                    'mpu_text_color' => $mpu_text_color,
                    'mpu_font_size' => $mpu_font_size,
                    'mpu_is_title_shadow' => $mpu_is_title_shadow,
                    'mpu_title_shadow_type' => $mpu_title_shadow_type,
                    'mpu_title_shadow_size' => $mpu_title_shadow_size,
                    'mpu_title_shadow_color' => $mpu_title_shadow_color,
                    'mpu_title_style' => $mpu_title_style,
                    'mpu_title_weight' => $mpu_title_weight,
                    'mpu_title_size' => $mpu_title_size,
                    'mpu_title_letter_spacing' => $mpu_title_letter_spacing,
                    'mpu_title_align' => $mpu_title_align,
                    'mpu_content_align' => $mpu_content_align,
                    'mpu_button_align' => $mpu_button_align,
                    
                        // Background
                    'mpu_inner_background' => $mpu_inner_background,
                    'mpu_inner_background_color' => $mpu_inner_background_color,
                    'mpu_inner_background_image' => $mpu_inner_background_image,
                    'mpu_inner_background_image_style' => $mpu_inner_background_image_style,

                        // Border
                    'mpu_border_style' => $mpu_border_style,
                    'mpu_border_weight' => $mpu_border_weight,
                    'mpu_border_color' => $mpu_border_color,
     
                        // Animation opening
                    'mpu_animation_opening' => $mpu_animation_opening,
                ),
            ));
        } else {
            wp_send_json_error('Existe déjà');
           
        }
 
}