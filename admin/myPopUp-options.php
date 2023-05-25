<?php
function myPopUp_options_page_html()
{
?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <div class="container is-fluid">
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
