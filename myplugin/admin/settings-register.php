<?php   // MyPlugin - Register Settings

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Register My PLugin Settings
function myplugin_register_settings() {
    /*
        register_setting(
        string $option_group,
        string $option_name,
        callable $sanitize_callback = ''
    );
    */

    register_setting( 
        'myplugin_options', 
        'myplugin_options', 
        'myplugin_callback_validate_options' 
    );

    add_settings_section(
        'myplugin_section_login',
        'Customize Login Page',
        'myplugin_callback_setion_login',
        'myplugin'
    );

    add_settings_section(
        'myplugin_section_admin',
        'Customize Admin Area',
        'myplugin_callback_setion_admin',
        'myplugin'
    );

    /*
    add_settings_field(
        string $id,
        string $title,
        callable $callback,
        string $page,
        string $section = 'default',
        array $args = []
    );
    */

    add_settings_field(
        'custom_url',
        esc_html__('Custom URL', 'myplugin'),
        'myplugin_callback_field_text',
        'myplugin',
        'myplugin_section_login',
        ['id' => 'custom_url', 'label' => 'Custom URL for login logo link']
    );

    add_settings_field(
        'custom_title',
        esc_html__('Custom Title', 'myplugin'),
        'myplugin_callback_field_text',
        'myplugin',
        'myplugin_section_login',
        ['id' => 'custom_title', 'label' => 'Custom title attribute for login logo link']
    );

    add_settings_field(
        'custom_style',
        esc_html__('Custom Style', 'myplugin'),
        'myplugin_callback_field_radio',
        'myplugin',
        'myplugin_section_login',
        ['id' => 'custom_style', 'label' => 'Custom CSS for the login scrreen']
    );

    add_settings_field(
        'custom_message',
        esc_html__('Custom Message', 'myplugin'),
        'myplugin_callback_field_textarea',
        'myplugin',
        'myplugin_section_login',
        ['id' => 'custom_message', 'label' => 'Custom text and/or markup']
    );

    add_settings_field(
        'custom_footer',
        esc_html__('Custom Footer', 'myplugin'),
        'myplugin_callback_field_text',
        'myplugin',
        'myplugin_section_admin',
        ['id' => 'custom_footer', 'label' => 'Custom footer text']
    );

    add_settings_field(
        'custom_toolbar',
        esc_html__('Custom Toolbar', 'myplugin'),
        'myplugin_callback_field_checkbox',
        'myplugin',
        'myplugin_section_admin',
        ['id' => 'custom_toolbar', 'label' => 'Remove new post and comment link from the Toolbar']
    );

    add_settings_field(
        'custom_scheme',
        esc_html__('Custom Scheme', 'myplugin'),
        'myplugin_callback_field_select',
        'myplugin',
        'myplugin_section_admin',
        ['id' => 'custom_scheme', 'label' => 'Default Color Scheme for new users']
    );

}
add_action( 'admin_init', 'myplugin_register_settings');
