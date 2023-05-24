<?php

add_action('init', 'mpu_Custom_Post_Shortcode');

function mpu_Custom_Post_Shortcode() {
    register_post_type('mpu_shortcode', array(
        "supports" => array('title'), // Définir les fonctionnalités supportées
        "public" => true,
        "show_ui" => true,
		'show_in_rest' => true,
        "labels" => array(
            'name' => 'Shortcodes',
            "add_new_item" => 'Ajouter un nouveau Shortcode',
            "edit_item" => "Editer le Shortcode",
            "all_items" => "Tous les Shortcodes",
            'singular_name' => "Shortcode"
        ),
        "menu_icon" => 'dashicons-format-gallery',
        "capability_type" => 'post', // Utiliser les mêmes capacités que les articles
        "map_meta_cap" => true,
    ));
}