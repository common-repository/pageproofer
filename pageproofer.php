<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://pageproofer.com
 * @since             1.0.0
 * @package           Pageproofer
 *
 * @wordpress-plugin
 * Plugin Name:       PageProofer
 * Plugin URI:        https://pageproofer.com
 * Description:       Add visual feedback to your website. Allow people to leave feedback about specific elements on your website, ie general feedback, typos, bugs.
 * Version:           1.4.0
 * Author:            Derrick Grigg
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       pageproofer
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
define( 'PAGEPROOFER_VERSION', '1.4.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-pageproofer-activator.php
 */
function activate_pageproofer() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pageproofer-activator.php';
	Pageproofer_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-pageproofer-deactivator.php
 */
function deactivate_pageproofer() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pageproofer-deactivator.php';
	Pageproofer_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_pageproofer' );
register_deactivation_hook( __FILE__, 'deactivate_pageproofer' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-pageproofer.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_pageproofer() {

	$plugin = new Pageproofer();
	$plugin->run();

}
run_pageproofer();
