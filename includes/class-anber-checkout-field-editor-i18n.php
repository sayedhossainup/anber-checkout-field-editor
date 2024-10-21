<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/frahim
 * @since      1.0.0
 *
 * @package    Anber_Checkout_Field_Editor
 * @subpackage Anber_Checkout_Field_Editor/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Anber_Checkout_Field_Editor
 * @subpackage Anber_Checkout_Field_Editor/includes
 * @author     Md Yeasir Arafat <frahim5@gmail.com>
 */
class Anber_Checkout_Field_Editor_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'anber-checkout-field-editor',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
