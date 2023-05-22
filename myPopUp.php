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

//include mpu-functions.php
require_once plugin_dir_path(__FILE__) . 'includes/mpu-functions.php';

//backend style
function enqueue_admin_styles()
{
    wp_enqueue_style('myPopUp-admin', plugin_dir_url(__FILE__) . 'css/myPopUp-admin.css');
}
add_action('admin_enqueue_scripts', 'enqueue_admin_styles');

//frontend style
function enqueue_public_styles()
{
    wp_enqueue_style('myPopUp-public', plugin_dir_url(__FILE__) . 'css/myPopUp-public.css');
}
add_action('admin_enqueue_scripts', 'enqueue_public_styles');
