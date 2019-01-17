<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://github.com/osinakayah
 * @since      1.0.0
 *
 * @package    Kurepay_Payment_Gateway
 * @subpackage Kurepay_Payment_Gateway/admin/partials
 */
?>

<div class="wrap">

    <h2><?php echo esc_html(get_admin_page_title()); ?></h2>

    <form method="post" name="kurepay_payment_gateway_options" action="options.php">
        <?php settings_fields($this->plugin_name);
        $options = get_option($this->plugin_name);
        ?>


        <table class="form-table kurepay_payment_gateway_setting_page">
            <tbody>

            <tr valign="top">
                <th scope="row">Secret Key</th>
                <td>
                    <input placeholder="Secret Key" name="<?php echo $this->plugin_name; ?>[secret-key]" type="text" value="<?php echo $options['secret-key']?>" class="large-text" />
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Public Key</th>
                <td>
                    <input placeholder="Public Key" name="<?php echo $this->plugin_name; ?>[public-key]" type="text" value="<?php echo $options['public-key']?>" class="large-text" />
                </td>
            </tr>

            </tbody>
        </table>

        <?php submit_button('Save all changes', 'primary','submit', TRUE); ?>

    </form>

</div>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
