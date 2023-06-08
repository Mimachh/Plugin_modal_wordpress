<?php

/**
 * Plugin Name:     My PopUp
 * Version:         1
 * Plugin URI:      
 * Description:     Build graphical popups using your own forms
 * Author:          Karl Muller  && Franck Vienot
 * Author URI:      
 * License:         GPL2
 * License URI:     https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:     myPopUp
 * Domain Path:     /languages
 *
 * @package         My_PopUp
 */


// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
const MYPOPUP_VERSION = '1.0.0';

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_myPopUp()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-myPopUp-activator.php';
    MyPopUp_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivate_myPopUp()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-myPopUp-deactivator.php';
    MyPopUp_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_myPopUp');
register_deactivation_hook(__FILE__, 'deactivate_myPopUp');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-myPopUp.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_myPopUp()
{

    $plugin = new MyPopUp();
    $plugin->run();
}
run_myPopUp();

//backend style
function enqueue_admin_styles()
{
        // Pour ouvrir la mediatheque
        wp_enqueue_media(); // Utilisez la fonction wp_enqueue_media() pour charger les scripts nécessaires
 
    // Scripts relié au formulaire de shortcode 
    wp_enqueue_script('myPopUp-admin-form-validate-fields', plugin_dir_url(__FILE__) . 'js/myPopUp-admin-event-listener-form/additional-functions/handle-form-fields-display.js', array(), '1.0', true);
    wp_enqueue_script('myPopUp-admin-form-hide-and-display', plugin_dir_url(__FILE__) . 'js/myPopUp-admin-event-listener-form/additional-functions/hide-display-fields.js', array(), '1.0', true);
    wp_enqueue_script('myPopUp-admin-form-validate-fields', plugin_dir_url(__FILE__) . 'js/myPopUp-admin-event-listener-form/additional-functions/validate-fields.js', array(), '1.0', true);
    
    
    wp_enqueue_style('myPopUp-admin-css', plugin_dir_url(__FILE__) . 'css/myPopUp-admin.css');
    wp_enqueue_script('myPopUp-admin-js', plugin_dir_url(__FILE__) . 'js/myPopUp-admin.js');
    wp_enqueue_script('myPopUp-admin-options-js', plugin_dir_url(__FILE__) . 'js/myPopUp-admin-options.js');




    wp_localize_script('myPopUp-admin-js', 'siteData', array(
        'root_url' => get_site_url(),
        'nonce' => wp_create_nonce('wp_rest'),
    ));
}
add_action('admin_enqueue_scripts', 'enqueue_admin_styles');


//frontend style
function enqueue_public_styles()
{
    wp_enqueue_style('myPopUp-public', plugin_dir_url(__FILE__) . 'css/myPopUp-public.css');
    wp_enqueue_script('myPopUp-public-js', plugin_dir_url(__FILE__) . 'js/myPopUp-public.js');
}
add_action('wp_enqueue_scripts', 'enqueue_public_styles');


//include mpu-functions.php
require_once plugin_dir_path(__FILE__) . 'includes/mpu-functions.php';


//include la première modale
require_once plugin_dir_path(__FILE__) . 'public/create-modal.php';

//include le custom post type
require_once plugin_dir_path(__FILE__) . 'admin/myPopUp-post-type/init.php';

// save les custom fields
require_once plugin_dir_path(__FILE__) . 'admin/myPopUp-post-type/custom-fields/mpu-save-custom-fields.php';

//include les custom field activation
require_once plugin_dir_path(__FILE__) . 'admin/myPopUp-post-type/custom-fields/activation/init.php';

//include les custom field visuel
require_once plugin_dir_path(__FILE__) . 'admin/myPopUp-post-type/custom-fields/visuel/init.php';

// Display Shortcode list on main page
require_once plugin_dir_path(__FILE__) . 'admin/myPopUp-post-type/display_list_on_main_page.php';
// Api rest route
require_once plugin_dir_path(__FILE__) . 'admin/api-route/mpu-shortcode-route.php';
require_once(ABSPATH . 'wp-config.php');