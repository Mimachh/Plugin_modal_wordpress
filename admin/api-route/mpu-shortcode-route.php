<?php 

add_action('rest_api_init', 'mpu_shortcode_create_route');


function mpu_shortcode_create_route() {
    register_rest_route('mpu-shortcodes/v1', 'manageShortcodes', array(
        'methods' => 'POST',
        'callback' => 'createMpuShortcode'
    ));
}
function createMpuShortcode($data) {
    if(is_admin()) {
        $mpu_shortcode_title = sanitize_text_field($data['mpu_title']);
    
        $existQuery = new WP_Query(array(
            'post_type' => 'mpu_shortcode',
            'meta_query' => array(
                array(
                    'key' => 'mpu_title',
                    'compare' => '=',
                    'value' => $mpu_shortcode_title,
                )
            )
        ));
    
        if($existQuery->found_posts == 0) {
            return wp_insert_post(array(
                'post_type' => 'mpu_shortcode',
                'post_status' => 'publish',
                'meta_input' => array(
                   'mpu_title' => $mpu_shortcode_title
                ),
            ));
        } else {
            die('Existe déjà');
        }
    
    } else {
        die("Only admin");
    }
}
    