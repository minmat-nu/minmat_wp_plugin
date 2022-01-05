<?php
/**
* Plugin Name: minmat.nu
* Plugin URI: https://minmat.nu/
* Description: plugin för minmat.nu
* Version: 1.0
* Author: Andreas Axelsson, John Henrysson, Linnea Modén, Sara Axelsson
* Author URI: https://webox.nu/
**/


if ( !defined( 'ABSPATH' ) ) exit;
// Act on plugin activation
register_activation_hook( __FILE__, "minmat_activate_plugin");

// Act on plugin de-activation
register_deactivation_hook( __FILE__, "minmat_deactivate_plugin" );
// Activate Plugin
function minmat_activate_plugin() {
    $minmat_pluginname = 'minmat_';
    minmat_create_db($minmat_pluginname);
}

// De-activate Plugin
function minmat_deactivate_plugin($minmat_pluginname) {
    $minmat_pluginname = 'minmat_';
	// Execute tasks on Plugin de-activation
    minmat_remove_db($minmat_pluginname);
}


add_action( 'admin_menu', 'minmat_plugin_menu');

include('install_plugin.php');
include('admin_panel.php');



?>
