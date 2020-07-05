<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://wordpress.org/plugins/site-muduru/
 * @since      1.0.0
 *
 * @package    site_muduru
 * @subpackage site_muduru/admin
 */

// The admin functionality of the plugin
class Site_Muduru_Admin {

	// WP Skeleton - string
	private $site_muduru;

	//Plugin current version - string
	private $version;

	// Initialize
	public function __construct( $site_muduru, $version ) {
		$this->site_muduru = $site_muduru;
		$this->version     = $version;
	}

	// Register and enqueue the admin css
	public function enqueue_styles() {
		wp_enqueue_style( $this->site_muduru, plugin_dir_url( __FILE__ ) . 'css/site-muduru-admin.css', array(), $this->version, 'all' );
	}

	// Register and enqueue the admin js
	public function enqueue_scripts() {
		wp_enqueue_script( $this->site_muduru, plugin_dir_url( __FILE__ ) . 'js/site-muduru-admin.js', array( 'jquery' ), $this->version, false );
	}
}
