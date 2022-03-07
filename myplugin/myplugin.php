<?php
/**
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           Example_Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       MyPlugin
 * Plugin URI:        http://example.com/plugin-name-uri/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Olamide Olaniyan
 * Author URI:        http://example.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       myplugin
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// load text domain
function myplugin_load_textdomain() {
    load_plugin_textdomain( 'myplugin', false, plugin_dir_path( __FILE__ ) . 'languages/' );
}
add_action( 'plugin_loaded', 'myplugin_load_textdomain' );


// if admin area
if (is_admin( )) {
    
    //Include dependencies
    require_once plugin_dir_path( __FILE__ ) . 'admin/admin-menu.php';
    require_once plugin_dir_path( __FILE__ ) . 'admin/settings-page.php';
    require_once plugin_dir_path( __FILE__ ) . 'admin/settings-register.php';
    require_once plugin_dir_path( __FILE__ ) . 'admin/settings-callback.php';
    require_once plugin_dir_path( __FILE__ ) . 'admin/settings-validate.php';
    
}

//Include dependencies: admin and public
require_once plugin_dir_path( __FILE__ ) . 'includes/core-functions.php';



// Default plugin options
function myplugin_options_defaults() {
    return array(
        'custom_url' => 'https://wordpress.org/',
        'custom_title' => esc_html__('Powered by Wordpress', 'myplugin'),
        'custom_style' => 'disable',
        'custom_message' => '<p class="custom-message">' . esc_html__('My Custom Message', 'myplugin') .'</p>',
        'custom_footer' => esc_html__('Special message for users', 'myplugin'),
        'custom_toolbar' => 'false',
        'custom_scheme' => 'default',
    );
}


