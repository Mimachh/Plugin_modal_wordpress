<?php
function myPopUp_options_page_html()
{
    require_once dirname(dirname(__FILE__)) . '/admin/partials/my-popup-navbar.php';

?>
    <div class="mpu-wrapper has-background-info">
    <div class="wrap">
        <?php myPopUp_navbar(); ?>
        <h1 class="mb-5"><?php echo esc_html(get_admin_page_title()); ?></h1>

        <div class="tabs is-centered is-box is-medium mt-6">
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
                echo 'id:' . $post_id;
                echo 'le titre récupéré est : ' . $post_title;
            ?>
                <input type="hidden" value="<?php echo $post_id; ?>" class="mpu_shortcode_id">
                <button type="submit" class="mpu_save_edit_button">Nouveau bouton edit</button>
            <?php }
            ?>
            <div class="mpu_title-error-message" style="color: red; display: none;"></div>


            <div class="field">
                <!-- formulaire de création de la première modale -->
                <label for="mpu_shortcode_title">Titre du shortcode :</label>
                <div class="control">
                    <input type="text" name="post_title" class="input is-primary mpu_post_title" id="mpu_shortcode_title" value="<?php if(isset($post_title)) echo $post_title; ?>" placeholder="" required>
                </div>
            </div>

            <div class="mpu-input-field my-4">
                <label for="mpu_activate">Activer le Shortcode</label>
                <label class="mpu_switch">
                    <input name="mpu_activate" class="mpu_activate" type="checkbox" value="1">
                    <span class="mpu_slider mpu_round"></span>
                </label>
            </div>

            <div class="mpu-input-field my-4">
                <label for="mpu_is_all_pages">Afficher sur toutes les pages ?</label>
                <label class="mpu_switch">
                    <input name="mpu_is_all_pages" class="mpu_is_all_pages" type="checkbox" value="1">
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
                ?>
                    <div>
                        <input type="checkbox" name="mpu_is_except[]" class="mpu_is_except" value="<?php echo $page_id; ?>"> <?php echo $page_title; ?>
                    </div>
                <?php }
                ?>
            </div>

            <!-- All articles -->
            <div class="mpu-input-field my-4">
                <label for="mpu_is_all_articles">Afficher sur tous les articles ?</label>
                <label class="mpu_switch">
                    <input name="mpu_is_all_articles" class="mpu_is_all_articles" type="checkbox">
                    <span class="mpu_slider mpu_round"></span>
                </label>
            </div>


            <button type="submit" class="mpu_submit">Submit</button>

            <!--FORM VISUEL-->
            <!-- ADD LOGO -->
            <div class="mpu-input-field my-4">
                <label for="mpu_add_site_logo">Ajouter le logo</label>
                <label class="mpu_switch">
                    <input name="mpu_add_site_logo" class="mpu_add_site_logo" type="checkbox" value="1">
                    <span class="mpu_slider mpu_round"></span>
                </label>
            </div>
         
            <!-- Bouton pour ouvrir la mediatheque  -->
            <div class="mpu-input-field my-4">
                <img class="mpu_custom_logo_preview" id="image_preview" src="" alt="Aperçu de l'image" />
                <button class="mpu_custom_logo_media_open" class="button">Sélectionner une image</button>
            </div>
            
            <!-- UPLOAD FICHIER -->
            <div class="file is-boxed is-primary">
                <label class="file-label">
                    <input class="file-input mpu_custom_logo" type="file" name="resume mpu_custom_logo">
                    <span class="file-cta">
                        <span class="file-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-cloud-arrow-up-fill" viewBox="0 0 16 16">
                                <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm2.354 5.146a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2z" />
                            </svg>
                        </span>
                        <span class="file-label">
                            Choisissez-votre fichier…
                        </span>
                    </span>
                </label>
            </div>
            <!-- SHOW TITLE -->
            <div class="mpu-input-field my-4">
                <label for="mpu_is_title_visible">Afficher le titre</label>
                <label class="mpu_switch">
                    <input name="mpu_is_title_visible" class="mpu_is_title_visible" type="checkbox" value="1">
                    <span class="mpu_slider mpu_round"></span>
                </label>
            </div>
            <!-- TITRE POPUP -->
            <div class="mpu-input-field my-4">
                <label for="mpu_header_title">Titre du Pop-Up</label>
                <div class="control">
                    <input class="input is-primary mpu_header_title" type="text" placeholder="Titre">
                </div>
            </div>
            <!-- SHOW DESCRIPTION -->
            <div class="mpu-input-field my-4">
                <label for="mpu_is_body_content_visible">Afficher le contenu custom</label>
                <label class="mpu_switch">
                    <input name="mpu_is_body_content_visible" class="mpu_is_body_content_visible" type="checkbox" value="1">
                    <span class="mpu_slider mpu_round"></span>
                </label>
            </div>
            <!-- CUSTOM CONTENT -->
            <div class="mpu-input-field my-4">
                <label for="mpu_body_content">Custom content</label>
                <div class="control">
                    <textarea class="textarea is-primary mpu_body_content" type="text" placeholder="Titre"></textarea>
                </div>
            </div>
            <!-- SHOW DESCRIPTION -->
            <div class="mpu-input-field my-4">
                <label for="mpu_is_description_visible">Afficher la description</label>
                <label class="mpu_switch">
                    <input name="mpu_is_description_visible" class="mpu_is_description_visible" type="checkbox" value="1">
                    <span class="mpu_slider mpu_round"></span>
                </label>
            </div>
            <!-- DESCRIPTION -->
            <div class="mpu-input-field my-4">
                <label for="mpu_description">Custom Description</label>
                <div class="control">
                    <textarea class="textarea is-primary mpu_description" type="text" placeholder="Titre"></textarea>
                </div>
            </div>
            <!-- OVERLAY -->
            <div class="columns">
                <div class="mpu-input-field my-4 column is-1">
                    <label for="mpu_overlay">Overlay</label>
                    <div class="control">
                        <div class="select is-primary">
                            <select class="mpu_overlay">
                                <option value="1">Overlay 1</option>
                                <option value="2">Overlay 2</option>
                                <option value="3">Overlay 3</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- BACKDROP -->
                <div class="mpu-input-field my-4 column is-2">
                    <label for="mpu_overlay_opacity_value">Opacité</label>
                    <div class="control">
                        <input class="input is-primary mpu_overlay_opacity_value" type="number" placeholder="Valeur">
                    </div>
                </div>
                <!-- BACKDROP COLORPICKER -->
                <div class="mpu-input-field my-4 column is-2">
                    <label for="mpu_overlay_color">Couleur</label>
                    <div class="control">
                        <input class="input is-primary mpu_overlay_color" type="color" placeholder="Valeur">
                    </div>
                </div>
                <!-- BLUR VALUE -->
                <div class="mpu-input-field my-4 column is-2">
                    <label for="mpu_overlay_blur_value">Flou</label>
                    <div class="control">
                        <input class="input is-primary mpu_overlay_blur_value" type="number" placeholder="Valeur">
                    </div>
                </div>
            </div>
            <!-- Auteur visible -->
            <div class="mpu-input-field my-4">
                <label for="mpu_is_author_visible">Afficher l'auteur</label>
                <label class="mpu_switch">
                    <input name="mpu_is_author_visible" class="mpu_is_author_visible" type="checkbox" value="1">
                    <span class="mpu_slider mpu_round"></span>
                </label>
            </div>
            <!-- Template choice -->
            <div class="mpu-input-field my-4 column is-3">
                <label for="mpu_template_choice">Template</label>
                <div class="control">
                    <div class="select is-primary ">
                        <select class="mpu_template_choice">
                            <option value="1">Template 1</option>
                            <option value="2">Template 2</option>
                            <option value="3">Template 3</option>
                        </select>
                    </div>
                </div>
            </div>


            <!-- Is full screen -->
            <div class="mpu-input-field my-4 column is-3">
                <label for="mpu_is_desktop_full_screen">Afficher le pop-up en plein écran</label>
                <label class="mpu_switch">
                    <input name="mpu_is_desktop_full_screen" class="mpu_is_desktop_full_screen" type="checkbox" value="1">
                    <span class="mpu_slider mpu_round"></span>
                </label>
            </div>
            <!-- COLUMNS START -->
            <div class="columns">
                <!-- IF NO, WIDTH -->
                <div class="mpu-input-field my-4 column is-3 is-flex-direction-row">
                    <label for="mpu_desktop_width">Largeur</label>
                    <div class="control">
                        <input class="input is-primary mpu_desktop_width" type="number" placeholder="Valeur en pixel">
                    </div>
                </div>
                <!-- IF NO, HEIGHT -->
                <div class="mpu-input-field my-4 column is-3 is-flex-direction-row">
                    <label for="mpu_desktop_height">Hauteur</label>
                    <div class="control">
                        <input class="input is-primary mpu_desktop_height" type="number" placeholder="Valeur en pixel">
                    </div>
                </div>
                <!-- IF NO, MIN-HEIGHT -->
                <div class="mpu-input-field my-4 column is-3 is-flex-direction-row">
                    <label for="mpu_desktop_min_height">Hauteur minimum</label>
                    <div class="control">
                        <input class="input is-primary mpu_desktop_min_height" type="number" placeholder="Valeur en pixel">
                    </div>
                </div>
                <!-- END COLUMNS -->
            </div>

        </div>

    </div>

    </div>


<?php
}
