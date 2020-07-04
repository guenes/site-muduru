<?php

/**
 * The core plugin class
 *
 * @link       http://wordpress.org/plugins/site-muduru/
 * @since      1.0.0
 *
 * @package    site_muduru
 * @subpackage site_muduru/includes
 */


// Defines internationalization, admin-specific hooks and public hooks
class site_muduru
{

	// Registers all hooks for the plugin
	protected $loader;

	// WP Skeleton - string
	protected $site_muduru;

	//Plugin current version - string
	protected $version;

	// Set the WP Skeleton and the plugin version, and fire the methods!
	public function __construct()
	{
		if (defined('site_muduru_VERSION')) {
			$this->version = site_muduru_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->site_muduru = 'site-muduru';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}

	//Load the required dependencies for this plugin.

	private function load_dependencies()
	{
		// Menages hooks
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-site-muduru-loader.php';

		// Menages internationalization
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-site-muduru-i18n.php';

		// Menages admin side
		require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-site-muduru-admin.php';

		// Menages public side
		require_once plugin_dir_path(dirname(__FILE__)) . 'public/class-site-muduru-public.php';

		//Fire the loader
		$this->loader = new site_muduru_Loader();
	}

	// Register internationalization
	private function set_locale()
	{
		$plugin_i18n = new site_muduru_i18n();

		$this->loader->add_action('plugins_loaded', $plugin_i18n, 'load_plugin_textdomain');
	}

	// Register admin hooks
	private function define_admin_hooks()
	{
		$plugin_admin = new site_muduru_Admin($this->get_site_muduru(), $this->get_version());

		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');
	}

	// Register public hooks
	private function define_public_hooks()
	{

		$plugin_public = new site_muduru_Public($this->get_site_muduru(), $this->get_version());

		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');
		$this->loader->add_action('init', $plugin_public, 'register_shortcodes');
	}

	// Run the loader to execute all hooks
	public function run()
	{
		$this->loader->run();
	}

	// WP Skeleton for identification
	public function get_site_muduru()
	{
		return $this->site_muduru;
	}

	// The reference to the class that orchestrates the hooks with the plugin
	public function get_loader()
	{
		return $this->loader;
	}

	// Retrive the plugin version
	public function get_version()
	{
		return $this->version;
	}
}
