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

// Header title
function render_mpu_header_title_meta_box($post) {
    // Récupération de la valeur actuelle du champ
    $header_title = get_post_meta($post->ID, 'mpu_header_title', true);
    ?>

    <label for="mpu-header-title">Titre :</label>
    <input type="text" name="mpu_header_title" id="mpu-header-title" value="<?php echo esc_attr($header_title); ?>">

    <?php
}

// Body content
function render_mpu_body_content_meta_box($post) {
    // Récupération de la valeur actuelle du champ
    $body_content = get_post_meta($post->ID, 'mpu_body_content', true);
    ?>

    <label for="mpu-body-content">Contenu :</label>
    <textarea name="mpu_body_content" id="mpu-body-content" rows="5"><?php echo esc_textarea($body_content); ?></textarea>

    <?php
}

// Description PopUp
function render_mpu_description_meta_box($post) {
    // Récupération de la valeur actuelle du champ
    $description = get_post_meta($post->ID, 'mpu_description', true);
    ?>

    <label for="mpu-description">Description :</label>
    <textarea name="mpu_description" id="mpu-description" rows="5"><?php echo esc_textarea($description); ?></textarea>

    <?php
}

// Overlay
function render_mpu_overlay_meta_box($post) {
    // Récupération de la valeur actuelle du champ
    $overlay = get_post_meta($post->ID, 'mpu_overlay', true);
    ?>

    <label for="mpu-overlay">Overlay :</label>
    <div>
        <input type="radio" name="mpu_overlay" id="mpu-overlay-backdrop" value="Backdrop-filter" <?php checked($overlay, 'Backdrop-filter'); ?>>
        <label for="mpu-overlay-backdrop">Backdrop-filter</label>
    </div>
    <div>
        <input type="radio" name="mpu_overlay" id="mpu-overlay-background" value="Background-color" <?php checked($overlay, 'Background-color'); ?>>
        <label for="mpu-overlay-background">Background-color</label>
    </div>
    <div>
        <input type="radio" name="mpu_overlay" id="mpu-overlay-none" value="none" <?php checked($overlay, 'none'); ?>>
        <label for="mpu-overlay-none">None</label>
    </div>

    <?php
}
function render_mpu_overlay_opacity_value_meta_box($post) {
    // Récupération de la valeur actuelle du champ
    $opacity_value = get_post_meta($post->ID, 'mpu_overlay_opacity_value', true);
    ?>

    <label for="mpu-overlay-opacity-value">Opacity Value :</label>
    <input type="number" name="mpu_overlay_opacity_value" id="mpu-overlay-opacity-value" step="0.01" value="<?php echo esc_attr($opacity_value); ?>">

    <?php
}

function render_mpu_overlay_color_meta_box($post) {
    // Récupération de la valeur actuelle du champ
    $overlay_color = get_post_meta($post->ID, 'mpu_overlay_color', true);
    ?>

    <label for="mpu-overlay-color">Overlay Color :</label>
    <input type="color" name="mpu_overlay_color" id="mpu-overlay-color" value="<?php echo esc_attr($overlay_color); ?>">

    <?php
}

function render_mpu_overlay_blur_value_meta_box($post) {
    // Récupération de la valeur actuelle du champ
    $overlay_blur_value = get_post_meta($post->ID, 'mpu_overlay_blur_value', true);
    ?>

    <label for="mpu-overlay-blur-value">Overlay Blur Value :</label>
    <input type="number" name="mpu_overlay_blur_value" id="mpu-overlay-blur-value" value="<?php echo esc_attr($overlay_blur_value); ?>">

    <?php
}

// Author
function render_mpu_is_author_visible_meta_box($post) {
    // Récupération de la valeur actuelle du champ
    $is_author_visible = get_post_meta($post->ID, 'mpu_is_author_visible', true);
    ?>

    <label for="mpu-is-author-visible">Author Visibility:</label>
    <input type="checkbox" name="mpu_is_author_visible" id="mpu-is-author-visible" <?php checked($is_author_visible, true); ?>>

    <?php
}

// Template choice
function render_mpu_template_choice_meta_box($post) {
    // Récupération de la valeur actuelle du champ
    $template_choice = get_post_meta($post->ID, 'mpu_template_choice', true);
    ?>

    <label for="mpu-template-choice">Template Choice:</label>
    <select name="mpu_template_choice" id="mpu-template-choice">
        <option value="1" <?php selected($template_choice, '1'); ?>>Option 1</option>
        <option value="2" <?php selected($template_choice, '2'); ?>>Option 2</option>
    </select>

    <?php
}

// Is title visible
function render_mpu_is_title_visible_meta_box($post) {
    // Récupération de la valeur actuelle du champ
    $is_title_visible = get_post_meta($post->ID, 'mpu_is_title_visible', true);
    ?>

    <label for="mpu-is-title-visible">Is Title Visible:</label>
    <input type="checkbox" name="mpu_is_title_visible" id="mpu-is-title-visible" <?php checked($is_title_visible, true); ?> />

    <?php
}

// Is description visible
function render_mpu_is_description_visible_meta_box($post) {
    // Récupération de la valeur actuelle du champ
    $is_description_visible = get_post_meta($post->ID, 'mpu_is_description_visible', true);
    ?>

    <label for="mpu-is-description-visible">Is Description Visible:</label>
    <input type="checkbox" name="mpu_is_description_visible" id="mpu-is-description-visible" <?php checked($is_description_visible, true); ?> />

    <?php
}

// Text style
function render_mpu_text_style_meta_box($post) {
    // Récupération de la valeur actuelle du champ
    $text_style = get_post_meta($post->ID, 'mpu_text_style', true);
    ?>

    <label for="mpu-text-style">Text Style:</label>
    <select name="mpu_text_style" id="mpu-text-style">
        <option value="option1" <?php selected($text_style, 'option1'); ?>>Option 1</option>
        <option value="option2" <?php selected($text_style, 'option2'); ?>>Option 2</option>
    </select>

    <?php
}

function render_mpu_text_color_meta_box($post) {
    // Récupération de la valeur actuelle du champ
    $text_color = get_post_meta($post->ID, 'mpu_text_color', true);
    ?>

    <label for="mpu-text-color">Text Color:</label>
    <input type="color" name="mpu_text_color" id="mpu-text-color" value="<?php echo esc_attr($text_color); ?>">

    <?php
}

function render_mpu_font_family_meta_box($post) {
    // Récupération de la valeur actuelle du champ
    $font_family = get_post_meta($post->ID, 'mpu_font_family', true);
    ?>

    <label for="mpu-font-family">Font Family:</label>
    <select name="mpu_font_family" id="mpu-font-family">
        <option value="Arial" <?php selected($font_family, 'Arial'); ?>>Arial</option>
        <option value="Helvetica" <?php selected($font_family, 'Helvetica'); ?>>Helvetica</option>
    </select>

    <?php
}

// Font size
function render_mpu_font_size_meta_box($post) {
    // Récupération de la valeur actuelle du champ
    $font_size = get_post_meta($post->ID, 'mpu_font_size', true);
    ?>

    <label for="mpu-font-size">Font Size:</label>
    <input type="number" name="mpu_font_size" id="mpu-font-size" value="<?php echo $font_size; ?>">

    <?php
}

// Title style
function render_mpu_title_style_meta_box($post) {
    // Récupération de la valeur actuelle du champ
    $title_style = get_post_meta($post->ID, 'mpu_title_style', true);
    ?>

    <label for="mpu-title-style">Title Style:</label>
    <select name="mpu_title_style" id="mpu-title-style">
        <option value="option1" <?php selected($title_style, 'option1'); ?>>Option 1</option>
        <option value="option2" <?php selected($title_style, 'option2'); ?>>Option 2</option>
    </select>

    <?php
}

// Title weight
function render_mpu_title_weight_meta_box($post) {
    // Récupération de la valeur actuelle du champ
    $title_weight = get_post_meta($post->ID, 'mpu_title_weight', true);
    ?>

    <label for="mpu-title-weight">Title Weight:</label>
    <select name="mpu_title_weight" id="mpu-title-weight">
        <option value="option1" <?php selected($title_weight, 'option1'); ?>>Option 1</option>
        <option value="option2" <?php selected($title_weight, 'option2'); ?>>Option 2</option>
    </select>

    <?php
}

// Title size
function render_mpu_title_size_meta_box($post) {
    $title_size = get_post_meta($post->ID, 'mpu_title_size', true);
    ?>

    <label for="mpu-title-size">Title Size:</label>
    <input type="number" name="mpu_title_size" id="mpu-title-size" value="<?php echo esc_attr($title_size); ?>">

    <?php
}

// Title letter spacing
function render_mpu_title_letter_spacing_meta_box($post) {
    $title_letter_spacing = get_post_meta($post->ID, 'mpu_title_letter_spacing', true);
    ?>

    <label for="mpu-title-letter-spacing">Title Letter Spacing:</label>
    <input type="number" name="mpu_title_letter_spacing" id="mpu-title-letter-spacing" value="<?php echo esc_attr($title_letter_spacing); ?>">

    <?php
}

// Title align
function render_mpu_title_align_meta_box($post) {
    $title_align = get_post_meta($post->ID, 'mpu_title_align', true);
    ?>

    <label for="mpu-title-align">Title Alignment:</label>
    <select name="mpu_title_align" id="mpu-title-align">
        <option value="option1" <?php selected($title_align, 'option1'); ?>>Option 1</option>
        <option value="option2" <?php selected($title_align, 'option2'); ?>>Option 2</option>
    </select>

    <?php
}

// Content align
function render_mpu_content_align_meta_box($post) {
    $content_align = get_post_meta($post->ID, 'mpu_content_align', true);
    ?>

    <label for="mpu-content-align">Content Alignment:</label>
    <select name="mpu_content_align" id="mpu-content-align">
        <option value="option1" <?php selected($content_align, 'option1'); ?>>Option 1</option>
        <option value="option2" <?php selected($content_align, 'option2'); ?>>Option 2</option>
    </select>

    <?php
}

// Button align
function render_mpu_button_align_meta_box($post) {
    $button_align = get_post_meta($post->ID, 'mpu_button_align', true);
    ?>

    <label for="mpu-button-align">Button Alignment:</label>
    <select name="mpu_button_align" id="mpu-button-align">
        <option value="option1" <?php selected($button_align, 'option1'); ?>>Option 1</option>
        <option value="option2" <?php selected($button_align, 'option2'); ?>>Option 2</option>
    </select>

    <?php
}