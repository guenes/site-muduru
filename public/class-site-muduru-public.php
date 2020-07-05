<?php
/**
 * The public-specific functionality of the plugin.
 *
 * @link       http://wordpress.org/plugins/site-muduru/
 * @since      1.0.0
 *
 * @package    site_muduru
 * @subpackage site_muduru/public
 */

// The public functionality of the plugin
class Site_Muduru_Public
{

	// WP Skeleton - string
	private $site_muduru;

	//Plugin current version - string
	private $version;

	// Initialize
	public function __construct($site_muduru, $version)
	{
		$this->site_muduru = $site_muduru;
		$this->version = $version;
	}


	// Register and enqueue the public css
	public function enqueue_styles()
	{
		wp_enqueue_style( $this->site_muduru, plugin_dir_url( __FILE__ ) . 'css/site-muduru-public.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'site-muduru-fontawesom', plugin_dir_url( __FILE__ ) . 'css/site-muduru-font-awesome.min.css', array(), $this->version, 'all' );
	}

	// Register and enqueue the public js
	public function enqueue_scripts()
	{
		wp_enqueue_script($this->site_muduru, plugin_dir_url(__FILE__) . 'js/site-muduru-public.js', array('jquery'), $this->version, false);
	}

	// Register shortcodes
	public function register_shortcodes()
	{
		add_shortcode('sitemuduru', array($this, 'site_muduru_shortcode'));
	}

	public function site_muduru_shortcode()
	{
		return 'Site Muduru!';
	}
}
