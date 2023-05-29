<?php

// Fonction pour afficher le champ 'mpu_add_site_logo'
function render_mpu_add_site_logo_meta_box($post) {
    $value = get_post_meta($post->ID, 'mpu_add_site_logo', true);
    ?>
    <label for="mpu-is-logo-site">Afficher un logo sur la modale ?</label>
    <input type="checkbox" name="mpu_add_site_logo" id="mpu-is-logo-site" value="1" <?php checked($value, '1'); ?>>
    <?php
}

function render_mpu_add_user_default_logo_meta_box($post) {
    $value = get_post_meta($post->ID, 'mpu_add_user_default_logo', true);
    ?>
    <label for="mpu-user-default-logo">Voulez-vous utiliser le logo actuel de votre site ?</label>
    <input type="checkbox" name="mpu_add_user_default_logo" id="mpu-user-default-logo" value="1" <?php checked($value, '1'); ?>>
    <?php
}

function render_mpu_add_user_custom_logo_meta_box($post) {
    $value = get_post_meta($post->ID, 'mpu_add_user_custom_logo', true);
    $image_url = wp_get_attachment_url($value);
    ?>
    <label for="mpu-add-user-custom-logo">Choisissez un visuel pour le logo :</label>
    <input type="file" name="mpu_add_user_custom_logo" id="mpu-add-user-custom-logo" value="<?php echo esc_attr($value); ?>">
    <?php if ($image_url) : ?>
        <div>
            <img src="<?php echo esc_url($image_url); ?>" alt="Visuel">
        </div>
    <?php endif; ?>
    <?php
}
