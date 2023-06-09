<?php
function myPopUp_options_page_html()
{
    require_once dirname(dirname(__FILE__)) . '/admin/partials/my-popup-navbar.php';

?>
    <div class="mpu-wrapper">
        <?php myPopUp_navbar(); ?>
        <div class="wrap">

            <h1 class="mb-5"><?php echo esc_html(get_admin_page_title()); ?></h1>

            <div class="mpu_tabs_menu">
                <ul>
                    <li class="is-active mpu-activation"><a>Activation</a></li>
                    <li><a class="mpu-visuel">Visuel</a></li>
                    <li><a class="mpu-conditions">conditions</a></li>
                    <li><a class="mpu-options-supp">Options supplémentaires</a></li>
                </ul>
            </div>

            <!-- container -->
            <div class="container is-fluid">

                <?php
                if (isset($_GET['id'])) {
                    $post_id = $_GET['id'];
                    // Récupérer l'ID du custom post type
                    // Récupérer les données du custom post type
                    $post = get_post($post_id);
                    $post_title = $post->post_title;


                    // Récup des champs activation
                    $mpu_activate = get_post_meta($post_id, 'mpu_activate', true);
                    $mpu_is_all_pages = get_post_meta($post_id, 'mpu_is_all_pages', true);
                    $mpu_is_except = get_post_meta($post_id, 'mpu_is_except', true);
                    $mpu_is_all_articles = get_post_meta($post_id, 'mpu_is_all_articles', true);
                    $mpu_add_site_logo = get_post_meta($post_id, 'mpu_add_site_logo', true);
                    $mpu_base_site_logo = get_post_meta($post_id, 'mpu_base_site_logo', true);
                    $customLogoPath = get_post_meta($post_id, 'mpu_custom_logo', true);
                    $mpu_is_title_visible = get_post_meta($post_id, 'mpu_is_title_visible', true);
                    $mpu_header_title = get_post_meta($post_id, 'mpu_header_title', true);
                    //Custom content
                    $mpu_is_body_content_visible = get_post_meta($post_id, 'mpu_is_body_content_visible', true);
                    $mpu_body_content = get_post_meta($post_id, 'mpu_body_content', true);
                    // Custom description
                    $mpu_is_description_visible = get_post_meta($post_id, 'mpu_is_description_visible', true);
                    $mpu_description = get_post_meta($post_id, 'mpu_description', true);
                    // Overlay
                    $mpu_overlay = get_post_meta($post_id, 'mpu_overlay', true);
                    $mpu_overlay_opacity_value = get_post_meta($post_id, 'mpu_overlay_opacity_value', true);
                    $mpu_overlay_color = get_post_meta($post_id, 'mpu_overlay_color', true);
                    $mpu_overlay_blur_value = get_post_meta($post_id, 'mpu_overlay_blur_value', true);
                    // Auteur
                    $mpu_is_author_visible = get_post_meta($post_id, 'mpu_is_author_visible', true);
                    // Choix du template
                    $mpu_template_choice = get_post_meta($post_id, 'mpu_template_choice', true);
                    // Desktop screen
                    $mpu_is_desktop_full_screen = get_post_meta($post_id, 'mpu_is_desktop_full_screen', true);
                    $mpu_desktop_min_width = get_post_meta($post_id, 'mpu_desktop_min_width', true);
                    $mpu_desktop_max_width = get_post_meta($post_id, 'mpu_desktop_max_width', true);
                    $mpu_desktop_min_height = get_post_meta($post_id, 'mpu_desktop_min_height', true);
                    $mpu_desktop_max_height = get_post_meta($post_id, 'mpu_desktop_max_height', true);
                    // Mobile screen
                    $mpu_is_mobile_full_screen = get_post_meta($post_id, 'mpu_is_mobile_full_screen', true);
                    $mpu_mobile_min_width = get_post_meta($post_id, 'mpu_mobile_min_width', true);
                    $mpu_mobile_max_width = get_post_meta($post_id, 'mpu_mobile_max_width', true);
                    $mpu_mobile_min_height = get_post_meta($post_id, 'mpu_mobile_min_height', true);
                    $mpu_mobile_max_height = get_post_meta($post_id, 'mpu_mobile_max_height', true);
                    // Text style
                    $mpu_text_style = get_post_meta($post_id, 'mpu_text_style', true);
                    $mpu_text_color = get_post_meta($post_id, 'mpu_text_color', true);
                    $mpu_font_family = get_post_meta($post_id, 'mpu_font_family', true);
                    $mpu_font_size = get_post_meta($post_id, 'mpu_font_size', true);
                    // Shadow
                    $mpu_is_title_shadow = get_post_meta($post_id, 'mpu_is_title_shadow', true);
                    $mpu_title_shadow_type = get_post_meta($post_id, 'mpu_title_shadow_type', true);
                    $mpu_title_shadow_color = get_post_meta($post_id, 'mpu_title_shadow_color', true);
                    $mpu_title_shadow_size = get_post_meta($post_id, 'mpu_title_shadow_size', true);

                    // Titre
                    $mpu_title_style = get_post_meta($post_id, 'mpu_title_style', true);
                    $mpu_title_weight = get_post_meta($post_id, 'mpu_title_weight', true);
                    $mpu_title_size = get_post_meta($post_id, 'mpu_title_size', true);
                    $mpu_title_letter_spacing = get_post_meta($post_id, 'mpu_title_letter_spacing', true);
                    $mpu_title_align = get_post_meta($post_id, 'mpu_title_align', true);
                    
                    // Content
                    $mpu_content_align = get_post_meta($post_id, 'mpu_content_align', true);

                    // Button
                    $mpu_button_align = get_post_meta($post_id, 'mpu_button_align', true);

                    //Inner Background
                    $mpu_inner_background = get_post_meta($post_id, 'mpu_inner_background', true);
                    $mpu_inner_background_image = get_post_meta($post_id, 'mpu_inner_background_image', true);
                    $mpu_inner_background_color = get_post_meta($post_id, 'mpu_inner_background_color', true);
                    $mpu_inner_background_image_style = get_post_meta($post_id, 'mpu_inner_background_image_style', true);

                    // Border
                    $mpu_border_style = get_post_meta($post_id, 'mpu_border_style', true);
                    $mpu_border_color = get_post_meta($post_id, 'mpu_border_color', true);
                    $mpu_border_weight = get_post_meta($post_id, 'mpu_border_weight', true);
                    $mpu_animation_opening = get_post_meta($post_id, 'mpu_animation_opening', true);


                    // OPTIONS SUPP
                    // Open Sound
                    $mpu_is_sound_on_open = get_post_meta($post_id, 'mpu_is_sound_on_open', true);
                    $mpu_sound_open = get_post_meta($post_id, 'mpu_sound_open', true);

                    // Close Sound
                    $mpu_is_sound_on_closing = get_post_meta($post_id, 'mpu_is_sound_on_closing', true);
                    $mpu_sound_closing = get_post_meta($post_id, 'mpu_sound_closing', true);
                ?>
                    <input type="hidden" value="<?php echo $post_id; ?>" class="mpu_shortcode_id">
                    <button type="submit" class="mpu_save_edit_button">Nouveau bouton edit</button>
                <?php }
                ?>
                <div class="mpu_title-error-message" style="color: red; display: none;"></div>

                <!-- MENU ACTIVATION -->
                <div class="mpu-activation-section">
                    <div class="field">
                        <!-- formulaire de création de la première modale -->
                        <label for="mpu_shortcode_title">Titre du shortcode :</label>
                        <div class="control">
                            <input type="text" name="post_title" class="input is-primary mpu_post_title" id="mpu_shortcode_title" value="<?php if (isset($post_title)) echo $post_title; ?>" placeholder="" required>
                        </div>
                    </div>

                    <div class="mpu-input-field my-4">
                        <label for="mpu_activate">Activer le Shortcode</label>
                        <label class="mpu_switch">
                            <input name="mpu_activate" class="mpu_activate" type="checkbox" value="1" <?php if (isset($mpu_activate)) checked($mpu_activate, '1'); ?>>
                            <span class="mpu_slider mpu_round"></span>
                        </label>
                    </div>

                    <div class="mpu-input-field my-4">
                        <label for="mpu_is_all_pages">Afficher sur toutes les pages ?</label>
                        <label class="mpu_switch">
                            <input name="mpu_is_all_pages" class="mpu_is_all_pages" type="checkbox" value="1" <?php if (isset($mpu_is_all_pages)) checked($mpu_is_all_pages, '1'); ?>>
                            <span class="mpu_slider mpu_round"></span>
                        </label>
                    </div>



                    <div class="mpu_exclure_div">
                        <label for="mpu-is-except">Except:</label>
                        <?php
                        $mpu_pages = get_pages();

                        foreach ($mpu_pages as $page) {
                            $page_id = $page->ID;
                            $page_title = $page->post_title;
                            if (isset($mpu_is_except)) {
                                $checked = in_array($page_id, $mpu_is_except) ? 'checked' : '';
                            }

                        ?>
                            <div>
                                <input type="checkbox" name="mpu_is_except[]" class="mpu_is_except" value="<?php echo $page_id; ?>" <?php if (isset($mpu_is_except)) echo $checked; ?>>
                                <?php echo $page_title;
                                ?>
                            </div>
                        <?php }
                        ?>
                    </div>

                    <!-- All articles -->
                    <div class="mpu-input-field my-4">
                        <label for="mpu_is_all_articles">Afficher sur tous les articles ?</label>
                        <label class="mpu_switch">
                            <input name="mpu_is_all_articles" class="mpu_is_all_articles" type="checkbox" <?php if (isset($mpu_is_all_articles)) checked($mpu_is_all_articles, '1'); ?>>
                            <span class="mpu_slider mpu_round"></span>
                        </label>
                    </div>


                    <button type="submit" class="button is-primary mpu_submit">Submit</button>
                </div>
                <!--MENU VISUEL-->
                <div class="mpu-visuel-section">
                    <!-- ADD LOGO -->
                    <div class="mpu-input-field my-4">
                        <label for="mpu_add_site_logo">Ajouter un logo à votre popup</label>
                        <label class="mpu_switch">
                            <input name="mpu_add_site_logo" class="mpu_add_site_logo" type="checkbox" value="1" <?php if (isset($mpu_add_site_logo)) checked($mpu_add_site_logo, '1'); ?>>
                            <span class="mpu_slider mpu_round"></span>
                        </label>
                    </div>
                    <div class="mpu-input-field my-4 mpu_base_site_logo_div_hide_by_default">
                        <label for="mpu_base_site_logo">Utiliser le Logo de votre site </label>
                        <label class="mpu_switch">
                            <input name="mpu_base_site_logo" class="mpu_base_site_logo" type="checkbox" value="1" <?php if (isset($mpu_base_site_logo)) checked($mpu_base_site_logo, '1'); ?>>
                            <span class="mpu_slider mpu_round"></span>
                        </label>
                        <label for="mpu_base_site_logo">Utiliser un logo personnalisé </label>
                    </div>

                    <!-- Bouton pour ouvrir la mediatheque  -->
                    <div class="mpu-input-field my-4 mpu_custom_logo_div_hide_by_default">
                        <img class="mpu_custom_logo_preview" id="image_preview" src="<?php if (isset($customLogoPath)) echo $customLogoPath; ?>" alt="Aperçu de l'image" />
                        <button class="button is-primary mpu_custom_logo_media_open" class="button">Sélectionner une image</button>
                    </div>

                    <!-- SHOW TITLE -->
                    <div class="mpu-input-field my-4">
                        <label for="mpu_is_title_visible">Ajouter un titre</label>
                        <label class="mpu_switch">
                            <input name="mpu_is_title_visible" class="mpu_is_title_visible" type="checkbox" value="1" <?php if (isset($mpu_is_title_visible)) checked($mpu_is_title_visible, '1'); ?>>
                            <span class="mpu_slider mpu_round"></span>
                        </label>
                    </div>
                    <!-- TITRE POPUP -->
                    <div class="mpu-input-field my-4" id="header_title">
                        <label for="mpu_header_title">Titre du Pop-Up</label>
                        <div class="control">
                            <input class="input is-primary mpu_header_title" type="text" placeholder="Titre du Pop-Up" value="<?php if (isset($mpu_header_title)) echo $mpu_header_title; ?>">
                        </div>
                    </div>
                    <!-- SHOW DESCRIPTION -->
                    <div class="mpu-input-field my-4">
                        <label for="mpu_is_body_content_visible">Ajouter un contenu custom</label>
                        <label class="mpu_switch">
                            <input name="mpu_is_body_content_visible" class="mpu_is_body_content_visible" type="checkbox" value="1" <?php if (isset($mpu_is_body_content_visible)) checked($mpu_is_body_content_visible, '1'); ?>>
                            <span class="mpu_slider mpu_round"></span>
                        </label>
                    </div>
                    <!-- CUSTOM CONTENT -->
                    <div class="mpu-input-field my-4" id="custom_content_div">
                        <label for="mpu_body_content">Custom content</label>
                        <div class="control">
                            <textarea class="textarea is-primary mpu_body_content" type="text" placeholder="Custom Content"><?php if (isset($mpu_body_content)) echo $mpu_body_content; ?></textarea>
                        </div>
                    </div>
                    <!-- SHOW DESCRIPTION -->
                    <div class="mpu-input-field my-4">
                        <label for="mpu_is_description_visible">Ajouter une description</label>
                        <label class="mpu_switch">
                            <input name="mpu_is_description_visible" class="mpu_is_description_visible" type="checkbox" value="1" <?php if (isset($mpu_is_description_visible)) checked($mpu_is_description_visible, '1'); ?>>
                            <span class="mpu_slider mpu_round"></span>
                        </label>
                    </div>
                    <!-- DESCRIPTION -->
                    <div class="mpu-input-field my-4" id="custom_description_div">
                        <label for="mpu_description">Custom Description</label>
                        <div class="control">
                            <textarea class="textarea is-primary mpu_description" type="text" placeholder="Description"><?php if (isset($mpu_description)) echo $mpu_description; ?></textarea>
                        </div>
                    </div>
                    <!-- OVERLAY -->
                    <div class="columns">
                        <div class="mpu-input-field my-4 column is-3">
                            <label for="mpu_overlay">Overlay</label>
                            <div class="control">
                                <div class="select is-primary">
                                    <select class="mpu_overlay">
                                        <option value="1" <?php if (isset($mpu_overlay) && $mpu_overlay === '1') echo 'selected'; ?>>Overlay 1</option>
                                        <option value="2" <?php if (isset($mpu_overlay) && $mpu_overlay === '2') echo 'selected'; ?>>Overlay 2</option>
                                        <option value="3" <?php if (isset($mpu_overlay) && $mpu_overlay === '3') echo 'selected'; ?>>Overlay 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- BACKDROP -->
                        <div class="mpu-input-field my-4 column is-2">
                            <label for="mpu_overlay_opacity_value">Opacité</label>
                            <div class="control">
                                <input class="input is-primary mpu_overlay_opacity_value" type="number" placeholder="Valeur" value="<?php if (isset($mpu_overlay_opacity_value)) echo $mpu_overlay_opacity_value; ?>">
                            </div>
                        </div>
                        <!-- BACKDROP COLORPICKER -->
                        <div class="mpu-input-field my-4 column is-2">
                            <label for="mpu_overlay_color">Couleur</label>
                            <div class="control">
                                <input class="input is-primary mpu_overlay_color" type="color" placeholder="Valeur" value="<?php if (isset($mpu_overlay_color)) echo $mpu_overlay_color; ?>">
                            </div>
                        </div>
                        <!-- BLUR VALUE -->
                        <div class="mpu-input-field my-4 column is-2">
                            <label for="mpu_overlay_blur_value">Flou</label>
                            <div class="control">
                                <input class="input is-primary mpu_overlay_blur_value" type="number" placeholder="Valeur" value="<?php if (isset($mpu_overlay_blur_value)) echo $mpu_overlay_blur_value; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- Auteur visible -->
                    <div class="mpu-input-field my-4">
                        <label for="mpu_is_author_visible">Afficher l'auteur</label>
                        <label class="mpu_switch">
                            <input name="mpu_is_author_visible" class="mpu_is_author_visible" type="checkbox" value="1" <?php if (isset($mpu_is_author_visible)) checked($mpu_is_author_visible, '1'); ?>>
                            <span class="mpu_slider mpu_round"></span>
                        </label>
                    </div>
                    <!-- Template choice -->
                    <div class="mpu-input-field my-4 column is-3">
                        <label for="mpu_template_choice">Template</label>
                        <div class="control">
                            <div class="select is-primary ">
                                <select class="mpu_template_choice">
                                    <option value="1" <?php if (isset($mpu_template_choice) && $mpu_template_choice === '1') echo 'selected'; ?>>Template 1</option>
                                    <option value="2" <?php if (isset($mpu_template_choice) && $mpu_template_choice === '2') echo 'selected'; ?>>Template 2</option>
                                    <option value="3" <?php if (isset($mpu_template_choice) && $mpu_template_choice === '3') echo 'selected'; ?>>Template 3</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <!-- Is full screen -->
                    <div class="mpu-input-field my-4 column is-3">
                        <label for="mpu_is_desktop_full_screen">Afficher le pop-up en plein écran sur ordinateur ?</label>
                        <label class="mpu_switch">
                            <input name="mpu_is_desktop_full_screen" class="mpu_is_desktop_full_screen" type="checkbox" value="1" <?php if (isset($mpu_is_desktop_full_screen)) checked($mpu_is_desktop_full_screen, '1'); ?>>
                            <span class="mpu_slider mpu_round"></span>
                        </label>
                    </div>
                    <!-- COLUMNS START -->
                    <div class="columns" id="mpuDesktopFullScreenDivHideByDefault">
                        <!-- IF NO, WIDTH -->
                        <div class="mpu-input-field my-4 column is-3 is-flex-direction-row">
                            <label for="mpu_desktop_min_width">Largeur minimale : </label>
                            <div class="control">
                                <input class="input is-primary mpu_desktop_min_width" type="number" placeholder="Valeur en pixel" value="<?php if (isset($mpu_desktop_min_width)) echo $mpu_desktop_min_width; ?>">
                            </div>
                        </div>
                        <div class="mpu-input-field my-4 column is-3 is-flex-direction-row">
                            <label for="mpu_desktop_max_width">Largeur maximale : </label>
                            <div class="control">
                                <input class="input is-primary mpu_desktop_max_width" type="number" placeholder="Valeur en pixel" value="<?php if (isset($mpu_desktop_max_width)) echo $mpu_desktop_max_width; ?>">
                            </div>
                        </div>

                        <!-- IF NO, HEIGHT -->
                        <div class="mpu-input-field my-4 column is-3 is-flex-direction-row">
                            <label for="mpu_desktop_min_height">Hauteur minimale : </label>
                            <div class="control">
                                <input class="input is-primary mpu_desktop_min_height" type="number" placeholder="Valeur en pixel" value="<?php if (isset($mpu_desktop_min_height)) echo $mpu_desktop_min_height; ?>">
                            </div>
                        </div>
                        <!-- IF NO, MIN-HEIGHT -->
                        <div class="mpu-input-field my-4 column is-3 is-flex-direction-row">
                            <label for="mpu_desktop_max_height">Hauteur maximale : </label>
                            <div class="control">
                                <input class="input is-primary mpu_desktop_max_height" type="number" placeholder="Valeur en pixel" value="<?php if (isset($mpu_desktop_max_height)) echo $mpu_desktop_max_height; ?>">
                            </div>
                        </div>
                        <!-- END COLUMNS -->
                    </div>

                    <!-- PLEIN ECRAN SUR MOBILE -->
                    <div class="mpu-input-field my-4">
                        <label for="mpu_is_mobile_full_screen">Afficher en plein écran sur mobile ?</label>
                        <label class="mpu_switch">
                            <input name="mpu_is_mobile_full_screen" class="mpu_is_mobile_full_screen" type="checkbox" value="1" <?php if (isset($mpu_is_mobile_full_screen)) checked($mpu_is_mobile_full_screen, '1'); ?>>
                            <span class="mpu_slider mpu_round"></span>
                        </label>
                    </div>
                    <!-- COLUMNS START -->
                    <div class="columns" id="mpuMobileFullScreenDivHideByDefault">
                        <!-- Min width -->
                        <div class="mpu-input-field my-4 column is-3 is-flex-direction-row">
                            <label for="mpu_mobile_min_width">Largeur minimale sur mobile : </label>
                            <div class="control">
                                <input class="input is-primary mpu_mobile_min_width" type="number" placeholder="Valeur en pixel" value="<?php if (isset($mpu_mobile_min_width)) echo $mpu_mobile_min_width; ?>">
                            </div>
                        </div>
                        <!-- IF NO, MAX WIDTH -->
                        <div class="mpu-input-field my-4 column is-3 is-flex-direction-row">
                            <label for="mpu_mobile_max_width">Largeur maximale sur mobile : </label>
                            <div class="control">
                                <input class="input is-primary mpu_mobile_max_width" type="number" placeholder="Valeur en pixel" value="<?php if (isset($mpu_mobile_max_width)) echo $mpu_mobile_max_width; ?>">
                            </div>
                        </div>
                        <!-- IF NO, MIN-HEIGHT -->
                        <div class="mpu-input-field my-4 column is-3 is-flex-direction-row">
                            <label for="mpu_mobile_min_height">Hauteur minimum sur mobile</label>
                            <div class="control">
                                <input class="input is-primary mpu_mobile_min_height" type="number" placeholder="Valeur en pixel" value="<?php if (isset($mpu_mobile_min_height)) echo $mpu_mobile_min_height; ?>">
                            </div>
                        </div>
                        <!-- IF NO, HEIGHT -->
                        <div class="mpu-input-field my-4 column is-3 is-flex-direction-row">
                            <label for="mpu_mobile_max_height">Hauteur maximale sur mobile</label>
                            <div class="control">
                                <input class="input is-primary mpu_mobile_max_height" type="number" placeholder="Valeur en pixel" value="<?php if (isset($mpu_mobile_max_height)) echo $mpu_mobile_max_height; ?>">
                            </div>
                        </div>

                        <!-- END COLUMNS -->
                    </div>

                    <!-- COLUMNS START -->
                    <!-- <div class="columns"> -->
                    <!-- IF NO, MAX WIDTH -->
                    <!--//////////////////////////////////////////////// mpu_inner_padding_y TO CREATE PLEASE!!!!!!! -->
                    <!-- <div class="mpu-input-field my-4 column is-3 is-flex-direction-row">
                            <label for="mpu_inner_padding_y">Padding vertical</label>
                            <div class="control">
                                <input class="input is-primary mpu_inner_padding_y" type="number" placeholder="Valeur en pixel">
                            </div>
                        </div> -->
                    <!-- IF NO, HEIGHT -->
                    <!--//////////////////////////////////////////////// mpu_inner_padding_x TO CREATE PLEASE!!!!!!! -->
                    <!-- <div class="mpu-input-field my-4 column is-3 is-flex-direction-row">
                            <label for="mpu_inner_padding_x">Padding Horizontal</label>
                            <div class="control">
                                <input class="input is-primary mpu_inner_padding_x" type="number" placeholder="Valeur en pixel">
                            </div>
                        </div> -->
                    <!-- END COLUMNS -->
                    <!-- </div> -->

                    <!-- COLUMNS START -->
                    <div class="columns">

                        <!-- Text style -->
                        <div class="mpu-input-field my-4 column is-3 is-flex-direction-row">
                            <div class="select is-primary">
                                <label for="mpu_text_style">Style de texte</label>
                                <div class="control">
                                    <select class="mpu_text_style">
                                        <option value="option1" <?php if (isset($mpu_text_style) && $mpu_text_style === 'option1') echo 'selected'; ?>>Style de Texte 1</option>
                                        <option value="option2" <?php if (isset($mpu_text_style) && $mpu_text_style === 'option2') echo 'selected'; ?>>Style de Texte 2</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- TEXT COLOR PICKER -->

                        <div class="mpu-input-field my-4 column is-2 is-flex-direction-row">
                            <label for="mpu_text_color">Couleur du texte</label>
                            <div class="control">
                                <input class="input is-primary mpu_text_color" type="color" placeholder="Valeur" value="<?php if (isset($mpu_text_color)) echo $mpu_text_color; ?>">
                            </div>
                        </div>

                        <!-- Font Family -->
                        <div class="mpu-input-field my-4 column is-3 is-flex-direction-row">
                            <div class="select is-primary">
                                <label for="mpu_font_family">Style de texte</label>
                                <div class="control">
                                    <select class="mpu_font_family">
                                        <option value="fm1" <?php if (isset($mpu_font_family) && $mpu_font_family === 'fm1') echo 'selected'; ?>>Font Family 1</option>
                                        <option value="fm2" <?php if (isset($mpu_font_family) && $mpu_font_family === 'fm2') echo 'selected'; ?>>Font Family 2</option>
                                        <option value="fm3" <?php if (isset($mpu_font_family) && $mpu_font_family === 'fm3') echo 'selected'; ?>>Font Family 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mpu-input-field my-4 column is-3 is-flex-direction-row">
                            <label for="mpu_font_size">Taille de police</label>
                            <div class="control">
                                <input class="input is-primary mpu_font_size" type="number" placeholder="Valeur en pixel" value="<?php if (isset($mpu_font_size)) echo $mpu_font_size; ?>">
                            </div>
                        </div>
                        <!-- ///////////////////////////////////////////////////////////////////////////TO DO NEXT /////////////////////////////////////////////////////////////////-->
                        <!-- END COLUMNS -->
                    </div>

                    <!-- OMBRE SUR TITRE -->
                    TOUS CES CHAMPS SONT POUR LE TITRE
                    <div class="mpu-input-field my-4">
                        <label for="mpu_is_title_shadow">Ajouter une ombre au titre </label>
                        <label class="mpu_switch">
                            <input name="mpu_is_title_shadow" class="mpu_is_title_shadow" type="checkbox" value="1" <?php if (isset($mpu_is_title_shadow)) checked($mpu_is_title_shadow, '1'); ?>>
                            <span class="mpu_slider mpu_round"></span>
                        </label>
                    </div>

                    <!-- COLUMNS START -->
                    <div class="columns" id="mpuShadowTitleDivHideByDefault">

                        <!-- OMBRE style -->
                        <div class="mpu-input-field my-4 column is-3 is-flex-direction-row">
                            <div class="select is-primary">
                                <label for="mpu_title_shadow_type">Style de l'ombre</label>
                                <div class="control">
                                    <select class="mpu_title_shadow_type">
                                        <option value="shadow1" <?php if (isset($mpu_title_shadow_type) && $mpu_title_shadow_type === 'shadow1') echo 'selected'; ?>>Intérieur</option>
                                        <option value="shadow2" <?php if (isset($mpu_title_shadow_type) && $mpu_title_shadow_type === 'shadow2') echo 'selected'; ?>>Extérieur</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- SHADOW COLOR PICKER -->

                        <div class="mpu-input-field my-4 column is-2 is-flex-direction-row">
                            <label for="mpu_title_shadow_color">Couleur de l'ombre</label>
                            <div class="control">
                                <input class="input is-primary mpu_title_shadow_color" type="color" placeholder="Valeur en pixels" value="<?php if (isset($mpu_title_shadow_color)) echo $mpu_title_shadow_color; ?>">
                            </div>
                        </div>

                        <!-- SHADOW SIZE -->
                        <div class="mpu-input-field my-4 column is-3 is-flex-direction-row">
                            <div class="select is-primary">
                                <label for="mpu_title_shadow_size">Taille de l'ombre</label>
                                <div class="control">
                                    <select class="mpu_title_shadow_size">
                                        <option value="size1" <?php if (isset($mpu_title_shadow_size) && $mpu_title_shadow_size === 'size1') echo 'selected'; ?>>Petite</option>
                                        <option value="size2" <?php if (isset($mpu_title_shadow_size) && $mpu_title_shadow_size === 'size2') echo 'selected'; ?>>Medium</option>
                                        <option class="size3" <?php if (isset($mpu_title_shadow_size) && $mpu_title_shadow_size === 'size3') echo 'selected'; ?>>Large</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- A PARTIR DE LA JE NE COMPRENDS PLUS LE FICHIER VISUEL.TXT QUI REPRENDS SUR LE TITRE... ON FAIT QUOI? ON AJOUTE DES CONDITIONS AU TITRE OU ON CONTINUE ICI PAS SÛR QUE CE SOIT LISIBLE -->
                        <!-- END COLUMNS -->
                    </div>

                    <!--  ICI  JE TE METS LES INPUT QU'IL MANQUE POUR LE VISUEL -->
                    <div class="columns">
                        <!-- Style de texte pour le titre  -->
                        <div class="mpu-input-field my-4 column is-2">
                            <div class="select is-primary">
                                <label for="mpu_title_style">Style de texte pour le titre : </label>
                                <div class="control">
                                    <select class="mpu_title_style">
                                        <option value="titre1"
                                        <?php if (isset($mpu_title_style) && $mpu_title_style === 'titre1') echo 'selected'; ?>
                                        >Italic</option>
                                        <option value="titre2"
                                        <?php if (isset($mpu_title_style) && $mpu_title_style === 'titre2') echo 'selected'; ?>
                                        >Souligné</option>
                                        <option value="titre3"
                                        <?php if (isset($mpu_title_style) && $mpu_title_style === 'titre3') echo 'selected'; ?>
                                        >Normal</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Weight pour le titre  -->
                        <div class="mpu-input-field my-4 column is-2">
                            <div class="select is-primary">
                                <label for="mpu_title_weight">Epaisseur du titre : </label>
                                <div class="control">
                                    <select class="mpu_title_weight">
                                        <option value="ep1"
                                        <?php if (isset($mpu_title_weight) && $mpu_title_weight === 'ep1') echo 'selected'; ?>   
                                        >Tight</option>
                                        <option value="ep2"
                                        <?php if (isset($mpu_title_weight) && $mpu_title_weight === 'ep2') echo 'selected'; ?>
                                        >Normal</option>
                                        <option value="ep3"
                                        <?php if (isset($mpu_title_weight) && $mpu_title_weight === 'ep3') echo 'selected'; ?>
                                        >Bold</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Title size -->
                        <div class="mpu-input-field my-4 column is-2">
                            <label for="mpu_title_size">Taille du titre</label>
                            <div class="control">
                                <input class="input is-primary mpu_title_size" type="number" placeholder="Valeur en pixel"
                                value="<?php if (isset($mpu_title_size)) echo $mpu_title_size; ?>"
                                >
                            </div>
                        </div>

                        <!-- Title letter spacing -->
                        <div class="mpu-input-field my-4 column is-2">
                            <label for="mpu_title_letter_spacing">Espacement des lettres du titre : </label>
                            <div class="control">
                                <input class="input is-primary mpu_title_letter_spacing" type="number" placeholder="Valeur en pixel"
                                value="<?php if (isset($mpu_title_letter_spacing)) echo $mpu_title_letter_spacing; ?>"
                                >
                            </div>
                        </div>

                        <!-- Alignement pour le titre  -->
                        <div class="mpu-input-field my-4 column is-2">
                            <div class="select is-primary">
                                <label for="mpu_title_align">Alignement du titre : </label>
                                <div class="control">
                                    <select class="mpu_title_align">
                                        <option value="gauche"
                                        <?php if (isset($mpu_title_align) && $mpu_title_align === 'gauche') echo 'selected'; ?>
                                        >Gauche</option>
                                        <option value="centre"
                                        <?php if (isset($mpu_title_align) && $mpu_title_align === 'centre') echo 'selected'; ?>
                                        >Centre</option>
                                        <option value="droite"
                                        <?php if (isset($mpu_title_align) && $mpu_title_align === 'droite') echo 'selected'; ?>
                                        >Droite</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="columns">
                        <p>Styles supplémentaires</p>
                        <!-- ON SORT DU TITRE ON EST SUR LE CONTENU -->
                        <!-- Alignement du contenu  -->
                        <div class="mpu-input-field my-4 column is-2">
                            <div class="select is-primary">
                                <label for="mpu_content_align">Alignement du contenu : </label>
                                <div class="control">
                                    <select class="mpu_content_align">
                                        <option value="gauche"
                                        <?php if (isset($mpu_content_align) && $mpu_content_align === 'gauche') echo 'selected'; ?>
                                        >Gauche</option>
                                        <option value="centre"
                                        <?php if (isset($mpu_content_align) && $mpu_content_align === 'centre') echo 'selected'; ?>
                                        >Centre</option>
                                        <option value="droite"
                                        <?php if (isset($mpu_content_align) && $mpu_content_align === 'droite') echo 'selected'; ?>
                                        >Droite</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- POUR LE BOUTON -->
                        <!-- Alignement du bouton  -->
                        <div class="mpu-input-field my-4 column is-2">
                            <div class="select is-primary">
                                <label for="mpu_button_align">Alignement du bouton : </label>
                                <div class="control">
                                    <select class="mpu_button_align">
                                        <option value="gauche"
                                        <?php if (isset($mpu_button_align) && $mpu_button_align === 'gauche') echo 'selected'; ?>
                                        >Gauche</option>
                                        <option value="centre"
                                        <?php if (isset($mpu_button_align) && $mpu_button_align === 'centre') echo 'selected'; ?>
                                        >Centre</option>
                                        <option value="droite"
                                        <?php if (isset($mpu_button_align) && $mpu_button_align === 'droite') echo 'selected'; ?>
                                        >Droite</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Arrière plan -->
                    <div class="columns">

                        <div class="mpu-input-field my-4 column is-2">
                            <label for="mpu_inner_background">Arrière plan de la pop-up</label>
                            <div class="control">
                                <label class="radio">
                                    <input type="radio" name="mpu_inner_background" checked class="mpu_inner_background" value="couleur"
                                    <?php if (isset($mpu_inner_background) && $mpu_inner_background === 'couleur') echo 'checked'; ?>
                                    >
                                    Couleur
                                </label>
                                <label class="radio">
                                    <input type="radio" name="mpu_inner_background" class="mpu_inner_background" value="image"
                                    <?php if (isset($mpu_inner_background) && $mpu_inner_background === 'image') echo 'checked'; ?>
                                    >
                                    Image
                                </label>
                                <label class="radio">
                                    <input type="radio" name="mpu_inner_background" class="mpu_inner_background" value="transparent"
                                    <?php if (isset($mpu_inner_background) && $mpu_inner_background === 'transparent') echo 'checked'; ?>
                                    >
                                    Transparent
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- Si choix de la couleur -->
                    <div class="columns" id="mpuInnerBackgroundDivHideByDefaultColor">
                        <div class="mpu-input-field my-4 column is-2 is-flex-direction-row">
                            <label for="mpu_inner_background_color">Couleur de l'arrière plan</label>
                            <div class="control">
                                <input class="input is-primary mpu_inner_background_color" type="color" placeholder="Valeur en pixels"
                                value="<?php if (isset($mpu_inner_background_color)) echo $mpu_inner_background_color; ?>"
                                >
                            </div>
                        </div>
                    </div>
                    <!-- Si choix de l'image -->
                    <div class="columns" id="mpuInnerBackgroundDivHideByDefaultImage">
                        <div class="mpu-input-field my-4 column is-3 is-flex-direction-row">
                            <img class="mpu_inner_background_image_preview " id="image_preview" src="<?php if (isset($mpu_inner_background_image)) echo $mpu_inner_background_image; ?>" alt="Aperçu de l'image" />
                            <button class="button is-primary mpu_inner_background_image_media_open" class="button">Sélectionner une image</button>
                        </div>
                        <!-- Style de recouvrement d'image -->
                        <div class="mpu-input-field my-4 column is-3 is-flex-direction-row">
                            <div class="select is-primary">
                                <label for="mpu_inner_background_image_style">Style de l'image : </label>
                                <div class="control">
                                    <select class="mpu_inner_background_image_style">
                                        <option value="cover"
                                        <?php if (isset($mpu_inner_background_image_style) && $mpu_inner_background_image_style === 'cover') echo 'selected'; ?>
                                        >Cover</option>
                                        <option value="contain"
                                        <?php if (isset($mpu_inner_background_image_style) && $mpu_inner_background_image_style === 'contain') echo 'selected'; ?>
                                        >Contain</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Choix de la bordure -->
                    <div class="columns">
                        <div class="mpu-input-field my-4 column is-2">
                            <label for="mpu_border_style">Style de la bordure</label>
                            <div class="control">
                                <label class="radio">
                                    <input type="radio" name="mpu_border_style" checked class="mpu_border_style" value="none"
                                    <?php if (isset($mpu_border_style) && $mpu_border_style === 'none') echo 'checked'; ?>
                                    >
                                    Aucune
                                </label>
                                <label class="radio">
                                    <input type="radio" name="mpu_border_style" class="mpu_border_style" value="solid"
                                    <?php if (isset($mpu_border_style) && $mpu_border_style === 'solid') echo 'checked'; ?>
                                    >
                                    Solide
                                </label>
                                <label class="radio">
                                    <input type="radio" name="mpu_border_style" class="mpu_border_style" value="thick double"
                                    <?php if (isset($mpu_border_style) && $mpu_border_style === 'thick double') echo 'checked'; ?>
                                    >
                                    Doublée
                                </label>
                                <label class="radio">
                                    <input type="radio" name="mpu_border_style" class="mpu_border_style" value="dashed"
                                    <?php if (isset($mpu_border_style) && $mpu_border_style === 'dashed') echo 'checked'; ?>
                                    >
                                    Hachurée
                                </label>
                                <label class="radio">
                                    <input type="radio" name="mpu_border_style" class="mpu_border_style" value="rigde"
                                    <?php if (isset($mpu_border_style) && $mpu_border_style === 'rigde') echo 'checked'; ?>
                                    >
                                    Ridge
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Si !none Choix de la couleur -->
                    <div class="columns" id="mpuBorderStyleDivHideByDefaultColor">
                        <div class="mpu-input-field my-4 column is-2 is-flex-direction-row">
                            <label for="mpu_border_color">Couleur de la bordure</label>
                            <div class="control">
                                <input class="input is-primary mpu_border_color" type="color"
                                value="<?php if (isset($mpu_border_color)) echo $mpu_border_color; ?>"
                                >
                            </div>
                        </div>
                    </div>

                    <!-- Si !none choix du weight -->
                    <div class="columns" id="mpuBorderStyleDivHideByDefaultWeight">
                        <div class="mpu-input-field my-4 column is-3 is-flex-direction-row">
                            <label for="mpu_border_weight">Epaisseur de la bordure</label>
                            <div class="control">
                                <input class="input is-primary mpu_border_weight" type="number" placeholder="Valeur en pixel"
                                value="<?php if (isset($mpu_border_weight)) echo $mpu_border_weight; ?>"
                                >
                            </div>
                        </div>
                    </div>

                    <!-- Choix de l'animation d'ouverture/fermeture -->
                    <div class="columns">
                        <div class="mpu-input-field my-4 column is-2">
                            <div class="select is-primary">
                                <label for="mpu_animation_opening">Animation à l'ouverture/fermeture : </label>
                                <div class="control">
                                    <select class="mpu_animation_opening">
                                        <option value="ouv1"
                                        <?php if (isset($mpu_animation_opening) && $mpu_animation_opening === 'ouv1') echo 'selected'; ?>
                                        >Choix 1</option>
                                        <option value="ouv2"
                                        <?php if (isset($mpu_animation_opening) && $mpu_animation_opening === 'ouv2') echo 'selected'; ?>
                                        >Choix 2</option>
                                        <option value="ouv3"
                                        <?php if (isset($mpu_animation_opening) && $mpu_animation_opening === 'ouv3') echo 'selected'; ?>
                                        >Choix 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- MENU CONDITIONS -->
                <div class="mpu-conditions-section">


                    <!-- PROGRAMMER LE POP-UP? -->
                    <div class="mpu-input-field my-4">
                        <label for="mpu_is_automatic_programed">Programmer le Pop-Up?</label>
                        <label class="mpu_switch">
                            <input name="mpu_is_automatic_programed" class="mpu_is_automatic_programed" type="checkbox" value="1">
                            <span class="mpu_slider mpu_round"></span>
                        </label>
                    </div>

                    <!-- COLUMNS START -->
                    <div class="columns">

                        <!-- DATE DEBUT -->
                        <div class="mpu-input-field my-4 column is-2 is-flex-direction-row">
                            <label for="mpu_automatic_programed_start">Date de début</label>
                            <div class="control">
                                <input class="input is-primary mpu_automatic_programed_start" type="date" placeholder="Date de début">
                            </div>
                        </div>
                        <!-- DATE FIN -->

                        <div class="mpu-input-field my-4 column is-2 is-flex-direction-row">
                            <label for="mpu_automatic_programed_end">Date de fin</label>
                            <div class="control">
                                <input class="input is-primary mpu_automatic_programed_end" type="date" placeholder="Date de fin">
                            </div>
                        </div>

                        <!-- COLUMN END -->
                    </div>

                    <!-- CONDITIONS TO BE TRIGGERED -->
                    <div class="mpu-input-field my-4">
                        <label for="mpu_is_triggered">Choisir les modes de déclenchement du Pop-Up</label>
                        <label class="mpu_switch">
                            <input name="mpu_is_triggered" class="mpu_is_triggered" type="checkbox" value="1">
                            <span class="mpu_slider mpu_round"></span>
                        </label>
                    </div>

                    <!-- ONLOAD -->
                    <div class="mpu-input-field my-4">
                        <label for="mpu_is_triggered_onload">Au chargement de la page</label>
                        <label class="mpu_switch">
                            <input name="mpu_is_triggered_onload" class="mpu_is_triggered_onload" type="checkbox" value="onload">
                            <span class="mpu_slider mpu_round"></span>
                        </label>
                    </div>

                    <!-- DELAY -->

                    <div class="mpu-input-field my-4 column is-2 is-flex-direction-row">
                        <label for="mpu_is_triggered_onload_delay">Durée avant déclenchement</label>
                        <div class="control">
                            <input class="input is-primary mpu_is_triggered_onload" type="number" placeholder="En secondes">
                        </div>
                    </div>

                    <!-- ONCLICK -->
                    <div class="mpu-input-field my-4">
                        <label for="mpu_is_triggered_onclick">Au clic</label>
                        <label class="mpu_switch">
                            <input name="mpu_is_triggered_onclick" class="mpu_is_triggered_onclick" type="checkbox" value="onclick">
                            <span class="mpu_slider mpu_round"></span>
                        </label>
                    </div>


                    <!-- ONHOVER -->
                    <div class="mpu-input-field my-4">
                        <label for="mpu_is_triggered_onhover">au passage de la souris</label>
                        <label class="mpu_switch">
                            <input name="mpu_is_triggered_onhover" class="mpu_is_triggered_onhover" type="checkbox" value="onhover">
                            <span class="mpu_slider mpu_round"></span>
                        </label>
                    </div>

                    <!-- ID FOR HOVER -->

                    <div class="mpu-input-field my-4 column is-4 is-flex-direction-row">
                        <label for="mpu_is_triggered_onhover_id">Choisissez l'id qui déclenchera le Pop-Up au passage de la souris</label>
                        <div class="control">
                            <input class="input is-primary mpu_is_triggered_onhover_id" type="text" placeholder="ID qui déclenchera le Pop-Up">
                        </div>
                    </div>

                    <!-- AFTER VISITING X PAGES -->
                    <div class="mpu-input-field my-4">
                        <label for="mpu_is_triggered_after_visiting_x_pages">Après un nombre de pages visitées</label>
                        <label class="mpu_switch">
                            <input name="mpu_is_triggered_after_visiting_x_pages" class="mpu_is_triggered_after_visiting_x_pages" type="checkbox" value="1">
                            <span class="mpu_slider mpu_round"></span>
                        </label>
                    </div>

                    <!-- NUMBER OF PAGES -->

                    <div class="mpu-input-field my-4 column is-4 is-flex-direction-row">
                        <label for="mpu_is_triggered_after_visiting_x_pages_number">Nombre de pages visitées avant le déclenchement du Pop-Up</label>
                        <div class="control">
                            <input class="input is-primary mpu_is_triggered_after_visiting_x_pages_number" type="number" placeholder="Nombre de pages avant le déclenchement">
                        </div>
                    </div>


                    <!-- AFTER INACTIVITY -->
                    <div class="mpu-input-field my-4">
                        <label for="mpu_is_triggered_after_inactivity">Après un moment d'inactivité</label>
                        <label class="mpu_switch">
                            <input name="mpu_is_triggered_after_inactivity" class="mpu_is_triggered_after_inactivity" type="checkbox" value="1">
                            <span class="mpu_slider mpu_round"></span>
                        </label>
                    </div>

                    <!-- TIME OF INACTIVITY -->

                    <div class="mpu-input-field my-4 column is-4 is-flex-direction-row">
                        <label for="mpu_is_triggered_after_inactivity_delay">Durée d'inactivité avant déclenchement en secondes</label>
                        <div class="control">
                            <input class="input is-primary mpu_is_triggered_after_inactivity_delay" type="number" placeholder="inactivité avant déclenchement en secondes">
                        </div>
                    </div>


                    <!-- SCROLLING TO ELEMENT -->
                    <div class="mpu-input-field my-4">
                        <label for="mpu_is_triggered_after_scrolling_to_element">Après un scroll vers un élément</label>
                        <label class="mpu_switch">
                            <input name="mpu_is_triggered_after_scrolling_to_element" class="mpu_is_triggered_after_scrolling_to_element" type="checkbox" value="1">
                            <span class="mpu_slider mpu_round"></span>
                        </label>
                    </div>

                    <!-- WHICH ELEMENT -->

                    <div class="mpu-input-field my-4 column is-4 is-flex-direction-row">
                        <label for="mpu_is_triggered_after_scrolling_to_element_id">Elément concerné par le déclenchement on-scroll</label>
                        <div class="control">
                            <input class="input is-primary mpu_is_triggered_after_scrolling_to_element_id" type="text" placeholder="ID de l'élément déclencheur">
                        </div>
                    </div>

                    <!-- SCROLLING DOWN -->
                    <div class="mpu-input-field my-4">
                        <label for="mpu_is_triggered_after_scrolling_down">Après un scroll sur la page</label>
                        <label class="mpu_switch">
                            <input name="mpu_is_triggered_after_scrolling_down" class="mpu_is_triggered_after_scrolling_down" type="checkbox" value="1">
                            <span class="mpu_slider mpu_round"></span>
                        </label>
                    </div>

                    <!-- PERCENTAGE FROM THE END OF THE PAGE -->

                    <div class="mpu-input-field my-4 column is-4 is-flex-direction-row">
                        <label for="mpu_is_triggered_after_scrolling_down_percentage">Pourcentage avant le bas de la page qui déclenche le Pop-Up</label>
                        <div class="control">
                            <input class="input is-primary mpu_is_triggered_after_scrolling_down_percentage" type="number" placeholder="Pourcentage avant la fin de la page">
                        </div>
                    </div>

                    <!-- CLOSING MODE -->
                    <div class="mpu-input-field my-4 column is-3 is-flex-direction-row">
                        <h3 class="my-4">Déclenchement de fermeture du Pop Up</h3>
                        <div class="mpu_closing_way">
                            <label class="checkbox mb-2">
                                <input type="checkbox" class="mpu_closing_way_esc">
                                En appuyant sur échap
                            </label>

                            <label class="checkbox mb-2">
                                <input type="checkbox" class="mpu_closing_way_outofthebox">
                                En cliquant hors du Pop-Up
                            </label>

                            <label class="checkbox mb-2">
                                <input type="checkbox" class="mpu_closing_way_buttonclose">
                                En cliquant sur le bouton fermer du Pop-Up
                            </label>

                            <label class="checkbox mb-2">
                                <input type="checkbox" class="mpu_closing_way_afterdelay">
                                Après un délai
                            </label>
                            <label class="delay mt-3">
                                <h2>Combien de temps?</h2>
                                <input class="input is-primary" type="number" placeholder="Délai en secondes" class="mpu_closing_way_afterdelay_set">
                            </label>
                        </div>
                    </div>



                </div>
                <!-- MENU OPTION SUPPLEMENTAIRES -->
                <div class="mpu-options-supp-section">

                    <!-- Sound openning -->
                    <div class="columns">
                        <div class="mpu-input-field my-4">
                            <label for="mpu_is_sound_on_open">Activer le son à l'ouverture ?</label>
                            <label class="mpu_switch">
                                <input name="mpu_is_sound_on_open" class="mpu_is_sound_on_open" type="checkbox" value="1"
                                <?php if (isset($mpu_is_sound_on_open)) checked($mpu_is_sound_on_open, '1'); ?>
                                >
                                <span class="mpu_slider mpu_round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="columns" id="mpuOpeningSoundDivHideByDefault">
                        <div>
                            <button class="button is-primary mpu_sound_opening_media_open">Sélectionner un fichier audio</button>
                            <div class="my-4">
                            <audio class="sound_opening_preview" controls
                                <?php if (isset($mpu_sound_open)) : ?>
                                    src="<?php echo $mpu_sound_open; ?>"
                                <?php endif; ?>
                            ></audio>
                            </div>

                        </div>
                    </div>

                    <!--  Sound closing -->
                    <div class="columns">
                        <div class="mpu-input-field my-4">
                            <label for="mpu_is_sound_on_closing">Activer le son à la fermeture ?</label>
                            <label class="mpu_switch">
                                <input name="mpu_is_sound_on_closing" class="mpu_is_sound_on_closing" type="checkbox" value="1"
                                <?php if (isset($mpu_is_sound_on_closing)) checked($mpu_is_sound_on_closing, '1'); ?>
                                >
                                <span class="mpu_slider mpu_round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="columns" id="mpuClosingSoundDivHideByDefault">
                        <div class="">
                            <button class="button is-primary mpu_sound_closing_media_open">Sélectionner un fichier audio</button>
                            <div class="my-4">
                                <audio class="sound_closing_preview" controls
                                    <?php if (isset($mpu_sound_closing)) : ?>
                                        src="<?php echo $mpu_sound_closing; ?>"
                                    <?php endif; ?>
                                ></audio>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>


    <?php
}
