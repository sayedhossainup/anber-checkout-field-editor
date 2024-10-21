<?php
/**
 *
 * @link       https://github.com/frahim
 * @since      1.0.0
 *
 * @package    Anber_Checkout_Field_Editor
 * @subpackage Anber_Checkout_Field_Editor/includes

 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Register menu page for the Checkout Field Editor
add_action('admin_menu', 'anber_checkout_field_editor_admin');

function anber_checkout_field_editor_admin() {
    add_options_page(
            'Anber Checkout Field Editor Settings',
            'Anber Checkout Field Editor',
            'manage_options',
            'anber-checkout-field-editor',
            'anber_checkout_field_editor_settings_page'
    );
}

// Callback function to render the settings page
function anber_checkout_field_editor_settings_page() {
    ?>
    <section id="wrapper">
        <h2 class="pagetitle mb-30"><?php echo esc_html(get_admin_page_title()); ?></h2>      
        <!-- Tab content -->
        <div class="wrapper_tabcontent">
            <div id="general-settings" class="tabcontent active">
                <form method="post" action="options.php">
                    <?php
                    // Register the settings fields
                    settings_fields('anber_checkout_field_options_group');
                    // Output the settings sections for the plugin
                    do_settings_sections('anber-checkout-field-editor');
                    // Add the submit button to save changes
                    submit_button();
                    ?>
                </form>
            </div>
        </div>
    </section>
    <?php
}

// Register the settings and fields
add_action('admin_init', 'anber_checkout_field_editor_settings');

function anber_checkout_field_editor_settings() {
    // Register the option to store the checkbox value
    register_setting('anber_checkout_field_options_group', 'anber_checkout_field_fname');
    register_setting('anber_checkout_field_options_group', 'anber_checkout_field_lname');
    register_setting('anber_checkout_field_options_group', 'anber_checkout_field_cname');
    register_setting('anber_checkout_field_options_group', 'anber_checkout_field_country');
    register_setting('anber_checkout_field_options_group', 'anber_checkout_field_address_2');
    register_setting('anber_checkout_field_options_group', 'anber_checkout_field_phone');
    register_setting('anber_checkout_field_options_group', 'anber_checkout_field_email');    
    register_setting('anber_checkout_field_options_group', 'anber_checkout_field_email_position');

    // Add settings section
    add_settings_section(
            'anber_checkout_field_editor_section',
            'Billing details Form',
            'anber_checkout_field_editor_section_text',
            'anber-checkout-field-editor'
    );

    // Add settings field for disabling First Name
    add_settings_field(
            'anber_checkout_field_fname',
            'First name',
            'anber_fname_field_checkbox_callback',
            'anber-checkout-field-editor',
            'anber_checkout_field_editor_section'
    );
    add_settings_field(
            'anber_checkout_field_lname',
            'Last name',
            'anber_lname_field_checkbox_callback',
            'anber-checkout-field-editor',
            'anber_checkout_field_editor_section'
    );
    add_settings_field(
            'anber_checkout_field_cname',
            'Company name',
            'anber_company_field_checkbox_callback',
            'anber-checkout-field-editor',
            'anber_checkout_field_editor_section'
    );
    add_settings_field(
            'anber_checkout_field_country',
            'Country / Region',
            'anber_country_field_checkbox_callback',
            'anber-checkout-field-editor',
            'anber_checkout_field_editor_section'
    );
    add_settings_field(
            'anber_checkout_field_address_2',
            'Street address',
            'anber_address_2_field_checkbox_callback',
            'anber-checkout-field-editor',
            'anber_checkout_field_editor_section'
    );
    add_settings_field(
            'anber_checkout_field_phone',
            'Phone',
            'anber_phohne_field_checkbox_callback',
            'anber-checkout-field-editor',
            'anber_checkout_field_editor_section'
    );
    add_settings_field(
            'anber_checkout_field_email',
            'Email',
            'anber_email_field_checkbox_callback',
            'anber-checkout-field-editor',
            'anber_checkout_field_editor_section'
    );
}

// Display section description (can be left empty or used to describe settings)
function anber_checkout_field_editor_section_text() {
    echo '<p>Use the options below to customize checkout fields.</p>';
}

function anber_fname_field_checkbox_callback() {
    // Get the saved value of the option
    $selected_option = get_option('anber_checkout_field_fname');

    // Define your options
    $options = array(        
        'optional' => 'Optional',
        'required' => 'Required',
        'hidden' => 'Hidden',
    );

    // Output the select dropdown
    echo '<select id="anber_checkout_field_fname" name="anber_checkout_field_fname">';

    // Loop through options and output each one, marking the selected option
    foreach ($options as $value => $label) {
        $selected = $selected_option === $value ? 'selected' : '';
        echo '<option value="' . esc_attr($value) . '" ' . esc_attr($selected) . '>' . esc_html($label) . '</option>';
    }

    echo '</select>';
}

function anber_lname_field_checkbox_callback() {
    // Get the saved value of the option
    $selected_option = get_option('anber_checkout_field_lname');
    $options = array(        
        'optional' => 'Optional',
        'required' => 'Required',
        'hidden' => 'Hidden',
    );

    // Output the select dropdown
    echo '<select id="anber_checkout_field_lname" name="anber_checkout_field_lname">';

    // Loop through options and output each one, marking the selected option
    foreach ($options as $value => $label) {
        $selected = $selected_option === $value ? 'selected' : '';
        echo '<option value="' . esc_attr($value) . '" ' . esc_attr($selected) . '>' . esc_html($label) . '</option>';
    }

    echo '</select>';
}

function anber_company_field_checkbox_callback() {
    // Get the saved value of the option
    $selected_option = get_option('anber_checkout_field_cname');
    $options = array(        
        'optional' => 'Optional',
        'required' => 'Required',
        'hidden' => 'Hidden',
    );
    // Output the select dropdown
    echo '<select id="anber_checkout_field_cname" name="anber_checkout_field_cname">';
    // Loop through options and output each one, marking the selected option
    foreach ($options as $value => $label) {
        $selected = $selected_option === $value ? 'selected' : '';
        echo '<option value="' . esc_attr($value) . '" ' . esc_attr($selected) . '>' . esc_html($label) . '</option>';
    }

    echo '</select>';
}

function anber_address_2_field_checkbox_callback() {
    // Get the saved value of the option
    $selected_option = get_option('anber_checkout_field_address_2');
    $options = array(        
        'optional' => 'Optional',
        'required' => 'Required',
        'hidden' => 'Hidden',
    );
    // Output the select dropdown
    echo '<select id="anber_checkout_field_address_2" name="anber_checkout_field_address_2">';
    // Loop through options and output each one, marking the selected option
    foreach ($options as $value => $label) {
        $selected = $selected_option === $value ? 'selected' : '';
        echo '<option value="' . esc_attr($value) . '" ' . esc_attr($selected) . '>' . esc_html($label) . '</option>';
    }

    echo '</select>';
}

function anber_country_field_checkbox_callback() {
    // Get the saved value of the option
    $selected_option = get_option('anber_checkout_field_country');
    $options = array(        
        'optional' => 'Optional',
        'required' => 'Required',
        'hidden' => 'Hidden',
    );
    // Output the select dropdown
    echo '<select id="anber_checkout_field_country" name="anber_checkout_field_country">';
    // Loop through options and output each one, marking the selected option
    foreach ($options as $value => $label) {
        $selected = $selected_option === $value ? 'selected' : '';
        echo '<option value="' . esc_attr($value) . '" ' . esc_attr($selected) . '>' . esc_html($label) . '</option>';
    }

    echo '</select>';
}



function anber_phohne_field_checkbox_callback() {
    // Get the saved value of the option
    $selected_option = get_option('anber_checkout_field_phone');
    $options = array(        
        'optional' => 'Optional',
        'required' => 'Required',
        'hidden' => 'Hidden',
    );
    // Output the select dropdown
    echo '<select id="anber_checkout_field_phone" name="anber_checkout_field_phone">';
    // Loop through options and output each one, marking the selected option
    foreach ($options as $value => $label) {
        $selected = $selected_option === $value ? 'selected' : '';
        echo '<option value="' . esc_attr($value) . '" ' . esc_attr($selected) . '>' . esc_html($label) . '</option>';
    }

    echo '</select>';
}
function anber_email_field_checkbox_callback() {
    // Get the saved value of the option
    $selected_option = get_option('anber_checkout_field_email');
    $email_position = get_option('anber_checkout_field_email_position'); 
    $options = array(        
        'optional' => 'Optional',
        'required' => 'Required',
        'hidden' => 'Hidden',
    );
    // Output the select dropdown
    echo '<div class="divwrwpper">';
    echo '<select id="anber_checkout_field_email" name="anber_checkout_field_email">';
    // Loop through options and output each one, marking the selected option
    foreach ($options as $value => $label) {
        $selected = $selected_option === $value ? 'selected' : '';
        echo '<option value="' . esc_attr($value) . '" ' . esc_attr($selected) . '>' . esc_html($label) . '</option>';
    }

    echo '</select>';
    echo '<div><label for="fname">Position:</label><input style="width:80px" type="text" id="anber_checkout_field_email_position" name="anber_checkout_field_email_position" value="' . esc_attr($email_position) . '"></div>';
    echo '</div>';
}

