<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/osinakayah
 * @since      1.0.0
 *
 * @package    Kurepay_Payment_Gateway
 * @subpackage Kurepay_Payment_Gateway/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Kurepay_Payment_Gateway
 * @subpackage Kurepay_Payment_Gateway/includes
 * @author     Osinakayah Ifeanyi <ifeanyiosinakayah15@gmail.com>
 */
class Kurepay_Payment_Gateway_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'kurepay-payment-gateway',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
