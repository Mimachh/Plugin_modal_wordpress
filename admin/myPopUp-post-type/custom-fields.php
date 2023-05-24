<?php

function register_custom_field() {
    register_meta('mpu_shortcode', 'ID', array(
        'type' => 'string', // Type de champ (string, integer, boolean, etc.)
        'single' => true, // Si le champ est unique ou peut avoir plusieurs valeurs
        'show_in_rest' => true, // Si le champ doit être visible dans l'éditeur Gutenberg
    ));
}
add_action('init', 'register_custom_field');


function add_custom_field_meta_box() {
    add_meta_box(
        'custom-field-meta-box',
        'Custom Field',
        'render_custom_field_meta_box',
        'mpu_shortcode',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'add_custom_field_meta_box');

// Fonction pour afficher le champ personnalisé dans la boîte méta
function render_custom_field_meta_box($post) {
    $value = get_post_meta($post->ID, 'ID', true);
    ?>
    <label for="custom-field">Custom Field:</label>
    <input type="text" name="custom-field" id="custom-field" value="<?php echo esc_attr($value); ?>">
    <?php
}

// Fonction pour enregistrer la valeur du champ personnalisé
function save_custom_field_value($post_id) {
    if (isset($_POST['custom-field'])) {
        $value = sanitize_text_field($_POST['custom-field']);
        update_post_meta($post_id, 'ID', $value);
    }
}
add_action('save_post_mpu_shortcode', 'save_custom_field_value');
