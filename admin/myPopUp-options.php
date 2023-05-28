<?php
function myPopUp_options_page_html()
{
?>
    <div class="wrap">
        <h1 class="mb-5"><?php echo esc_html(get_admin_page_title()); ?></h1>

        <div class="tabs is-centered is-box is-medium mt-6">
            <ul>
                <li class="is-active mpu-activation"><a>Activation</a></li>
                <li><a class="mpu-visuel">Visuel</a></li>
                <li><a class="mpu-conditions">conditions</a></li>
                <li><a class="mpu-options-supp">Options supplémentaires</a></li>
            </ul>
        </div>

        <div class="container is-fluid">
            <div class="mpu_title-error-message" style="color: red; display: none;"></div>


            <div class="field">
                    <!-- formulaire de création de la première modale -->
                <label for="mpu_shortcode_title">Titre du shortcode :</label>
                <div class="control">
                    <input type="text" name="post_title" class="input is primary mpu_post_title" id="mpu_shortcode_title" value="<?php echo get_option('post_title'); ?>" required>
                </div>
            </div>

            <div class="mpu-input-field">
                <label for="mpu_activate">Activer le Shortcode</label>
                <label class="mpu_switch">
                    <input name="mpu_activate" 
                    class="mpu_activate"
                    type="checkbox" 
                    value="1"
                    >
                    <span class="mpu_slider mpu_round"></span>
                </label>
            </div>

            <div class="mpu-input-field">
                <label for="mpu_is_all_pages">Afficher sur toutes les pages ?</label>
                <label class="mpu_switch">
                    <input name="mpu_is_all_pages" 
                    class="mpu_is_all_pages"
                    type="checkbox" 
                    value="1"
                    >
                    <span class="mpu_slider mpu_round"></span>
                </label>
            </div>

            <div class="mpu_inclure_div">
                <label for="mpu-is-include">Inclure :</label>
                <?php
                $mpu_pages = get_pages();

                foreach ($mpu_pages as $page) {
                    $page_id = $page->ID;
                    $page_title = $page->post_title;
                    ?>
                        <div>
                            <input type="checkbox" name="mpu_is_include[]" class="mpu_is_include" value="<?php echo $page_id; ?>"> <?php echo $page_title; ?>
                        </div>
                        
                <?php }
                ?>
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
            <div class="mpu-input-field">
                <label for="mpu_is_all_articles">Afficher sur tous les articles ?</label>
                <label class="mpu_switch">
                    <input name="mpu_is_all_articles" 
                    class="mpu_is_all_articles"
                    type="checkbox" 
                    value="1"
                    >
                    <span class="mpu_slider mpu_round"></span>
                </label>
            </div>


            <button type="submit" class="mpu_submit">Submit</button>
        </div>
    </div>
<?php
}
