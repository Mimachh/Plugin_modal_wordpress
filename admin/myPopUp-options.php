<?php
function myPopUp_options_page_html()
{
?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <form action="options.php" method="post">
<<<<<<< HEAD
            
=======
            Veuillez choisir vos options
>>>>>>> 155788b164968218ca1e15e541c49762cbc812aa
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
<?php
}
