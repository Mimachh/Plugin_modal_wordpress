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
define('myPopUp_VERSION', '1.0.0');

if (is_admin()) {
    require_once plugin_dir_path(__FILE__) . 'includes/mpu-functions.php';
}
