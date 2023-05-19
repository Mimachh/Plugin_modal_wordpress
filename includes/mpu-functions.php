<?php
/*
 * Add my new menu to the Admin Control Panel
 */

// Hook the 'admin_menu' action hook, run the function named 'mfp_Add_My_Admin_Link()'
add_action('admin_menu', 'mpu_Add_My_Admin_Link');


// Add a new top level menu link to the ACP
function mpu_Add_My_Admin_Link()
{
    add_menu_page(
        'MyPopUp', // Title of the page
        'MyPopUp', // Text to show on the menu link
        'manage_options', // Capability requirement to see the link
        'includes/mpu-first-acp-page.php' // The 'slug' - file to display when clicking the link
    );
}
