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

            <label for="mpu_shortcode_title">Titre du shortcode :</label>
            <input type="text" name="post_title" class="mpu_post_title" id="mpu_shortcode_title" required>
            
            <div>
                <input type="checkbox" class="mpu_activate" value="1" name="mpu_activate">
                <label for="mpu_activate">Activer le Shortcode</label>
            </div>

            <div>
                <input type="checkbox" class="mpu_is_all_pages" value="1" name="mpu_is_all_pages">
                <label for="mpu_is_all_pages">Afficher sur toutes les pages ? (articles compris ?)</label>
            </div>

            <div>
                <label for="mpu-is-include">Inclure :</label>
                <?php
                $mpu_pages = get_pages();

                foreach ($mpu_pages as $page) {
                    $page_id = $page->ID;
                    $page_title = $page->post_title;
                    ?>
                        <input type="checkbox" name="mpu_is_include[]" class="mpu_is_include" value="<?php echo $page_id; ?>"> <?php echo $page_title; ?>
                <?php }
                ?>
            </div>

            <div>
                <label for="mpu-is-except">Except:</label>
                <?php
                    $mpu_pages = get_pages();

                    foreach ($mpu_pages as $page) {
                        $page_id = $page->ID;
                        $page_title = $page->post_title;
                        ?>
                            <input type="checkbox" name="mpu_is_except[]" class="mpu_is_except" value="<?php echo $page_id; ?>"> <?php echo $page_title; ?>
                    <?php }
                ?>
            </div>

            <button type="submit" class="mpu_submit">Submit</button>
            <form class="my-5" action="options.php" method="post">

                <div class="field">
                    <!-- formulaire de création de la première modale -->
                    <label for="form_modal_title">Titre de la modale</label>
                    <div class="control">
                        <input class="input is primary" type="text" name="mpu_modal_title" id="mpu_modal_title" value="<?php echo get_option('mpu_modal_title'); ?>" />
                    </div>
                </div>
                <div class="field">
                    <label for="form_modal_subtitle">blabla</label>
                    <div class="select is-primary mx-4 my-4">
                        <div class="control">
                            <select class="is-hovered" name="">
                                <option>margin</option>
                                <option>With options</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label for="form_modal_subtitle">blabla</label>
                    <div class="select is-primary mx-4 my-4">
                        <div class="control">
                            <select class="is-hovered" name="">
                                <option>padding</option>
                                <option>With options</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label class="checkbox my-4">
                        <div class="control">
                            <input type="checkbox">
                            activer la modale
                        </div>
                    </label>
                </div>
                <div class="field">
                    <div class="control">
                        <label class="radio">Ajuster un truc
                            <input type="radio" name="foobar">
                            Foo
                        </label>
                        <label class="radio">
                            <input type="radio" name="foobar" checked>
                            Bar
                        </label>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <label class="radio">Ajuster un autre truc
                            <input type="radio" name="foobar">
                            Foo
                        </label>
                        <label class="radio">
                            <input type="radio" name="foobar" checked>
                            Bar
                        </label>
                    </div>
                </div>


                <?php
                // output security fields for the registered setting "myPopUp_options"
                settings_fields('myPopUp_options');
                // output setting sections and their fields
                // (sections are registered for "myPopUp", each field is registered to a specific section)
                do_settings_sections('myPopUp');
                // output save settings button
                submit_button(__('Save Settings', 'textdomain'));
                ?>
            </form>
        </div>
    </div>
<?php
}
