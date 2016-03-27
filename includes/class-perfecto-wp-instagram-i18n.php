<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://zachtrice.com
 * @since      0.1.0
 *
 * @package    Perfecto_WP_Instagram
 * @subpackage Perfecto_WP_Instagram/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      0.1.0
 * @package    Perfecto_WP_Instagram
 * @subpackage Perfecto_WP_Instagram/includes
 * @author     ZachTRice <contact@zachtrice.com>
 */
class Perfecto_WP_Instagram_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    0.1.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'perfecto-wp-instagram',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
