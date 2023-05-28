<?php 

add_action('rest_api_init', 'mpu_shortcode_create_route');


function mpu_shortcode_create_route() {
    register_rest_route('mpu-shortcodes/v1', 'manageShortcodes', array(
        'methods' => 'POST',
        'callback' => 'createMpuShortcode'
    ));
}
function createMpuShortcode($data) {
  
        $mpu_post_title = sanitize_text_field($data['mpu_post_title']);
        $mpu_activate = sanitize_text_field($data['mpu_activate']);
        $mpu_is_all_pages = sanitize_text_field($data['mpu_is_all_pages']);
        $mpu_is_except = array_map('sanitize_text_field', $data['mpu_is_except']);
        $mpu_is_include = array_map('sanitize_text_field', $data['mpu_is_include']);
        $mpu_is_all_articles = sanitize_text_field($data['mpu_is_all_articles']);


        // $existQuery = new WP_Query(array(
        //     'post_type' => 'mpu_shortcode',
        //     'meta_query' => array(
        //         array(
        //             'key' => 'post_title',
        //             'compare' => '=',
        //             'value' => $mpu_post_title,
        //         )
        //     )
        // ));
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
                   'mpu_is_all_articles' => $mpu_is_all_articles
                ),
            ));
        } else {
            wp_send_json_error('Existe déjà');
           
        }
 
}
    
