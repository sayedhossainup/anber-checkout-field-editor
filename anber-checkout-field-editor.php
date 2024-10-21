<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/frahim
 * @since             1.0.0
 * @package           Anber_Checkout_Field_Editor
 *
 * @wordpress-plugin
 * Plugin Name:       Anber Checkout Field Editor
 * Plugin URI:        https://github.com/frahim
 * Description:       WooCommerce Checkout Field Editor
 * Version:           1.0.0
 * Author:            Md Yeasir Arafat
 * Author URI:        https://github.com/frahim/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       anber-checkout-field-editor
 * Domain Path:       /languages
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
define('ANBER_CHECKOUT_FIELD_EDITOR_VERSION', '1.0.0');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-anber-checkout-field-editor-activator.php
 */
function activate_anber_checkout_field_editor() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-anber-checkout-field-editor-activator.php';
    Anber_Checkout_Field_Editor_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-anber-checkout-field-editor-deactivator.php
 */
function deactivate_anber_checkout_field_editor() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-anber-checkout-field-editor-deactivator.php';
    Anber_Checkout_Field_Editor_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_anber_checkout_field_editor');
register_deactivation_hook(__FILE__, 'deactivate_anber_checkout_field_editor');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/anber-checkout-field.php';
require plugin_dir_path(__FILE__) . 'includes/anber-checkout-field-editor-admin.php';


function anber_wp_security_admin_styles() {
    wp_enqueue_style('anber_wp_security_admin_css', plugin_dir_url(__FILE__) . 'admin/css/anber-checkout-field-editor-admin.css');
}

add_action('admin_enqueue_scripts', 'anber_wp_security_admin_styles');

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
//function run_anber_checkout_field_editor() {
//    $plugin = new Anber_Checkout_Field_Editor();
//    $plugin->run();
//}
//
//run_anber_checkout_field_editor();

