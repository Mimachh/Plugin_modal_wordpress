<?php

// Fonction pour afficher le champ 'mpu_activate'
function render_mpu_activate_meta_box($post) {
    $value = get_post_meta($post->ID, 'mpu_activate', true);
    ?>
    <label for="mpu-activate">Activate:</label>
    <input type="checkbox" name="mpu_activate" id="mpu-activate" value="1" <?php checked($value, '1'); ?>>
    <?php
}

// Fonction pour afficher le champ 'mpu_is_all_pages'
function render_mpu_is_all_pages_meta_box($post) {
    $value = get_post_meta($post->ID, 'mpu_is_all_pages', true);
    ?>
    <label for="mpu-is-all-pages">All Pages:</label>
    <input type="checkbox" name="mpu_is_all_pages" id="mpu-is-all-pages" value="1" <?php checked($value, '1'); ?>>
    <?php
}

// Fonction pour afficher le champ 'mpu_is_all_articles'
function render_mpu_is_all_articles_meta_box($post) {
    $value = get_post_meta($post->ID, 'mpu_is_all_articles', true);
    ?>
    <label for="mpu-is-all-articles">All articles:</label>
    <input type="checkbox" name="mpu_is_all_articles" id="mpu-is-all-articles" value="1" <?php checked($value, '1'); ?>>
    <?php
}


// Fonction pour afficher le champ 'mpu_is_except'
function render_mpu_is_except_meta_box($post) {
    $value = get_post_meta($post->ID, 'mpu_is_except', true);
    $value = is_array($value) ? $value : array(); // Assurez-vous que la valeur est un tableau
    ?>
    <label for="mpu-is-except">Except:</label>
    <input type="checkbox" name="mpu_is_except[]" value="option1" <?php checked(in_array('option1', $value)); ?>> Option 1
    <input type="checkbox" name="mpu_is_except[]" value="option2" <?php checked(in_array('option2', $value)); ?>> Option 2
    <!-- Ajoutez d'autres options de checkbox si nécessaire -->
    <?php
}

// Fonction pour afficher le champ 'mpu_is_include'
function render_mpu_is_include_meta_box($post) {
    $value = get_post_meta($post->ID, 'mpu_is_include', true);
    $value = is_array($value) ? $value : array(); // Assurez-vous que la valeur est un tableau
    ?>
    <label for="mpu-is-include">Include:</label>
    <input type="checkbox" name="mpu_is_include[]" value="option1" <?php checked(in_array('option1', $value)); ?>> Option 1
    <input type="checkbox" name="mpu_is_include[]" value="option2" <?php checked(in_array('option2', $value)); ?>> Option 2
    <!-- Ajoutez d'autres options de checkbox si nécessaire -->
    <?php
}

