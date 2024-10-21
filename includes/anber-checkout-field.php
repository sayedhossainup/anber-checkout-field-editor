<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://github.com/frahim
 * @since      1.0.0
 *
 * @package    Anber_Checkout_Field_Editor
 * @subpackage Anber_Checkout_Field_Editor/includes
 */

add_filter('woocommerce_checkout_fields', 'anber_modify_fname_field');
function anber_modify_fname_field($fields) {
    // Get the saved setting from options for first name field
    $fname = get_option('anber_checkout_field_fname');

    // Apply logic based on the selected option for first name field
    switch ($fname) { // Corrected the variable name
        case 'hidden':
            // Remove the first name field completely
            unset($fields['billing']['billing_first_name']);
            break;
        case 'optional':
            // Make the first name field optional
            $fields['billing']['billing_first_name']['required'] = false;
            break;
        case 'required':
            // Ensure the first name field is required
            $fields['billing']['billing_first_name']['required'] = true;
            break;
        default:
            // Do nothing if no valid option is selected
            break;
    }

    return $fields;
}
add_filter('woocommerce_checkout_fields', 'anber_modify_lname_field');
function anber_modify_lname_field($fields) {
    // Get the saved setting from options for first name field
    $fname = get_option('anber_checkout_field_lname');

    // Apply logic based on the selected option for first name field
    switch ($fname) { // Corrected the variable name
        case 'hidden':
            // Remove the first name field completely
            unset($fields['billing']['billing_last_name']);
            break;
        case 'optional':
            // Make the first name field optional
            $fields['billing']['billing_last_name']['required'] = false;
            break;
        case 'required':
            // Ensure the first name field is required
            $fields['billing']['billing_last_name']['required'] = true;
            break;
        default:
            // Do nothing if no valid option is selected
            break;
    }

    return $fields;
}


add_filter('woocommerce_checkout_fields', 'anber_modify_company_field');
function anber_modify_company_field($fields) {
    // Get the saved setting from options for company field
    $cname = get_option('anber_checkout_field_cname');

    // Apply logic based on the selected option for company field
    switch ($cname) {
        case 'hidden':
            // Remove the company field completely
            unset($fields['billing']['billing_company']);
            break;
        case 'optional':
            // Make the company field optional
            $fields['billing']['billing_company']['required'] = false;
            break;
        case 'required':
            // Ensure the company field is required
            $fields['billing']['billing_company']['required'] = true;
            break;
        default:
            // Do nothing if no valid option is selected
            break;
    }

    return $fields;
}

add_filter('woocommerce_checkout_fields', 'anber_modify_country_field');
function anber_modify_country_field($fields) {
    // Get the saved setting from options for company field
    $cname = get_option('anber_checkout_field_country');

    // Apply logic based on the selected option for company field
    switch ($cname) {
        case 'hidden':
            // Remove the company field completely
            unset($fields['billing']['billing_country']);
            break;
        case 'optional':
            // Make the company field optional
            $fields['billing']['billing_country']['required'] = false;
            break;
        case 'required':
            // Ensure the company field is required
            $fields['billing']['billing_country']['required'] = true;
            break;
        default:
            // Do nothing if no valid option is selected
            break;
    }

    return $fields;
}

add_filter('woocommerce_checkout_fields', 'anber_modify_address_2_field');
function anber_modify_address_2_field($fields) {
    // Get the saved setting from options for company field
    $cname = get_option('anber_checkout_field_address_2');

    // Apply logic based on the selected option for company field
    switch ($cname) {
        case 'hidden':
            // Remove the company field completely
            unset($fields['billing']['billing_address_2']);
            break;
        case 'optional':
            // Make the company field optional
            $fields['billing']['billing_address_2']['required'] = false;
            break;
        case 'required':
            // Ensure the company field is required
            $fields['billing']['billing_address_2']['required'] = true;
            break;
        default:
            // Do nothing if no valid option is selected
            break;
    }

    return $fields;
}

add_filter('woocommerce_checkout_fields', 'anber_modify_phohne_field');
function anber_modify_phohne_field($fields) {
    // Get the saved setting from options for company field
    $cname = get_option('anber_checkout_field_phone');

    // Apply logic based on the selected option for company field
    switch ($cname) {
        case 'hidden':
            // Remove the company field completely
            unset($fields['billing']['billing_phone']);
            unset($fields['shipping']['shipping_phone']);
            break;
        case 'optional':
            // Make the company field optional
            $fields['billing']['billing_phone']['required'] = false;
             $fields['shipping']['shipping_phone']['required'] = false;
            break;
        case 'required':
            // Ensure the company field is required
            $fields['billing']['billing_phone']['required'] = true;
            $fields['shipping']['shipping_phone']['required'] = true;
            break;
        default:
            // Do nothing if no valid option is selected
            break;
    }

    return $fields;
}
add_filter('woocommerce_checkout_fields', 'anber_modify_email_field');
function anber_modify_email_field($fields) {
    // Get the saved setting from options for company field
    $cname = get_option('anber_checkout_field_email');

    // Apply logic based on the selected option for company field
    switch ($cname) {
        case 'hidden':
            // Remove the company field completely
            unset($fields['billing']['billing_email']);
            break;
        case 'optional':
            // Make the company field optional
            $fields['billing']['billing_email']['required'] = false;
            break;
        case 'required':
            // Ensure the company field is required
            $fields['billing']['billing_email']['required'] = true;
            break;
        default:
            // Do nothing if no valid option is selected
            break;
    }

    return $fields;
}


add_filter( 'woocommerce_billing_fields', 'bbloomer_move_checkout_email_field' );
 
function bbloomer_move_checkout_email_field( $address_fields ) {
    $email_position = get_option('anber_checkout_field_email_position');
    $address_fields['billing_email']['priority'] = $email_position;
    return $address_fields;
}