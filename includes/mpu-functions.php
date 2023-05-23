<?php

require_once dirname(dirname(__FILE__)) . '/admin/myPopUp-main.php';
require_once dirname(dirname(__FILE__)) . '/admin/myPopUp-options.php';

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
        'admin-main-page', // The 'slug' - file to display when clicking the link
        'myPopUp_main_page_html'
    );
}


// Hook to submenu
add_action('admin_menu', 'myPopUp_options_page');
function myPopUp_options_page()
{
    add_submenu_page(
        'admin-main-page', // slug parent
        'myPopUp Options', // header title
        'Options', // nom du sous menu
        'manage_options', // capability
        'myPopUp-options', // URL slug
        'myPopUp_options_page_html' // callback
    );
}



