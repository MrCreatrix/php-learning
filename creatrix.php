<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              www.creatrix.wordpress.com
 * @since             1.0.0
 * @package           Creatrix
 *
 * @wordpress-plugin
 * Plugin Name:       Creatrix Addon
 * Plugin URI:        www.creatrix.wordpress.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Shailesh Dhandhukiya
 * Author URI:        www.creatrix.wordpress.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       creatrix
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CREATRIX_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-creatrix-activator.php
 */
function activate_creatrix() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-creatrix-activator.php';
	Creatrix_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-creatrix-deactivator.php
 */
function deactivate_creatrix() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-creatrix-deactivator.php';
	Creatrix_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_creatrix' );
register_deactivation_hook( __FILE__, 'deactivate_creatrix' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-creatrix.php';

require plugin_dir_path( __FILE__ ) . 'includes/Elementor/init.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_creatrix() {

	$plugin = new Creatrix();
	$plugin->run();

}
run_creatrix();
