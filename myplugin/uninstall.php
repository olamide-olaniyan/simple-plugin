<?php

// If this file is called directly, abort.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

//delete the plugin options
delete_option('myplugin_options');