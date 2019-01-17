<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/osinakayah
 * @since             1.0.0
 * @package           Kurepay_Payment_Gateway
 *
 * @wordpress-plugin
 * Plugin Name:       Kurepay Payment Gateway
 * Plugin URI:        https://github.com/osinakayah/kurepay-payment-gateway-wordpress-plugin
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Osinakayah Ifeanyi
 * Author URI:        https://github.com/osinakayah
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       kurepay-payment-gateway
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define('KUREPAY_PAYMENT_GATEWAY_PLUGIN_PATH', plugins_url(__FILE__));
define('KUREPAY_PAYMENT_GATEWAY_MAIN_FILE', __FILE__);
define('KUREPAY_PAYMENT_GATEWAY_VERSION', '2.2.1');
define('KUREPAY_PAYMENT_GATEWAY_TABLE', 'kurepay_payment_gateway');
/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-kurepay-payment-gateway-activator.php
 */
function activate_kurepay_payment_gateway() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-kurepay-payment-gateway-activator.php';
	Kurepay_Payment_Gateway_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-kurepay-payment-gateway-deactivator.php
 */
function deactivate_kurepay_payment_gateway() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-kurepay-payment-gateway-deactivator.php';
	Kurepay_Payment_Gateway_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_kurepay_payment_gateway' );
register_deactivation_hook( __FILE__, 'deactivate_kurepay_payment_gateway' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-kurepay-payment-gateway.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_kurepay_payment_gateway() {

	$plugin = new Kurepay_Payment_Gateway();
	$plugin->run();

}
function kure_pay_payment_gateway_shortcode( $atts ) {
    $a = shortcode_atts( array(
        'amount' => 0,
    ), $atts );
    $publicKey = get_option('kurepay-payment-gateway')['public-key'];

    $htmlBody = '
    <div id="kure_pay_payment_gateway-block">
        <input type="hidden" id="kure_pay_payment_gateway_amount" value="'.$a['amount'].'">
        <input type="hidden" id="kure_pay_payment_gateway_publicKey" value="'.$publicKey.'">
        <input id="kure_pay_payment_gateway_customer_email" placeholder="Customer Email" class="kure_pay_payment_gateway-input" name="kure_pay_payment_gateway_customer_email" type="text">
        <br>
        <input id="kure_pay_payment_gateway_fullname" placeholder="Customer Full name" class="kure_pay_payment_gateway-input" name="kure_pay_payment_gateway_fullname" type="text">
         <br>
         <input id="kure_pay_payment_gateway_phone_number" placeholder="Customer Phone Number" class="kure_pay_payment_gateway-input" name="kure_pay_payment_gateway_phone_number" type="tel">
         <br>
        <button style="width: 100%; margin: 0.7rem;" id="kure_pay_payment_gateway-myBtn">Pay &#8358;'.$a['amount'].'</button>

        <!-- The Modal -->
        <div id="kure_pay_payment_gateway-myModal" class="kure_pay_payment_gateway-modal">
    
            <!-- Modal content -->
            <div class="kure_pay_payment_gateway-modal-content">
                <span class="kure_pay_payment_gateway-close">&times;</span>
               
            </div>
    
        </div>
    </div>
    <script>
        
    </script>
    ';
    return $htmlBody;
}

add_shortcode( 'kure_pay_payment_gateway', 'kure_pay_payment_gateway_shortcode' );

run_kurepay_payment_gateway();
