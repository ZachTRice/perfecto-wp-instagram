<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://zachtrice.com
 * @since             0.1.0
 * @package           Perfecto_WP_Instagram
 *
 * @wordpress-plugin
 * Plugin Name:       Perfecto! Instagram
 * Plugin URI:        http://perfectoplugins.com
 * Description:       A lightweight plugin for displaying Instagram photos by username or tag. 
 * Version:           0.1.0
 * Author:            ZachTRice
 * Author URI:        http://zachtrice.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       perfecto-wp-instagram
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-perfecto-wp-instagram-activator.php
 */
function activate_Perfecto_WP_Instagram() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-perfecto-wp-instagram-activator.php';
	Perfecto_WP_Instagram_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-perfecto-wp-instagram-deactivator.php
 */
function deactivate_Perfecto_WP_Instagram() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-perfecto-wp-instagram-deactivator.php';
	Perfecto_WP_Instagram_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_Perfecto_WP_Instagram' );
register_deactivation_hook( __FILE__, 'deactivate_Perfecto_WP_Instagram' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-perfecto-wp-instagram.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.1.0
 */
function run_Perfecto_WP_Instagram() {

	$plugin = new Perfecto_WP_Instagram();
	$plugin->run();

}
run_Perfecto_WP_Instagram();
