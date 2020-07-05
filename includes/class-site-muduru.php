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
	protected $loader;
	protected $site_muduru;
	protected $version;

	public function __construct()
	{
		if (defined('SITE_MUDURU_VERSION')) {
			$this->version = SITE_MUDURU_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->site_muduru = 'site-muduru';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
			// erweiterungen
		$this->site_muduru_register_post_type();
		$this->site_muduru_site_functions();
		// $this->msf_register_sandbox();
	}

	//Load the required dependencies for this plugin.
	private function load_dependencies()
	{
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-site-muduru-loader.php';
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-site-muduru-i18n.php';
		require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-site-muduru-admin.php';
		require_once plugin_dir_path(dirname(__FILE__)) . 'public/class-site-muduru-public.php';
				// erweiterungen
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-site-muduru-register-post-type.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-site-muduru-site-functions .php';
		// require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-msf-sandbox.php';
		$this->loader = new site_muduru_Loader();
	}

	// Register internationalization
	private function set_locale()
	{
		$plugin_i18n = new site_muduru_i18n();
		$this->loader->add_action('plugins_loaded', $plugin_i18n, 'load_plugin_textdomain');
	}


// my code beginns here
	// register post type heft und Beiträge, fonts

	private function site_muduru_register_post_type() {
		$plugin_post_type = new site_muduru_Register_Post_Types();
		$this->loader->add_action( 'init', $plugin_post_type, 'site_muduru_register_publikation_post_type' );
		$this->loader->add_action( 'init', $plugin_post_type, 'site_muduru_taxs' );
	}
	// erste $ ist dafur da das der function sich ladet, hier wir der Class name aufgerufn, dann der funktion in der class
	private function site_muduru_site_functions() {
		$site_muduru_site_functions = new site_muduru_site_collection( $this->get_Site_Muduru(), $this->get_version() );
		$this->loader->add_action( 'init', $site_muduru_site_functions, 'site_muduru_menu' );
		$this->loader->add_action( 'init', $site_muduru_site_functions, 'site_muduru_add_image_size' );
		//$this->loader->add_action( 'init', $site_muduru_site_functions, 'site_muduru_add_categories_for_attachments' );
		// $this->loader->add_action( 'init', $site_muduru_site_functions, 'site_muduru_wp_subtitle_page_part_support' );
		$this->loader->add_action( 'init', $site_muduru_site_functions, 'site_muduru_replace_featured_image_filter' );
	}
/*
	private function site_muduru_register_sandbox() {
		//$plugin_sandbox = new site_muduru_site_sandbox();
		//$this->loader->add_action( 'acf/update_value/name=cf-featured', $plugin_sandbox, 'acf_set_featured_image' );
	} */

	// my conde ende


	// Register admin hooks
	private function define_admin_hooks()
	{
		$plugin_admin = new site_muduru_Admin($this->get_Site_Muduru(), $this->get_version());
		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');
	}

	// Register public hooks
	private function define_public_hooks()
	{
		$plugin_public = new site_muduru_Public($this->get_Site_Muduru(), $this->get_version());
		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');
		$this->loader->add_action('init', $plugin_public, 'register_shortcodes');
	}

	// Run the loader to execute all hooks
	public function run()
	{
		$this->loader->run();
	}

	public function get_Site_Muduru()
	{
		return $this->site_muduru;
	}

	public function get_loader()
	{
		return $this->loader;
	}

	public function get_version()
	{
		return $this->version;
	}
}
