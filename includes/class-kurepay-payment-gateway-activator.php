<?php

/**
 * Fired during plugin activation
 *
 * @link       https://github.com/osinakayah
 * @since      1.0.0
 *
 * @package    Kurepay_Payment_Gateway
 * @subpackage Kurepay_Payment_Gateway/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Kurepay_Payment_Gateway
 * @subpackage Kurepay_Payment_Gateway/includes
 * @author     Osinakayah Ifeanyi <ifeanyiosinakayah15@gmail.com>
 */
class Kurepay_Payment_Gateway_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
    public static function activate()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . KUREPAY_PAYMENT_GATEWAY_TABLE;

        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE `".$table_name."` (
			id int(11) NOT NULL AUTO_INCREMENT,
			post_id int(11) NOT NULL,
		  	user_id int(11) NOT NULL,
			email varchar(255) DEFAULT '' NOT NULL,
		  	metadata text,
		  	paid int(1) NOT NULL DEFAULT '0',
			txn_code varchar(255) DEFAULT '' NOT NULL,
			amount varchar(255) DEFAULT '' NOT NULL,
			deleted_at varchar(255) DEFAULT '' NULL,
			created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
		  	modified timestamp DEFAULT '0000-00-00 00:00:00' NOT NULL,
		  	UNIQUE KEY id (id),PRIMARY KEY  (id)
		) $charset_collate;";

        include_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta($sql);

    }

}
