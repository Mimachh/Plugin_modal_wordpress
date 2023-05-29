<?php

require_once __DIR__ . '/custom-fields-form.php';

function mpu_register_custom_field_visuel() {
    // LOGO
    register_meta('mpu_shortcode', 'mpu_add_site_logo', array(
        'type' => 'boolean',
        'single' => true,
        'show_in_rest' => true,
    ));
    register_meta('mpu_shortcode', 'mpu_add_user_default_logo', array(
        'type' => 'boolean',
        'single' => true,
        'show_in_rest' => true,
    ));
    register_meta('mpu_shortcode', 'mpu_add_user_custom_logo', array(
        'type' => 'file',
        'single' => true,
        'show_in_rest' => true,
    ));

    // Header title
    register_meta('mpu_shortcode', 'mpu_header_title', array(
        'type' => 'string',
        'single' => true,
        'show_in_rest' => true,
    ));

    // Body content
    register_meta('mpu_shortcode', 'mpu_body_content', array(
        'type' => 'string',
        'single' => true,
        'show_in_rest' => true,
    ));

    // Description Popup
    register_meta('mpu_shortcode', 'mpu_description', array(
        'type' => 'string',
        'single' => true,
        'show_in_rest' => true,
    ));

    // Overlay
    register_meta('mpu_shortcode', 'mpu_overlay', array(
        'type' => 'string',
        'single' => true,
        'show_in_rest' => true,
    ));
    register_meta('mpu_shortcode', 'mpu_overlay_opacity_value', array(
        'type' => 'number',
        'single' => true,
        'show_in_rest' => true,
        'sanitize_callback' => 'sanitize_mpu_number',
    ));
    register_meta('mpu_shortcode', 'mpu_overlay_color', array(
        'type' => 'string',
        'single' => true,
        'show_in_rest' => true,
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    register_meta('mpu_shortcode', 'mpu_overlay_blur_value', array(
        'type' => 'number',
        'single' => true,
        'show_in_rest' => true,
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Author
    register_meta('mpu_shortcode', 'mpu_is_author_visible', array(
        'type' => 'boolean',
        'single' => true,
        'show_in_rest' => true,
    ));

    // Template choice
    register_meta('mpu_shortcode', 'mpu_template_choice', array(
        'type' => 'string',
        'single' => true,
        'show_in_rest' => true,
    ));

    // Is title visible
    register_meta('mpu_shortcode', 'mpu_is_title_visible', array(
        'type' => 'boolean',
        'single' => true,
        'show_in_rest' => true,
    ));

    // Is description visible
    register_meta('mpu_shortcode', 'mpu_is_description_visible', array(
        'type' => 'boolean',
        'single' => true,
        'show_in_rest' => true,
    ));

    // Text Style
    register_meta('mpu_shortcode', 'mpu_text_style', array(
        'type' => 'string',
        'single' => true,
        'show_in_rest' => true,
    ));

    // Text color
    register_meta('mpu_shortcode', 'mpu_text_color', array(
        'type' => 'string',
        'single' => true,
        'show_in_rest' => true,
    ));

    // Font family
    register_meta('mpu_shortcode', 'mpu_font_family', array(
        'type' => 'string',
        'single' => true,
        'show_in_rest' => true,
    ));

    // Font size
    register_meta('mpu_shortcode', 'mpu_font_size', array(
        'type' => 'number',
        'single' => true,
        'show_in_rest' => true,
    ));

    // Title style
    register_meta('mpu_shortcode', 'mpu_title_style', array(
        'type' => 'string',
        'single' => true,
        'show_in_rest' => true,
    ));

    // Title weight
    register_meta('mpu_shortcode', 'mpu_title_weight', array(
        'type' => 'string',
        'single' => true,
        'show_in_rest' => true,
    ));

    // Title size
    register_meta('mpu_shortcode', 'mpu_title_size', array(
        'type' => 'number',
        'single' => true,
        'show_in_rest' => true,
    ));

    // Letter spacing
    register_meta('mpu_shortcode', 'mpu_title_letter_spacing', array(
        'type' => 'number',
        'single' => true,
        'show_in_rest' => true,
    ));

    // Title align
    register_meta('mpu_shortcode', 'mpu_title_align', array(
        'type' => 'string',
        'single' => true,
        'show_in_rest' => true,
    ));

    // Content align
    register_meta('mpu_shortcode', 'mpu_content_align', array(
        'type' => 'string',
        'single' => true,
        'show_in_rest' => true,
    ));

    // Button align
        register_meta('mpu_shortcode', 'mpu_button_align', array(
        'type' => 'string',
        'single' => true,
        'show_in_rest' => true,
    ));
}
add_action('init', 'mpu_register_custom_field_visuel');


function mpu_add_custom_field_visuel_meta_box() {

    // Boîte méta pour 'mpu_add_site_logo'
    add_meta_box(
        'mpu-add-site-logo-meta-box',
        'Visuel',
        'render_mpu_add_site_logo_meta_box',
        'mpu_shortcode',
        'normal',
        'default'
    );
    add_meta_box(
        'mpu-add-user-default-logo-meta-box',
        'Visuel',
        'render_mpu_add_user_default_logo_meta_box',
        'mpu_shortcode',
        'normal',
        'default'
    );
    add_meta_box(
        'mpu-add-user-custom-logo-meta-box',
        'Visuel',
        'render_mpu_add_user_custom_logo_meta_box',
        'mpu_shortcode',
        'normal',
        'default'
    );

    // Header Title
    add_meta_box(
        'mpu-header-title-meta-box',
        'Titre du header',
        'render_mpu_header_title_meta_box',
        'mpu_shortcode',
        'normal',
        'default'
    );

    //Body content
    add_meta_box(
        'mpu-body-content-meta-box',
        'Contenu du corps',
        'render_mpu_body_content_meta_box',
        'mpu_shortcode',
        'normal',
        'default'
    );

    // Description Popup
    add_meta_box(
        'mpu-description-meta-box',
        'Description',
        'render_mpu_description_meta_box',
        'mpu_shortcode',
        'normal',
        'default'
    );

    // Overlay
    add_meta_box(
        'mpu-overlay-meta-box',
        'Overlay',
        'render_mpu_overlay_meta_box',
        'mpu_shortcode',
        'normal',
        'default'
    );
    add_meta_box(
        'mpu-overlay-opacity-value-meta-box',
        'Overlay Opacity Value',
        'render_mpu_overlay_opacity_value_meta_box',
        'mpu_shortcode',
        'normal',
        'default'
    );
    add_meta_box(
        'mpu-overlay-color-meta-box',
        'Overlay Color',
        'render_mpu_overlay_color_meta_box',
        'mpu_shortcode',
        'normal',
        'default'
    );
    add_meta_box(
        'mpu-overlay-blur-value-meta-box',
        'Overlay Blur Value',
        'render_mpu_overlay_blur_value_meta_box',
        'mpu_shortcode',
        'normal',
        'default'
    );

    // Author
    add_meta_box(
        'mpu-is-author-visible-meta-box',
        'Author Visibility',
        'render_mpu_is_author_visible_meta_box',
        'mpu_shortcode',
        'normal',
        'default'
    );

    // Template choice
    add_meta_box(
        'mpu-template-choice-meta-box',
        'Template Choice',
        'render_mpu_template_choice_meta_box',
        'mpu_shortcode',
        'normal',
        'default'
    );

    // Is title visible
    add_meta_box(
        'mpu-is-title-visible-meta-box',
        'Is Title Visible',
        'render_mpu_is_title_visible_meta_box',
        'mpu_shortcode',
        'normal',
        'default'
    );

    // Is description visible
    add_meta_box(
        'mpu-is-description-visible-meta-box',
        'Is Description Visible',
        'render_mpu_is_description_visible_meta_box',
        'mpu_shortcode',
        'normal',
        'default'
    );

    // Text style
    add_meta_box(
        'mpu-text-style-meta-box',
        'Text Style',
        'render_mpu_text_style_meta_box',
        'mpu_shortcode',
        'normal',
        'default'
    );

    // Text color
    add_meta_box(
        'mpu-text-color-meta-box',
        'Text Color',
        'render_mpu_text_color_meta_box',
        'mpu_shortcode',
        'normal',
        'default'
    );

    // Font family
    add_meta_box(
        'mpu-font-family-meta-box',
        'Font Family',
        'render_mpu_font_family_meta_box',
        'mpu_shortcode',
        'normal',
        'default'
    );

    // Font size
    add_meta_box(
        'mpu-font-size-meta-box',
        'Font Size',
        'render_mpu_font_size_meta_box',
        'mpu_shortcode',
        'normal',
        'default'
    );

    // Title size
    add_meta_box(
        'mpu-title-style-meta-box',
        'Title Style',
        'render_mpu_title_style_meta_box',
        'mpu_shortcode',
        'normal',
        'default'
    );

    // Title weight
    add_meta_box(
        'mpu-title-weight-meta-box',
        'Title Weight',
        'render_mpu_title_weight_meta_box',
        'mpu_shortcode',
        'normal',
        'default'
    );

    //Title size
    add_meta_box(
        'mpu-title-size-meta-box',
        'Title Size',
        'render_mpu_title_size_meta_box',
        'mpu_shortcode',
        'normal',
        'default'
    );

    // Title letter spacing
    add_meta_box(
        'mpu-title-letter-spacing-meta-box',
        'Title Letter Spacing',
        'render_mpu_title_letter_spacing_meta_box',
        'mpu_shortcode',
        'normal',
        'default'
    );

    // Title align
    add_meta_box(
        'mpu-title-align-meta-box',
        'Title Alignment',
        'render_mpu_title_align_meta_box',
        'mpu_shortcode',
        'normal',
        'default'
    );

    // Content align
    add_meta_box(
        'mpu-content-align-meta-box',
        'Content Alignment',
        'render_mpu_content_align_meta_box',
        'mpu_shortcode',
        'normal',
        'default'
    );

    // Button align
    add_meta_box(
        'mpu-button-align-meta-box',
        'Button Alignment',
        'render_mpu_button_align_meta_box',
        'mpu_shortcode',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'mpu_add_custom_field_visuel_meta_box');

// Callback de sanitization pour le champ number
function sanitize_mpu_number($value) {
    return is_numeric($value) ? floatval($value) : '';
}