<?php // My Plugin - Admin Menu

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*
    add_submenu_page(
    string $parent_slug,
    string $page_title,
    string $menu_title,
    string $capability,
    string $menu_slug,
    callable $function = ''
);
*/

function myplugin_add_sublevel_menu()
{
    add_submenu_page(
        'options-general.php',
        esc_html__('My Plugin Settings', 'myplugin'),
        esc_html__('MyPlugin', 'myplugin'),
        'manage_options',
        'myplugin',
        'myplugin_display_settings_page'
    );
}
// add_action('admin_menu', 'myplugin_add_sublevel_menu');

function myplugin_add_toplevel_menu() {
    add_menu_page(
        esc_html__('My Plugin Settings', 'myplugin'),
        esc_html__('MyPlugin', 'myplugin'),
        'manage_options',
        'myplugin',
        'myplugin_display_settings_page',
        'dashicons-admin-generic',
        null
    );
}
add_action('admin_menu', 'myplugin_add_toplevel_menu');
