<?php
/*
* The plugin bootstrap file
*
* This file is read by WordPress to generate the plugin information in the plugin
* admin area. This file also includes all of the dependencies used by the plugin,
* registers the activation and deactivation functions, and defines a function
* that starts the plugin.
*
* @link              https://deviware.com/
* @since             1.0.0
* @package           Wp_Cookie_Manager
*
* @wordpress-plugin
Plugin Name: Cookie Manager
Description: Cookie Manager allows you to inform and let users configure your site cookies as well as helping you comply with the EU GDPR cookie law regulations.
Version: 1.0.2
Author: Deviware
Author URI: https://deviware.com/
Plugin URI: https://cookiemanager.deviware.com/
License: MIT License
License URI: http://opensource.org/licenses/MIT
Text Domain: wp-cookie-manager
Domain Path: /languages

WP Cookie Manager
Copyright (C) 2020-2020, Deviware - hola@deviware.com

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
	exit;

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'Wp_Cookie_Manager_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_wp_cookie_manager() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-cookie-manager-activator.php';
	Wp_Cookie_Manager_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivate_wp_cookie_manager() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-cookie-manager-deactivator.php';
	Wp_Cookie_Manager_Deactivator::deactivate();
}

//register_activation_hook( __FILE__, 'activate_wp_cookie_manager' );
//register_deactivation_hook( __FILE__, 'deactivate_wp_cookie_manager' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-cookie-manager.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_cookie_manager() {

	$plugin = new Wp_Cookie_Manager();
	$plugin->run();

}
run_wp_cookie_manager();

//add_action( 'admin_menu', 'Wp_Cookie_Manager_menu' );  


//https://github.com/DevinVinson/WordPress-Plugin-Boilerplate/blob/master/plugin-name/public/class-plugin-name-public.php
//https://glyphter.com/


/*if( !function_exists("Wp_Cookie_Manager_menu") ) { 
	function Wp_Cookie_Manager_menu(){    
		$page_title = 'WP Cookie Manager Settings';   
		$menu_title = 'WP Cookie Manager Settings';   
		$capability = 'manage_options';   
		$menu_slug  = 'wp-cookie-manager-settings';   
		$function   = 'Wp_Cookie_Manager_settings_page';   
		$icon_url   = 'dashicons-wcm-cookie-solid';   
		$position   = 4;
		add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position ); 
	}
}

if( !function_exists("Wp_Cookie_Manager_settings_page") ) { 
	function Wp_Cookie_Manager_settings_page(){ ?>   <h1>WP Cookie Manager Settings</h1> <?php } 

}*/ ?>