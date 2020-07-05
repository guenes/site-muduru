<?php
/**
 * @link              http://wordpress.org/plugins/site-muduru/
 * @since             1.0.0
 * @package           WP Skeleton
 *
 * @wordpress-plugin
 * Plugin Name:             Site Müdürü
 * Plugin URI:
 * Description:             Skeleton for building a WordPress plugin with modern technologies.
 * Version:           1.0.0
 * Author:                      John Doe
 * Author URI:
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       site-muduru
 * Domain Path:       /languages
 */

/*
BUILT ON TOP OF DEVIN VINSON'S WordPress PLUGIN BOILERPLATE
MORE HERE: https://github.com/DevinVinson/WordPress-Plugin-Boilerplate/
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Plugin version
define( 'SITE_MUDURU_VERSION', '1.0.0' );

// Plugin activation
function activate_site_muduru() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-site-muduru-activator.php';
	site_muduru_Activator::activate();
}

// Plugin deactivation
function deactivate_site_muduru() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-site-muduru-deactivator.php';
	site_muduru_Deactivator::deactivate();
}

//plugin update
function update_site_muduru() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-site-muduru-updater.php';
	site_muduru_Updater::update();
}

//hooks and actions
register_activation_hook( __FILE__, 'activate_site_muduru' );
register_deactivation_hook( __FILE__, 'deactivate_site_muduru' );
add_action( 'plugins_loaded', 'update_site_muduru' );

// The core plugin class
require plugin_dir_path( __FILE__ ) . 'includes/class-site-muduru.php';

// Execute the plugin
function run_site_muduru() {
	$plugin = new site_muduru();
	$plugin->run();
}
run_site_muduru();
